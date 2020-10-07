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


      <div class="row">
        <?php
          if(isset($_POST['search']) AND !empty($_POST['search'])){ ?>
            <h2> Vos résultats de recherche </h2>
            <div class="row">
            <div class="col m3 offset-m5">
            <form class="barre_recherche" method="post" action="recherche.php">
              <input id="search" type="search" name="search" placeholder ="Rechercher...">
              <label class="label-icon" for="search"></label>
            </form>
          </div>
        </div>
            <?php
            $recherche = $_POST['search'];
            rechercher($db, $recherche);
          }else{ ?>
            <h2> Effectuer une recherche </h2>
            <div class="col m3 offset-m5">
            <form class="barre_recherche" method="post" action="recherche.php">
              <input id="search" type="search" name="search" placeholder ="Rechercher...">
              <label class="label-icon" for="search"></label>
            </form>
          </div>

          <?php }
        ?>
      </div>
    </main>

    <?php include 'includes/footer.php'; ?>
  </body>

</html>
