<?php
  session_start();

  include('includes/bdd.php');
  include('classes/Produit.php');
  include('classes/Panier.php');
  include('classes/Categorie.php');
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
      if(isset($_GET['id'])){
        # L'id provenant de GET permet d'afficher les produits de la catégorie ayant cet id
        $id_categorie = $_GET['id'];
        $categorie = new Categorie();
        $categorie->recuperer_produits($db, $id_categorie); ?>

        <h2>  Nom catégorie  </h2>
        <div class='row'>
        <?php  $categorie->afficher_produits($db); ?>
       </div>
       <?php
      }else{
        header('Location:index.php'); # Redirige si on tente d'aller sur cette page sans avoir choisi une catégorie
      } ?>











    </main>

    <?php include 'includes/footer.php'; ?>
  </body>
</html>
