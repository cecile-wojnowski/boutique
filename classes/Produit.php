<?php
/*
Les informations des Produits doivent :
- provenir de la base de données (hydratation);
- être modifiables par l'admin
*/
class Produit
{
  private $id;
  private $nom;
  private $prix;
  private $prix_solde;
  private $description;
  private $image;
  private $date_ajout;
  private $stock;
  private $est_valorise = false;

# Cette fonction pourrait être simplifiée grâce à des variables
# Voir le cours d'OpenClassrooms : Manipulation de données stockées
# Hydratation des attributs
  public function hydrate(array $donnees)
  {
    if (isset($donnees['id']))
  {
    $this->setId($donnees['id']);
  }
  if (isset($donnees['nom']))
  {
    $this->setNom($donnees['nom']);
  }
  if (isset($donnees['prix']))
  {
    $this->setPrix($donnees['prix']);
  }
  if (isset($donnees['prix_solde']))
  {
    $this->setPrixSolde($donnees['prix_solde']);
  }
  if (isset($donnees['description']))
  {
    $this->setDescription($donnees['description']);
  }
  if (isset($donnees['image']))
  {
    $this->setImage($donnees['image']);
  }
  if (isset($donnees['date_ajout']))
  {
    $this->setDate_ajout($donnees['date_ajout']);
  }
  if (isset($donnees['stock']))
  {
    $this->setStock($donnees['stock']);
  }
  if (isset($donnees['est_valorise']))
  {
    $this->setEst_valorise($donnees['est_valorise']);
  }
  }

  # Setters : servent à modifier les attributs en dehors de la classe
  # peut être faudra-t-il ajouter une requête sql pour que la modification se fasse dans la bdd
  public function setId($id){
    $id = (int) $id;
   // On vérifie si ce nombre est bien strictement positif.
   if ($id > 0)
   {
     // Si c'est le cas, c'est tout bon, on assigne la valeur à l'attribut correspondant.
     $this->id = $id;
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
  public function setPrixSolde($prix_solde){
    $prix = (int) $prix_solde;
   if ($prix_solde > 0)
   {
     $this->prix_solde = $prix_solde;
   }
  }
  public function setDescription($description){
    if (is_string($description))
    {
      $this->description = $description;
    }
  }
  public function setStock($stock){
    $stock = (int) $stock;

   if ($stock >= 0) # Peut être égal à 0, mais ne peut pas être négatif
   {
     $this->stock = $stock;
   }
  }
  # Conditions à rajouter pour ces setters ?
  public function setImage($image){
    return $this->image = $image;
  }
  public function setDate_ajout($date_ajout){
    return $this->date_ajout = $date_ajout;
  }

  public function setEst_valorise($est_valorise){
    return $this->est_valorise = $est_valorise;
  }

  # Getters : servent à accéder aux attributs en dehors de la classe
  public function id(){
    return $this->id;
  }
  public function nom(){
    return $this->nom;
  }
  public function prix(){
    return $this->prix;
  }
  public function prix_solde(){
    return $this->prix_solde;
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

  # Affiche un message différent en fonction de la valeur de $stock
  public function stock(){
    if($this->stock > 0){
      return "Il reste" . " " . $this->stock . " " . "produits en stock.";
    }
  }
  public function est_valorise(){
    return $this->est_valorise;
  }
}
 ?>
