<?php
/*
Les informations des Produits doivent :
- provenir de la base de données (hydratation);
- être modifiable par l'admin : faut-il ajouter des getter et setter pour que les attributs
soient accessibles et modifiables ?
*/
class Produit
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

# Cette fonction pourrait être simplifiée grâce à des variables
# Voir le cours d'OpenClassrooms : Manipulation de données stockées
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
  if (isset($donnees['quantite_stock']))
  {
    $this->setQuantite_stock($donnees['quantite_stock']);
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
  public function setDescription($description){
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
