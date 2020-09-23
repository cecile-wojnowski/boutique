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

    <main> <!-- Cette page permet de visualiser le contenu du panier de l'utilisateur -->
      <h2 class="h2_produit"> Mon panier </h2>

      <div class="row">
        <div class="col s1 m2 offset-m1">
          <div class="card">
            <div class="card-image">
              <a href="#"> <img src="img/nuts.jpg"> </a>
            </div>
          </div>
        </div>

        <div class="col s1 m2 offset-m1">
          <p>Nom du produit</p>
        </div>

        <div class="col s1 m2 offset-m1">
          <p>Quantité</p>
        </div>

        <div class="col s1 m2 offset-m1">
          <p> Prix </p>
        </div>
      </div>

      <div class="row">
        <div class="col m1 offset-m10">
          <div class="row_panier">
            <h2 class="h2_produit"> Total </h2>
            <p> Prix </p>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col m3 offset-m9">
        <div class= "boutons_produit">
          <a class="waves-effect waves-green btn grey darken-4 lighten-3 white-text">
          Commander </a>
        </div>
      </div>
    </div>
    </main>

    <?php include('includes/footer.php'); ?>
  </body>
  </html>
