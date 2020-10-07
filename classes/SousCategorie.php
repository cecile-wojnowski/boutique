<?php
class SousCategorie extends Categorie
{
  # La classe SousCategories hérite des méthodes de Categories
  # Mais elle doit avoir des attributs différents
  private $id;
  private $nom;
  private $liste_produits_souscat = [];

  public function __construct($db, $id_sous_categorie) {
    # Remplir la liste de produits avec tous les produits ayant le bon id dans la bdd
    $query = $db->prepare("SELECT id, nom FROM produits WHERE id_sous_categorie = '$id_sous_categorie'");
    $query->execute();

    while ($donnees = $query->fetch(PDO::FETCH_ASSOC)){
      # On place les id des produits dans le tableau
      $this->liste_produits_souscat[] = $donnees['id'];
    }
  }

  public function afficher_produits($db, $tableau = null) {

    parent::afficher_produits($db, $tableau = $this->liste_produits_souscat);

  }

  public function afficher_categorie_parente($db, $id_sous_categorie){
    # Récupère l'id de la catégorie parente et affiche son nom : jointure sql
    $query = $db->prepare("SELECT * FROM sous_categories INNER JOIN categories ON sous_categories.id_categorie = categories.id
    WHERE sous_categories.id = '$id_sous_categorie'");
    $query->execute();

    while ($donnees = $query->fetch(PDO::FETCH_ASSOC)){
      echo $donnees['nom_header'];
    }
  }

}
