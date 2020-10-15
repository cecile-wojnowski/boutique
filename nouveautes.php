<?php
  session_start();
  include("classes/autoloader.php");
  include('includes/bdd.php');
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
      <div class="row" id="produits_espace">
        <?php
        afficher_nouveautes($db);
        ?>
      </div>
    </main>

    <?php include 'includes/footer.php'; ?>
  </body>

</html>
