<?php
class Admin extends Utilisateur # La classe Admin hérite des propriétés de la classe Utilisateur
{
  public $db;

  public function __construct($db){
    return $this->db = $db;
  }

  /****** Gestion des produits ******/
  public function ajouter_produit($nom, $prix, $description, $image, $stock, $valorisation, $id_categorie, $id_sous_categorie){
    # Ajoute un produit dans le site sans nécessairement le mettre dans une catégorie

    $produit = $this->db->prepare("INSERT INTO produits(nom, prix, description, image, date_ajout, stock, valorisation, id_categorie, id_sous_categorie) VALUES (:nom, :prix, :description, :image, NOW(), :stock, :valorisation, :id_categorie, :id_sous_categorie) ");
    $produit->bindParam(':nom', $nom);
    $produit->bindParam(':prix', $prix);
    $produit->bindParam(':description', $description);
    $produit->bindParam(':image', $image);
    $produit->bindParam(':stock', $stock);
    $produit->bindParam(':valorisation', $valorisation);
    $produit->bindParam(':id_categorie', $id_categorie);
    $produit->bindParam(':id_sous_categorie', $id_sous_categorie);

    $result = $produit->execute();
  }

  public function delete($id_client){
    $supp = $this->db->prepare("DELETE FROM utilisateurs WHERE id = ?");
     $supp->execute([$id_client]);
  }

  public function delete_produit($id_produit){
    $supp = $this->db->prepare("DELETE FROM produits WHERE id = ?");
     $supp->execute([$id_produit]);
     header("Location:admin.php");
  }

  public function change_admin($boleen, $id_client){
    $change = $this->db->prepare("UPDATE utilisateurs SET admin = ':boleen' WHERE id = ':id_client'");
    $change->bindParam(':boleen', $boleen);
    $change->bindParam(':id_client', $id_client);
    $change->execute();
  }

  public function creer_categorie($new_categorie){
    $nouvelle_categorie = $this->db->prepare("INSERT INTO categories(nom, nom_header) VALUES (:nom, :nom_header)");
    $nouvelle_categorie->bindParam(':nom', $new_categorie);
    $nouvelle_categorie->bindParam(':nom_header', $new_categorie);

    $result = $nouvelle_categorie->execute();
  }

  public function creer_sous_categorie($new_sous_categorie, $id_categorie){
    $nouvelle_sous_categorie = $this->db->prepare("INSERT INTO sous_categories(nom, id_categorie) VALUES (:nom, :id_categorie)");
    $nouvelle_sous_categorie->bindParam(':nom', $new_sous_categorie);
    $nouvelle_sous_categorie->bindParam(':id_categorie', $id_categorie);

    $result = $nouvelle_sous_categorie->execute();
  }
}
 ?>
