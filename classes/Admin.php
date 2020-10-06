<?php
class Admin extends Utilisateur # La classe Admin hérite des propriétés de la classe Utilisateur
{
  public $db;

  public function __construct($db){
    return $this->db = $db;
  }

  /****** Gestion des produits ******/
  public function ajouter_produit($nom, $prix, $description, $image, $stock, $valorisation, $id_categorie, $id_sous_categorie, $date_ajout){
    # Ajoute un produit dans le site sans nécessairement le mettre dans une catégorie
    $produit = $this->db->query("INSERT INTO produits(nom, prix, description, image, date_ajout, stock, valorisation, id_categorie, id_sous_categorie) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?) ", 
    [$nom,
    $prix,
    $description,
    $image,
    $date_ajout,
    $stock,
    $valorisation,
    $id_categorie,
    $id_sous_categorie]);
  }
}
 ?>
