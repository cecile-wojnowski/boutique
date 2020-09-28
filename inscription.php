<?php
  require "classes/autoloader.php";

  $db = App::getDatabase();
?>
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
    <?php
      include 'includes/header.php';
    ?>
    <main>
      <?php
        include 'includes/php_inscription.php';
      ?>
      <div class="row">
        <form id="form_inscription" class="col s8 m8 offset-s3 offset-m3" action="" method="POST">
          <div class="row">
            <div class="col s4 m4 offset-s2 offset-m2">
              <h2 > Créer un compte </h2>
            </div>
          </div>
          <div class="row">
            <div class="input-field col m8 s8">
              <input id="prenom" type="text" class="validate" name="prenom">
              <label for="prenom">Prénom</label>
            </div>
          </div>
          <div class="row">
            <div class="input-field col m8 s8">
              <input id="nom" type="text" class="validate" name="nom">
              <label for="nom">Nom</label>
            </div>
          </div>
          <div class="row">
            <div class="input-field col m8 s8">
              <input id="email" type="email" class="validate" name="email">
              <label for="email">Email</label>
            </div>
          </div>
          <div class="row">
            <div class="input-field col m8 s8">
              <input id="password" type="password" class="validate" name="password">
              <label for="password">Mot de passe </label>
            </div>
          </div>
          <div class="row">
            <div class="input-field col m8 s8">
              <input id="conf_password" type="password" class="validate" name="conf_password">
              <label for="conf_password"> Confirmation du mot de passe </label>
            </div>
          </div>

          <div class="row">
            <div class="input-field col m3 s3 offset-m3 offset-s3">
              <button type="submit" name="inscription">
                <a id="bouton_inscription" class="waves-effect waves-green btn grey darken-4 lighten-3 white-text">
                  S'incrire
                </a>
              </button>
            </div>
          </div>
        </form>
      </div>
  </main>
<?php include 'includes/footer.php'; ?>
</body>
</html>
