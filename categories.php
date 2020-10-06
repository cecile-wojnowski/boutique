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

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <!-- <script src="https://kit.fontawesome.com/eaf570753d.js" crossorigin="anonymous"></script> -->
  </head>
  <body>
    <?php include('includes/header.php'); ?>
    <main>


      <?php
      $categorie = new Categorie();

      $id_categorie = 3;
      $categorie->recuperer_produits($db, $id_categorie); ?>

      <div class='row'>
      <?php  $categorie->afficher_produits($db);

       ?>
     </div>







    </main>

    <?php include 'includes/footer.php'; ?>
  </body>
</html>
