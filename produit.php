<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://kit.fontawesome.com/eaf570753d.js" crossorigin="anonymous"></script>
  </head>
  <body>
    <?php include('includes/header.php'); ?>

    <main>
      <!-- Breadcrumb -->
        <div class="nav-wrapper">
          <div class="col s12">
            <a href="#!" class="breadcrumb grey-text">Accueil</a>
            <a href="#!" class="breadcrumb grey-text">Nouveautés</a>
            <a href="#!" class="breadcrumb grey-text">Noisettes</a>
          </div>
        </div>



        <!-- Image -->
        <div class="row">
          <div class="col s3 m3 offset-m1">
            <div class="card">
              <div class="card-image">
                <a href="#"> <img src="img/nuts.jpg"> </a>
              </div>
            </div>
          </div>



        <div class="col s3 m3 offset-m1">
          <!-- Elements divers -->
          <p>Nom du produit</p>
          <p>Prix du produit</p>

          <p> Quantité </p>
          <p> Elément à insérer ici </p>

          <!-- Boutons -->
          <div class= "boutons_produit">
          <a id="bouton_produit1" class="waves-effect waves-green btn grey lighten-3 grey-text text-darken-2">
            <i class="material-icons left">shopping_cart</i>Panier</a>

            <a class="waves-effect waves-green btn grey darken-4 lighten-3 white-text">
              Acheter maintenant</a>
          </div>
        </div>

        <div class="col s3 m3">
          <!-- Texte -->
          <h2 class="h2_produit"> Nom du produit </h2>
          <p> Description du produit </p>
        </div>
      </div>

    </main>


<?php include('includes/footer.php'); ?>
</body>
</html>
