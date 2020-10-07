<?php
class Panier
{
  private $id_utilisateur = ""; # valeur temporaire qui devra changer
  private $etat_panier = false; # true = rempli, false = vide
  private $liste_produits = []; # tableau rempli avec les id des produits
  private $prix_total = 0; # Prix du panier vide

  public function __construct(){
    $this->etat_panier = true;
    $this->id_utilisateur = $_SESSION['id'];
  }

  public function ajouter_produit($produit, $quantite = 1){
    # Ajoute l'id du produit dans le tableau
    if(isset($this->liste_produits[$produit])) {
      $this->liste_produits[$produit] = $this->liste_produits[$produit] + $quantite;
    } else {
      $this->liste_produits[$produit] = $quantite;
    }

  }
  public function afficher_produits(){
    # Afficher tous les produits contenus dans l'array
    # mettre le code se trouvant dans panier.php plus tard ici ?
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
    # Récupération des prix de chaque produit se trouvant dans le tableau $liste_produits
    foreach($this->liste_produits() as $key => $value){
      $request = $db->query("SELECT prix FROM produits WHERE id = $key");
      $data = $request->fetch();

      # On stocke dans un tableau le résultat de la multiplication du prix par sa quantité
      $prix_quantite[] =  $data["prix"] * $value;
    }

    # On additionne les prix contenus dans $prix_quantite pour avoir le prix total
    $prix_total = 0;
    foreach($prix_quantite as $value){
      $prix_total += $value;
    }
    echo $prix_total;
  }

  public function commander($db){
    # Stocke la commande dans l'historique
    foreach($this->liste_produits() as $key => $value){
      $request = $db->query("INSERT INTO historique (id_produit, quantite, date_achat, id_utilisateur)
      VALUES ('$key', '$value', NOW(), '$this->id_utilisateur')");

      # On soustrait du stock la quantité achetée
      $query = $db->query("UPDATE produits SET stock = stock - '$value' WHERE id = '$key' AND stock > 0");
    }

    # Si la requête fonctionne, on affiche un message de confirmation et on vide le panier
    if($request){
      $this->liste_produits = [];
      var_dump($this->liste_produits);
      unset($_SESSION['panier']);
      echo "Commande validée";
    }

    # Optionnel : Si la commande n'est pas passée, on enregistre le panier
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
  public function id_utilisateur(){
    return $this->id_utilisateur;
  }
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
