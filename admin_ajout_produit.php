<?php
include 'includes/bdd.php';

  session_start();
  require "classes/autoloader.php";
  if (!isset($_SESSION['email'])){
    header("Location:index.php");
  } else {
    if($_SESSION["admin"] == 0) {
      header("Location:index.php");
    }
  }
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Boutique / Admin</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <!-- <script src="https://kit.fontawesome.com/eaf570753d.js" crossorigin="anonymous"></script> -->
</head>
<body>
    <?php include 'includes/header.php'; ?>

    <main id="admin">
      <div class="row">
        <form id="form_ajout_produit" class="col s8 m8 offset-s3 offset-m3" action="admin.php" method="POST">
          <div class="row">
            <div class="col s8 m8">
              <h2 > Ajouter un Produit </h2>
            </div>
          </div>
          <div class="row">
            <div class="input-field col s4 m6">
                    <span class="btn btn-file">
                        <i class="material-icons left">cloud_upload</i>
                        Télécharger Image du Produit<input type="file" name="image" id="image">
                    </span>
                </div>
            </div>
          </div>
          <div class="row">
            <div class="input-field col s4 m6 offset-s3 offset-m3">
              <input id="nom" type="text" class="validate" name="nom" required>
              <label for="nom">Nom</label>
            </div>
          </div>
          <div class="row">
            <div class="input-field col s4 m6 offset-s3 offset-m3">
              <textarea name="description" id="description" class="validate" cols="30" rows="10"></textarea>
              <label for="description">Description</label>
          </div>
          <div class="input-field col s4 m6 offset-s3 offset-m3">
            <label for="categorie"></label>
              <select class="browser-default" name="categorie" id="categorie">
                <option value="" selected>Choisir une Catégorie</option>
                <?php require 'includes/foreach_categorie.php'; ?>
              </select>
          </div>
          <div class="input-field col s4 m6 offset-s3 offset-m3">
            <input type="text" name="new_categorie" id="new_categorie">
            <label for="new_categorie">Nouvelle Catégorie</label>
          </div>

          <div class="input-field col s4 m6 offset-s3 offset-m3">
            <label for="sous_categorie"></label>
              <select class="browser-default" name="sous_categorie" id="sous_categorie">
                <option value="" selected>Choisir une Sous-Catégorie</option>
                <?php require 'includes/foreach_sous_categorie.php'; ?>
              </select>
          </div>
          <div class="input-field col s4 m6 offset-s3 offset-m3">
            <input type="text" name="new_sous_categorie" id="new_sous_categorie">
            <label for="new_sous_categorie">Nouvelle sous-catégorie</label>
          </div>
          <div class="row">
            <div class="input-field col s4 m6 offset-s3 offset-m3">
              <input id="stock" type="text" class="validate" name="stock" required>
              <label for="stock"> Quantité en Kg</label>
            </div>
          </div>

          <div class="row">
            <div class="input-field col s4 m6 offset-s3 offset-m3">
              <input id="prix" type="text" class="validate" name="prix">
              <label for="prix"> Prix en €/Kg </label>
            </div>
          </div>

          <div class="row">
            <div class="input-field col s4 m6 offset-s3 offset-m3">
                <p>
                    <label>
                        <input class="with-gap validate" id="valorisation" name="valorisation" type="radio" value="1" required/>
                        <span>Produit Valorisé</span>
                    </label>
                </p>
                <p>
                    <label>
                        <input class="with-gap validate" id="non" name="valorisation" type="radio" value="0" required/>
                        <span>Produit normal</span>
                    </label>
                </p>
            </div>
          </div>

          <div class="row">
            <div class="input-field col m6 s3 offset-m5 offset-s5">
              <button class="btn waves-effect waves-light grey darken-4" type="submit" name="ajouter_produit">
                Ajouter<i class="material-icons right">create</i>
              </button>
            </div>
          </div>
        </form>
      </div>
    </main>

    <?php
      include 'includes/footer.php';
    ?>
</body>
</html>
