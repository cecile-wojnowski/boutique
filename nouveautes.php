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

    <?php include('includes/links.php');
          include('includes/fonctions.php');
    ?>
  </head>
  <body>
    <?php include('includes/header.php'); ?>
    <main>
      <h2> Les dernières nouveautés </h2>
      <div class="row">
        <?php
        afficher_nouveautes($db);
        ?>
      </div>
    </main>

    <?php include 'includes/footer.php'; ?>
  </body>

</html>
