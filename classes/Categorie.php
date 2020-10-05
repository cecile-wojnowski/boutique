<?php
class Categorie
{
  private $id;
  private $nom;
  # filtrer les produits appartenant à la catégorie grâce à la classe ?
  private $liste_produit = []; # Tableau contenant les produits de la catégorie
  private $liste_sous_categories; # Tableau contenant les sous-catégories liées à la catégorie

  public function afficher_produits(){
    # Permet de montrer les produits appartenant à la catégorie
  }

  public function afficher_sous_categories(){
    # Déroule les sous-catégories liées à la catégorie
  }

  // Hydratation
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
  }

  // Setters
  public function setId($id){
    $id = (int) $id;
    if ($id > 0)
    {
     $this->id = $id;
    }
  }
  public function setNom($nom){
    if (is_string($nom))
    {
      $this->nom = $nom;
    }
  }

  // Getters
  public function id(){
    return $this->id;
  }
  public function nom(){
    return $this->nom;
  }
  public function prix(){
    return $this->prix;
  }

}
 ?>
