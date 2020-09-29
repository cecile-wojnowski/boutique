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
    unset($this->liste_produits[$key]);
  }

  public function modifier_quantite($key, $post_value){
      $value = (int) $post_value;
      $this->liste_produits[$key] = $value;
  }
  public function calculer_prix_total($db){
    # Additionne le prix de tous les produits
    # doit récupérer le prix de l'article, et le multiplier par sa quantité
    # une requête doit récupérer le prix en fonction de l'id...
    # parcourir le tableau $liste_produits pour à chaque index récupérer le prix ?

    # Récupération des prix de chaque produit se trouvant dans le tableau $liste_produits
    $prix_total = 0;
    foreach($this->liste_produits() as $key => $value){
      $request = $db->query("SELECT prix FROM produits WHERE id = $key");
      $data = $request->fetch();
      $prix_total += $data["prix"];
    }
    echo $prix_total;
  }

  public function commander(){
    # Simulation de paiement : affichage d'un message de validation
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
