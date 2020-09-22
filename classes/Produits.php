<?php
/*
Les informations des Produits doivent :
- provenir de la base de données (hydratation);
- être modifiable par l'admin : faut-il ajouter des getter et setter pour que les attributs
soient accessibles et modifiables ?
*/
class Produits
{
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
  public function setNom($nom){
    return $this->nom = $nom;
  }
  public function setPrix($prix){
    return $this->prix = $prix;
  }
  public function setDescription(){
    return $this->description = $description;
  }
  public function setImage(){
    return $this->image = $image;
  }
  public function setDate_ajout($date_ajout){
    return $this->date_ajout = $date_ajout;
  }
  public function setQuantite_stock($quantite_stock){
    return $this->quantite_stock = $quantite_stock;
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
