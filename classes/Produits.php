<?php
/*
Les informations des Produits doivent :
- provenir de la base de données (hydratation);
- être modifiable par l'admin : faut-il ajouter des getter et setter pour que les attributs
soient accessibles et modifiables ?
*/
class Produits
{
  private $id;
  private $nom;
  private $prix;
  private $description;
  private $image;
  private $date_ajout;
  private $quantite_stock;
  private $est_valorise = false;

  public function afficher_produit(){
    # Dirige vers la page du produit ?
  }

  public function hydrate(){

  }
  # Setters : servent à modifier les attributs en dehors de la classe
  # peut être faudra-t-il ajouter une requête sql pour que la modification se fasse dans la bdd
  public function setId($id){
    $id = (int) $id;
   // On vérifie si ce nombre est bien strictement positif.
   if ($id > 0)
   {
     // Si c'est le cas, c'est tout bon, on assigne la valeur à l'attribut correspondant.
     $this->_id = $id;
   }
 }
  }
  public function setNom($nom){
    if (is_string($nom))
    {
      $this->nom = $nom;
    }
  }
  public function setPrix($prix){
    $prix = (int) $prix;
   if ($prix > 0)
   {
     $this->prix = $prix;
   }
  }
  public function setDescription(){
    if (is_string($description))
    {
      $this->description = $description;
    }
  }
  public function setQuantite_stock($quantite_stock){
    $quantite_stock = (int) $quantite_stock;

   if ($quantite_stock >= 0) # Peut être égal à 0, mais ne peut pas être négatif
   {
     $this->quantite_stock = $quantite_stock;
   }
  }
  # Conditions à rajouter pour ces setters ?
  public function setImage(){
    return $this->image = $image;
  }
  public function setDate_ajout($date_ajout){
    return $this->date_ajout = $date_ajout;
  }

  public function setEst_valorise($est_valorise){
    return $this->est_valorise = $est_valorise;
  }

  # Getters : servent à accéder aux attributs en dehors de la classe
  public function nom(){
    return $this->nom;
  }
  public function prix(){
    return $this->prix;
  }
  public function description(){
    return $this->description;
  }
  public function image(){
    return $this->image;
  }
  public function date_ajout(){
    return $this->date_ajout;
  }
  public function quantite_stock(){
    return $this->quantite_stock;
  }
  public function est_valorise(){
    return $this->est_valorise;
  }
}
 ?>
