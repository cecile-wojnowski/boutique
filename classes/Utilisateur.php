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
      $req = $this->db->prepare("SELECT * FROM utilisateurs WHERE email = ?");
      $req->execute([$email]);

      if($req->fetchColumn() == 0){
        $mdp_crypt = password_hash($mdp, PASSWORD_BCRYPT); // cryptage mdp

        $inscription = $this->db->prepare("INSERT INTO utilisateurs (nom, prenom, email, password) VALUES (?, ?, ?, ?)");
        $inscription->execute([$nom, $prenom, $email, $mdp_crypt]);

          $location = App::redirect('connexion.php');
      }
      else{
        // systeme de message d'erreur a étudier
        echo "Cet email existe déjà chez nous !";
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
      $update_nom = $this->db->query("UPDATE utilisateurs SET nom = ? WHERE id = ?", [$new_nom, $_SESSION['id']]);

      $_SESSION['nom'] = $new_nom;
    }

    public function modifier_prenom($new_prenom){
      $update_prenom = $this->db->query("UPDATE utilisateurs SET prenom = ? WHERE id = ?", [$new_prenom, $_SESSION['id']]);

      $_SESSION['prenom'] = $new_prenom;
    }

    public function modifier_email($new_email){
      $reqbdd = $db->query("SELECT * FROM utilisateurs WHERE email = ?", [$new_email]);
      $result = $reqbdd->fetch();
      if(empty($result)){
        $update_email = $this->db->query("UPDATE utilisateurs SET email = ? WHERE id = ?", [$new_email, $_SESSION['id']]);
        $_SESSION['email'] = $new_email;
      }
      else
      {
        var_dump("cet email est déjà utilisé chez nous");
      }
    }

    public function modifier_mdp($new_mdp){
      $mdp_up = password_hash($new_mdp, PASSWORD_BCRYPT);
      $update_mdp = $this->db->query("UPDATE utilisateurs SET password = ? WHERE id = ?", [$mdp_up, $_SESSION['id']]);

      $_SESSION['mdp'] = $new_mdp;
    }

    public function supprimer_son_compte(){
      $supp_utilisateur = $this->db->query("DELETE FROM utilisateurs WHERE id = ? ", [$_SESSION['id']]);
      //changer les info dans historique d'achat
    }

    public function stocker_historique($id_utilisateur){
      // Insertion de l'achat dans la table sql
      $requete = $this->db->query("SELECT * FROM historique INNER JOIN produits
                              ON id_produit = produits.id
                              WHERE id_utilisateur = ?
                              ORDER BY date_achat DESC", [$id_utilisateur]);
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
