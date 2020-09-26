<?php
session_start(); ?>
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
    <?php include('includes/header.php');
          include('includes/bdd.php');
          include('classes/Produit.php');
          include('classes/Panier.php'); ?>

    <main> <!-- Cette page permet de visualiser le contenu du panier de l'utilisateur -->
      <h2 class="h2_produit"> Mon panier </h2>

      <!-- Le contenu du panier doit s'affichier à la place du contenu statique -->
      <div class="row">
      <?php
      if(isset($_SESSION['panier'])){

        $panier = unserialize($_SESSION['panier']);

        # Il faut récupérer l'id du produit dans le tableau $liste_produits
        # pour utiliser cet id en faisant une requête sql qui permettra d'afficher les infos du produits.
        # La quantité, quant à elle, proviendra du tableau lui-même.
        foreach($panier->liste_produits() as $key => $value){
          $request = $db->query("SELECT * FROM produits WHERE id = $key");
          $data = $request->fetch();
        ?>

        <div class="col s1 m2 offset-m1">
          <div class="card">
            <div class="card-image">
              <a href="#"> <img src="img/<?= $data["image"] ?>"> </a>
            </div>
          </div>
        </div>

        <div class="col s1 m2 offset-m1">
          <p><?= $data["nom"] ?></p>
        </div>

        <div class="col s1 m2 offset-m1">
          <p><?= $value ?></p>
        </div>

        <div class="col s1 m2 offset-m1">
          <p><?= $data["prix"] ?> euros</p>
        </div>
        </div>

        <?php
            }
          }
           ?>

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

    <?php include 'includes/footer.php'; ?>
  </body>
  </html>
