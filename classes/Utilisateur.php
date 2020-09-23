<?php
class Utilisateurs
{
  private $id;
  public $nom = "";
  public $prenom = "";
  public $email = "";
  private $etat_panier = false; # true = rempli (pas vide), false = vide
  private $admin = false; # Un nouvel utilisateur n'est pas un admin

  public function creer_compte($nom, $prenom, $mail){
    $inscription = $db->prepare('INSERT INTO utilisateurs(nom, prenom, email) VALUES (:nom, :prenom, :mail)');
    $insccription->execute(array,
                                  ':nom' => $nom,
                                  ':prenom' => $prenom,
                                  ':mail' => $mail);
    echo 'entrée en bdd';
  }

  public function supprimer_compte(){
    $supp_utilisateur = $db->prepare("DELETE FROM utilisateurs WHERE email = $_SESSION['mail'] ");
    $supp_utilisateur->execute(); // supp en cascade dans sql avec historique d'achat
    // ajouter dans la condition php la supp de la session si supp himself
  }

  public function stocker_historique(){
    # Insertion de l'achat dans la table sql
  }

  public function afficher_historique(){
    $historique = $db->prepare("SELECT nom_produit, date_achat FROM historique WHERE id_utilisateur = $_SESSION['id']");
    $historique->execute();
    $historique->fetch(PDO::FETCH_ASSOC);
  }

  public function devenir_admin(){
    # Permet de changer le statut de $admin en true
    $admin = $db->prepare("UPDATE utilisateurs SET admin = 'true' WHERE id = $_SESSION['id'] ");
    $admin->execute();
    $_SESSION['admin'] = true;
  }

  public function changer_statut(){
    $membre = $db->prepare("UPDATE utilisateurs SET admin = 'false' WHERE id = $_SESSION['id'] ");
    $membre->execute();
    $_SESSION['admin'] = false,
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
