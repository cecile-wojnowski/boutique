<?php
  session_start();

  include('includes/bdd.php');
  include('classes/Produit.php');
  include('classes/Panier.php');
  if(isset($_SESSION["panier"])) {
    $panier = unserialize($_SESSION['panier']);
  }
?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title> Récapitulatif </title>

    <?php include('includes/links.php'); ?>
  </head>
  <body>
    <?php include('includes/header.php'); ?>
    <main> <!-- Cette page permet de visualiser le contenu du panier de l'utilisateur -->
      <h2> Récapitulatif de ma commande </h2>

    </main>
    <?php include('includes/footer.php'); ?>
  </body>
</html>
