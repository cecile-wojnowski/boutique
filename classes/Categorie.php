<?php
class Categorie
{
  private $id;
  private $nom;
  # filtrer les produits appartenant à la catégorie grâce à la classe ?
  private $liste_produits = []; # Tableau contenant les produits de la catégorie
  private $liste_sous_categories; # Tableau contenant les sous-catégories liées à la catégorie

  public function recuperer_produits($db, $id_categorie){
    # Remplir la liste de produits avec tous les produits ayant le bon id dans la bdd
    $query = $db->prepare("SELECT id, nom FROM produits WHERE id_categorie = '$id_categorie'");
    $query->execute();

    while ($donnees = $query->fetch(PDO::FETCH_ASSOC)){
      echo $donnees['id'] . " ";
      echo $donnees['nom'] . "<br>";

      # On place les id des produits dans le tableau
      $this->liste_produits[] = $donnees['id'];
    }

    var_dump($this->liste_produits);

  }

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
  public function liste_produits(){
    return $this->liste_produits;
  }

}
 ?>
