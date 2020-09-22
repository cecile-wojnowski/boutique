<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Inscription</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://kit.fontawesome.com/eaf570753d.js" crossorigin="anonymous"></script>
  </head>
  <body>
    <?php include('includes/header.php'); ?>
    <h2 class="h2_form"> Créer un compte </h2>
    <div class="row">
        <form id="form_inscription" class="col s8 m8 offset-s3 offset-m3">
          <div class="row">
            <div class="input-field col m8 s8">
              <input id="first_name" type="text" class="validate">
              <label for="first_name">Prénom</label>
            </div>
          </div>
          <div class="row">
            <div class="input-field col m8 s8">
              <input id="last_name" type="text" class="validate">
              <label for="last_name">Nom</label>
            </div>
          </div>
          <div class="row">
            <div class="input-field col m8 s8">
              <input id="email" type="email" class="validate">
              <label for="email">Email</label>
            </div>
          </div>
          <div class="row">
            <div class="input-field col m8 s8">
              <input id="password" type="password" class="validate">
              <label for="password">Mot de passe </label>
            </div>
          </div>
          <div class="row">
            <div class="input-field col m8 s8">
              <input id="password" type="password" class="validate">
              <label for="password"> Confirmation du mot de passe </label>
            </div>
          </div>
        </form>
      </div>
<?php include('includes/footer.php'); ?>
</body>
</html>
