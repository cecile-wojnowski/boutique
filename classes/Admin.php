<?php
class Admin extends Utilisateurs # La classe Admin hérite des propriétés de la classe Utilisateurs
{
  /****** Gestion des produits ******/
  public function ajouter_produit($nom, $prix, $description, $image, $date_ajout, $stock){
    # Ajoute un produit dans le site sans nécessairement le mettre dans une catégorie
    // cibler l'id du produit dans le panier valider
    $produits = $db->prepare("INSERT INTO nom, prix, description, image, date_ajout, stock VALUES (:nom, :prix, :description, :image, :date_ajout, :stock) ");
    $produits->execute(array,
                              ':nom' => $nom,
                              ':prix' => $prix,
                              ':description' => $description,
                              ':image' => $image,
                              ':date_ajout' => $date_ajout,
                              ':stock' => $stock);
    $result = $produits->fetch(PDO::FETCH_ASSOC);
  }
  public function valoriser_produit($id_produit){
    # Permet de mettre en avant un produit
    # La valorisation peut être une catégorie à part
    $valorisation = $db->prepare("UPDATE produits SET valorisation = 'promotion' WHERE id = $id_produit");
    $valorisation->execute();
  }

  public function supprimer_produit($id_produit_supp){
    $supp_produit = $db->prepare("DELETE FROM produits WHERE id = $id_produit_supp");
    $supp_produit->execute();
  }

  /***** Gestion des catégories *****/
  public function creer_categorie($nom_categorie){
    $categorie = $db->prepare("INSERT INTO categories (nom) VALUES ('$nom_categorie')")
    $categorie->exectue();
  }

  public function assigner_categorie($categorie){
    # Permet de mettre un produit dans une catégorie
    $recup_ctg = $db->prepare("SELECT * From categorie");
    $recup_ctg->execute();
    $ctg = $recup_ctg->fetch(PDO::FETCH_ASSOC);
    $result = $ctg["$categorie"]; // recup la ligne de la catégorie
    $id_categorie = $result['id']; // possible recup id direct d'un form (select option value = id)

    $assigner = $db->prepare("UPDATE produits SET id_categorie = $id_categorie");
    $assigner->execute();
  }

  public function changer_categorie($id_categorie){
    # Change le produit de catégorie
    $assigner = $db->prepare("UPDATE produits SET id_categorie = $id_categorie");
    $assigner->execute();
  }

  /***** Gestion des ventes *****/
  public function afficher_ventes(){
    # Affichage de tout l'historique des ventes
    $ventes = $db->prepare("SELECT nom_produit, date_achat, nom, prenom FROM historique INNER JOIN utilisateurs ON id_utilisateur = utilisateurs.id");
    $ventes->execute();
    $vendu = $ventes->fetch(PDO::FETCH_ASSOC);
  }
}
 ?>
