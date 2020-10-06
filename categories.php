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
      <h2> Catégorie choisie (remplacer par le nom de la catégorie) </h2>

      <?php
      $categorie = new Categorie();

      $id_categorie = 3; # doit devenir variable en provenant d'un get !
      $categorie->recuperer_produits($db, $id_categorie); ?>

      <div class='row'>
      <?php  $categorie->afficher_produits($db);

       ?>
     </div>







    </main>

    <?php include 'includes/footer.php'; ?>
  </body>
</html>
