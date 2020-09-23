<?php
class Panier
{
  private $etat_panier = false; # true = rempli, false = vide
  private $liste_produits = []; # tableau rempli avec les id des produits
  private $quantite_produits;
  private $prix_total = 0; # Prix du panier vide

  public function __construct(){
    $this->etat_panier = true;
  }

  public function ajouter_produit($produit){
    # Ajoute l'id du produit dans le tableau
    # $this->liste_produits[] = $produit;
    array_push($this->liste_produits, $produit);
  }
  public function afficher_produits(){
    # Afficher tous les produits contenus dans l'array
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

  # Getters : servent à accéder aux attributs en dehors de la classe
  public function etat_panier(){
    return $this->etat_panier;
  }
  public function liste_produits(){
    return $this->liste_produits;
  }
  public function quantite_produits(){
    return $this->quantite_produits;
  }
  public function prix_total(){
    return $this->prix_total;
  }
}
 ?>
