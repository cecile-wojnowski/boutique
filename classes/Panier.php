<?php
class Panier
{
  private $etat_panier = false; # true = rempli, false = vide
  private $liste_produits = []; # tableau rempli avec les id des produits
  #private $quantite_produits = 1; # La quantité de base des produits est de 1
  private $prix_total = 0; # Prix du panier vide

  public function __construct(){
    $this->etat_panier = true;
  }

  public function ajouter_produit($produit, $quantite = 1){
    # Ajoute l'id du produit dans le tableau
    # $this->liste_produits[] = $produit;

    if(isset($this->liste_produits[$produit])) {
      $this->liste_produits[$produit] = $this->liste_produits[$produit] + $quantite;
    } else {
      $this->liste_produits[$produit] = $quantite;
    }

  }
  public function afficher_produits(){
    # Afficher tous les produits contenus dans l'array
    # mettre le code se trouvant dans panier.php plus tard ici
  }

  public function supprimer_produit($key){
    # Retire un produit de la liste
    var_dump($key);
    unset($this->liste_produits[$key]);
    var_dump($this->liste_produits);
  }

  public function modifier_quantite($post_value){
    foreach($this->liste_produits() as $key => $value){
      $value = (int) $post_value;
      var_dump($value);
      $this->liste_produits[$key] = $value;
    }
  }
  public function calculer_prix_total(){
    # Additionne le prix de tous les produits
  }

  public function commander(){
    # Simulation de paiement
    # Stocke la commande dans l'historique
    # Vide le panier - Si la commande n'est pas passée, on enregistre le panier
  }

  # Setters permettant de vérifier certaines conditions
  public function setQuantite_produits($quantite_produits){
    $quantite_produits = (int) $quantite_produits;
   if ($quantite_produits > 0)
   {
     $this->quantite_produits = $quantite_produits;
   }
 }
 public function setPrix_total($prix_total){
   $prix_total = (int) $prix_total;
  if ($prix_total > 0)
  {
    $this->prix_total = $prix_total;
  }
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
