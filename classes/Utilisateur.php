<?php
  class Utilisateur{

    private $db;
    private $id;
    public $nom = "";
    public $prenom = "";
    public $email = "";
    public $mdp = "";
    private $etat_panier = false; # true = rempli (pas vide), false = vide
    private $admin = false; # Un nouvel utilisateur n'est pas un admin

    public function __construct($db){
      return $this->db = $db;
    }

    public function creer_compte($nom, $prenom, $email, $mdp){
      // verif si mail (nom utilisateur de la boutique) n'existe pas deja !!
      $req = $this->db->query("SELECT * FROM utilisateurs WHERE email = ?", [$email]);
      $verif_log = $req->fetch();

      if(empty($verif_log)){
        $mdp_crypt = password_hash($mdp, PASSWORD_BCRYPT); // cryptage mdp

        $inscription = $this->db->query("INSERT INTO utilisateurs (nom, prenom, email, password) VALUES (?, ?, ?, ?)",
          [$nom,
          $prenom,
          $email,
          $mdp_crypt]);
          $location = App::redirect('connexion.php');
      }
      else{
        // systeme de message d'erreur a étudier
        var_dump('login déjà utilisé');
      }
    }

    public function se_connecter($email, $mdp){
      $recup_info = $this->db->query("SELECT * FROM utilisateurs WHERE email = ?", [$email]);
      $infos = $recup_info->fetch();

      if(!empty($infos) && !empty($email) && !empty($mdp)){
        if(password_verify($mdp, $infos->password)){
          $session = new Session;
          $session->writeSession("id", "$infos->id");
          $session->writeSession("nom", "$infos->nom");
          $session->writeSession("prenom", "$infos->prenom");
          $session->writeSession("email", "$infos->email");
          $location = App::redirect('index.php');
        }
      }
      else{
        var_dump('aucun compte chez nous');
      }
    }

    public function modifier_nom($new_nom){
      $update_nom = $this->db->query("UPDATE utilisateurs SET nom = ? WHERE id = ?", "$new_nom");

      $_SESSION['nom'] = $new_nom;
    }

    public function modifier_prenom($new_prenom){
      $update_prenom = $this->db->query("UPDATE utilisateurs SET prenom = ? WHERE id = ?", "$new_prenom");

      $_SESSION['prenom'] = $new_prenom;
    }

    public function modifier_email($new_email){
      $update_email = $this->db->query("UPDATE utilisateurs SET email = ? WHERE id = ?", "$new_email");

      $_SESSION['email'] = $new_email;
    }

    public function modifier_mdp($new_mdp){
      $mdp_up = password_hash($new_mdp, PASSWORD_BCRYPT);
      $update_mdp = $this->db->query("UPDATE utilisateurs SET mdp = ? WHERE id = ?", "$mdp_up");

      $_SESSION['mdp'] = $new_mdp;
    }

    public function supprimer_son_compte(){
      $id_log = $_SESSION['id'];
      $supp_utilisateur = $this->db->query("DELETE FROM utilisateurs WHERE id = ? ", "$id_log");
      //changer les info dans historique d'achat
    }

    public function stocker_historique(){
      # Insertion de l'achat dans la table sql
    }

    public function afficher_historique(){
      $id_log = $_SESSION['id'];
      $historique = $this->db->query("SELECT nom_produit, date_achat FROM historique WHERE id_utilisateur = ?", "$id_log");
      $historique->fetchall(PDO::FETCH_ASSOC);
    }

    public function devenir_admin(){
      # Permet de changer le statut de $admin en true
      $id_log = $_SESSION['id'];
      $admin = $this->db->query("UPDATE utilisateurs SET admin = 'true' WHERE id = ?", "$id_log");

      $_SESSION['admin'] = true;
    }

    public function changer_statut(){
      $id_log = $_SESSION['id'];
      $membre = $this->db->query("UPDATE utilisateurs SET admin = 'false' WHERE id = ? ", "$id_log");

      $_SESSION['admin'] = false;
    }

    //geteur de recupération
    public function getid(){
      return $this->id;
    }

    public function getnom(){
      return $this->nom;
    }

    public function getprenom(){
      return $this->prenom;
    }

    public function getemail(){
      return $this->email;
    }
  }
?>
