<?php
class Utilisateur
{
  private $id;
  private $nom;
  private $prenom;
  private $email;
  private $etat_panier; # true = rempli, false = vide
  private $admin = false; # Un nouvel utilisateur n'est pas un admin

  public function creer_compte(){

  }

  public function supprimer_compte(){

  }

  public function stocker_historique(){
    # Insertion de l'achat dans la table sql
  }

  public function afficher_historique(){

  }

  public function devenir_admin(){
    # Permet de changer le statut de $admin en true
  }
}
?>
