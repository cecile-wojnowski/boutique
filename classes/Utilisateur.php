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

        $inscription = $this->db->prepare("INSERT INTO utilisateurs (nom, prenom, email, password) VALUES ('$nom', '$prenom, '$email, '$mdp_crypt)");
        $inscription->execute();
        $location = App::redirect('connexion.php');
      }
      else{
        // systeme de message d'erreur a étudier
        var_dump("Cet email existe déjà chez nous !");
      }
    }

    public function se_connecter($email, $mdp){
      $recup_info = $this->db->prepare("SELECT * FROM utilisateurs WHERE email = '$email' ");
      $recup_info->execute();
      $infos = $recup_info->fetch();

      if(!empty($infos)){
        if(password_verify($mdp, $infos['password'])){

          $_SESSION['id'] = $infos['id'];
          $_SESSION['nom'] = $infos['nom'];
          $_SESSION['prenom'] = $infos['prenom'];
          $_SESSION['email'] = $infos['email'];
          $_SESSION['admin'] = $infos['admin'];
          App::redirect('index.php');
        }
      }
      else{
        var_dump("Vos infos ne figurent pas sur notre site, veuillez les modifier ou vous inscrire !");
      }
    }

    public function modifier_nom($new_nom){
      $is_session = $_SESSION['id'];
      $update_nom = $this->db->prepare("UPDATE utilisateurs SET nom = '$new_nom' WHERE id = '$id_session' ");
      $update_nom->execute();

      $_SESSION['nom'] = $new_nom;
    }

    public function modifier_prenom($new_prenom){
      $id_session = $_SESSION['id'];
      $update_prenom = $this->db->prepare("UPDATE utilisateurs SET prenom = '$new_prenom' WHERE id = '$id_session'");
      $update_prenom->execute();

      $_SESSION['prenom'] = $new_prenom;
    }

    public function modifier_email($new_email){
      $id_session = $_SESSION['id'];
      $reqbdd = $this->db->prepare("SELECT * FROM utilisateurs WHERE email = '$new_email' ");
      $reqbdd->execute();
      $result = $reqbdd->fetch();
      if(empty($result)){
        $update_email = $this->db->prepare("UPDATE utilisateurs SET email = '$new_email' WHERE id = '$id_session'");
        $update_email->execute();
        $_SESSION['email'] = $new_email;
      }
      else
      {
        var_dump("cet email est déjà utilisé chez nous");
      }
    }

    public function modifier_mdp($new_mdp){
      $id_session = $_SESSION['id'];
      $mdp_up = password_hash($new_mdp, PASSWORD_BCRYPT);
      $update_mdp = $this->db->prepare("UPDATE utilisateurs SET password = '$mdp_up' WHERE id = '$id_session' ");
      $update_mdp->execute();
      $_SESSION['mdp'] = $new_mdp;
    }

    public function supprimer_son_compte(){
      $id_session = $_SESSION['id'];
      $supp_utilisateur = $this->db->prepare("DELETE FROM utilisateurs WHERE id = '$id_session'");
      $supp_utilisateur->execute();
      //changer les info dans historique d'achat
    }

    public function stocker_historique($id_utilisateur){
      // Insertion de l'achat dans la table sql
      $requete = $this->db->prepare("SELECT * FROM historique INNER JOIN produits
                              ON id_produit = produits.id
                              WHERE id_utilisateur = $id_utilisateur
                              ORDER BY date_achat DESC");
      $requete->execute();
      $historique = $requete->fetchall(PDO::FETCH_ASSOC);

      // afficher résultat dans un tab
      // var_dump($historique);
      echo '<table>';
      echo '<thead>';
      echo '<th> Produit </th>';
      echo '<th> Prix </th>';
      echo '<th> Quantité </th>';
      echo '<th> Date d\'Achat </th>';
      echo '</thead>';
      echo '<tbody>';
      foreach($historique as $recap)
      {
      // var_dump($recap);
      echo '<tr>';
      echo '<td>'.$recap['nom'].'</td>';
      echo '<td>'.$recap['prix'].'</td>';
      echo '<td>'.$recap['quantite'].'</td>';
      echo '<td>'.$recap['date_achat'].'</td>';
      echo '</tr>';
      }
      echo '</tbody>';
      echo '</table>';
    }

    public function afficher_historique(){
      $id_log = $_SESSION['id'];
      $historique = $this->db->prepare("SELECT nom_produit, date_achat FROM historique WHERE id_utilisateur = '$id_log'");
      $historique->execute();
      $historique->fetchall(PDO::FETCH_ASSOC);
    }

    public function devenir_admin(){
      # Permet de changer le statut de $admin en true
      $id_log = $_SESSION['id'];
      $admin = $this->db->prepare("UPDATE utilisateurs SET admin = 'true' WHERE id = '$id_log'");
      $admin->execute();

      $_SESSION['admin'] = true;
    }

    public function changer_statut(){
      $id_log = $_SESSION['id'];
      $membre = $this->db->prepare("UPDATE utilisateurs SET admin = 'false' WHERE id = '$id_log'");
      $membre->execute();

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
