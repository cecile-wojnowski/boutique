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

  public function delete($id_client){
    $supp = $this->db->query("DELETE FROM utilisateurs WHERE id = ?", [$id_client]);
    $location = App::redirect('admin.php');
  }

  public function change_admin($boleen, $id_client){
    $change = $this->db->query("UPDATE utilisateurs SET admin = ? WHERE id = ?", [$boleen, $id_client]);
    $location = App::redirect('admin.php');
  }

  public function creer_categorie($new_categorie){
    $new_categorie = $this->db->query("INSERT INTO categorie(nom, nom_header) VALUES ?, ?", [$new_categorie, $new_categorie]);
  }
}
 ?>
