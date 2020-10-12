<?php
  session_start();

  include('includes/bdd.php');
  include('classes/Produit.php');
  include('classes/Panier.php');
  include('classes/Categorie.php');
  include('classes/SousCategorie.php');
?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Boutique</title>

    <?php include('includes/links.php'); ?>
  </head>
  <body>
    <?php include('includes/header.php'); ?>
    <main>
      <?php
      if(!isset($_GET['souscategorie'])){
      if(isset($_GET['id'])){
        # Lie l'id provenant d'un GET et l'id de la catégorie
        $id_categorie = $_GET['id'];
        $categorie = new Categorie($db, $id_categorie);

        # Permet l'affichage du nom de la catégorie
        $query = $db->prepare("SELECT nom_header FROM categories WHERE id = '$id_categorie'");
        $query->execute();
        while ($donnees = $query->fetch(PDO::FETCH_ASSOC)){?>
          <h2>  <?= $donnees['nom_header']; ?>  </h2>
          <?php
        } ?>

        <div class="row" id="placement_sous_categories">
          <?php
          # Afficher les sous-catégories liées à la catégorie
          $categorie->afficher_sous_categories($db, $id_categorie); ?>
        </div>

        <!-- Affiche les produits -->
        <div class='row'>
        <?php  $categorie->afficher_produits($db); ?>
       </div>

       <?php
     }
   }

     if(isset($_GET['id']) AND isset($_GET['souscategorie'])){
        $id_sous_categorie = $_GET['souscategorie'];
        $sousCategorie = new SousCategorie($db, $id_sous_categorie);

        # Afficher la catégorie parente (dans un breadcrumb ?) ?>
        <h3>Catégorie parente : <?php $sousCategorie->afficher_categorie_parente($db, $id_sous_categorie); ?> </h3>

         <div class="row">
           <?php
             $sousCategorie->afficher_produits($db); ?>
         </div>

        <?php
      }

     ?>

    </main>
    <?php include 'includes/footer.php'; ?>
  </body>
</html>
