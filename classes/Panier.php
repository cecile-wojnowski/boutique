<?php
class Panier
{
  private $etat_panier = false; # true = rempli, false = vide
  private $liste_produits;
  private $quantite_produits;
  private $prix_total = 0; # Prix du panier vide

  public function ajouter_produit(){
    # Affiche le nom, le prix et l'image du produit
  }

  public function supprimer_produit(){
    # Retire un produit de la liste
  }

  public function modifier_quantite(){

  }
  public function calculer_prix_total(){
    # Additionne le prix de tous les produits
  }

  public function commander(){
    # Simulation de paiement
    # Stocke la commande dans l'historique
    # Vide le panier - Si la commande n'est pas passée, on enregistre le panier
  }
}
 ?>
