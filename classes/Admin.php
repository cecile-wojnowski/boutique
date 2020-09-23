<?php
class Admin extends Utilisateurs # La classe Admin hérite des propriétés de la classe Utilisateurs
{
  /****** Gestion des produits ******/
  public function ajouter_produit(){
    # Ajoute un produit dans le site sans nécessairement le mettre dans une catégorie
    
  }
  public function valoriser_produit(){
    # Permet de mettre en avant un produit
    # La valorisation peut être une catégorie à part
  }

  public function supprimer_produit(){

  }

  /***** Gestion des catégories *****/
  public function creer_categorie(){

  }

  public function assigner_categorie(){
    # Permet de mettre un produit dans une catégorie
  }

  public function changer_categorie(){
    # Change le produit de catégorie
  }

  /***** Gestion des ventes *****/
  public function afficher_ventes(){
    # Affichage de tout l'historique des ventes
  }
}
 ?>
