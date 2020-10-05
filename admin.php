<?php
  session_start();
  require "classes/autoloader.php";

  $db = App::getDatabase();
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
    <script src="https://kit.fontawesome.com/eaf570753d.js" crossorigin="anonymous"></script>
</head>
<body>
    <?php include 'includes/header.php'; ?>

    <main id="admin">
        <?php include 'includes/php_admin.php'; ?>

        <div class="row">
        <form id="form_ajout_produit" class="col s8 m8 offset-s3 offset-m3" action="admin.php" method="POST">
          <div class="row">
            <div class="col s4 m4 offset-s2 offset-m2">
              <h2 > Ajouter un Produit </h2>
            </div>

          </div>
          <div class="row">
            <div class="input-field col m8 s8">
                    <span class="btn btn-file">
                        <i class="material-icons left">cloud_upload</i>
                        Télécharger Image du Produit<input type="file">
                </div>
            </div>
          </div>

          <div class="row">
            <div class="input-field col m8 s8">
              <input id="nom" type="text" class="validate" name="nom" required>
              <label for="nom">Nom</label>
            </div>
          </div>
          <div class="row">
            <div class="input-field col m8 s8">
              <textarea name="description" id="description" class="validate" cols="30" rows="10"></textarea>
              <label for="description">Description</label>
            </div>
          </div>
          <div class="row">
            <div class="input-field col m8 s8">
              <input id="stock" type="text" class="validate" name="stock" required>
              <label for="stock"> Quantité </label>
            </div>
          </div>

          <div class="row">
            <div class="input-field col m8 s8">
              <input id="prix" type="text" class="validate" name="prix">
              <label for="prix"> Prix </label>
            </div>
          </div>

          <div class="row">
            <div class="input-field col m8 s8">
                <p>
                    <label>
                        <input class="with-gap validate" name="valorisation" type="radio" required/>
                        <span>Produit Valorisé</span>
                    </label>
                </p>
                <p>
                    <label>
                        <input class="with-gap validate" name="valorisation" type="radio" required/>
                        <span>Produit normal</span>
                    </label>
                </p>
            </div>
          </div>

          <div class="row">
            <div class="input-field col m3 s3 offset-m3 offset-s3">
              <button class="btn waves-effect waves-light grey darken-4" type="submit" name="ajouter">
                Ajouter<i class="material-icons right">create</i>
              </button>
            </div>
          </div>
        </form>
      </div>
    </main>

    <?php include 'includes/footer.php'; ?>
</body>
</html>