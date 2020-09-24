<?php
  class Utilisateurs
  {
    private $id;
    public $nom = "";
    public $prenom = "";
    public $email = "";
    public $mdp = "";
    private $etat_panier = false; # true = rempli (pas vide), false = vide
    private $admin = false; # Un nouvel utilisateur n'est pas un admin

    

    public function creer_compte($nom, $prenom, $mail, $mdp){
      // verif si mail (nom utilisateur de la boutique) n'existe pas deja !!
      $mdp_crypt = password_hash($mdp, PASSWORD_BCRYPT);
      $inscription = $db->prepare('INSERT INTO utilisateurs (nom, prenom, email, password) VALUES (:nom, :prenom, :mail, :mdp)');
      $insccription->execute(array(
                                    ':nom' => $nom,
                                    ':prenom' => $prenom,
                                    ':mail' => $mail,
                                    ':mdp' => $mdp_crypt));
    }

    public function modifier_nom($new_nom){
      $update_nom = $db->prepare("UPDATE utilisateurs SET nom = $new_nom WHERE id = $id");
      $update_nom->execute();
      $_SESSION['nom'] = $new_nom;
    }

    public function modifier_prenom($new_prenom){
      $update_prenom = $db->prepare("UPDATE utilisateurs SET prenom = $new_prenom WHERE id = $id");
      $update_prenom->execute();
      $_SESSION['prenom'] = $new_prenom;
    }

    public function modifier_email($new_email){
      $update_email = $db->prepare("UPDATE utilisateurs SET email = $new_email WHERE id = $id");
      $update_email->execute();
      $_SESSION['email'] = $new_email;
    }

    public function modifier_mdp($new_mdp){
      $mdp_up = password_hash($new_mdp, PASSWORD_BCRYPT);
      $update_mdp = $db->prepare("UPDATE utilisateurs SET mdp = $mdp_up WHERE id = $id");
      $update_mdp->execute();
      $_SESSION['mdp'] = $new_mdp;
    }

    public function supprimer_compte(){
      $log = $_SESSION['email'];
      $supp_utilisateur = $db->prepare("DELETE FROM utilisateurs WHERE email = $log ");
      $supp_utilisateur->execute(); // supp en cascade dans sql avec historique d'achat
      // ajouter dans la condition php la supp de la session si supp himself
    }

    public function stocker_historique(){
      # Insertion de l'achat dans la table sql
    }

    public function afficher_historique(){
      $log = $_SESSION['id'];
      $historique = $db->prepare("SELECT nom_produit, date_achat FROM historique WHERE id_utilisateur = $log");
      $historique->execute();
      $historique->fetch(PDO::FETCH_ASSOC);
    }

    public function devenir_admin(){
      # Permet de changer le statut de $admin en true
      $log = $_SESSION['id'];
      $admin = $db->prepare("UPDATE utilisateurs SET admin = 'true' WHERE id = $log ");
      $admin->execute();
      $_SESSION['admin'] = true;
    }

    public function changer_statut(){
      $log = $_SESSION['id'];
      $membre = $db->prepare("UPDATE utilisateurs SET admin = 'false' WHERE id = $log ");
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
