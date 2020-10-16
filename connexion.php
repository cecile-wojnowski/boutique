<?php
  session_start();
  require "classes/autoloader.php";
  require "includes/bdd.php";


?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Inscription</title>

    <?php include('includes/links.php'); ?>
  </head>
  <body>
    <?php include('includes/header.php'); ?>

    <main>
      <?php
      include 'includes/php_connexion.php';
      ?>
      <?php
      if(isset($_GET['mustbeconnected'])){
        echo "<p class='p_panier'>Veuillez vous connecter pour passer commande.</p>";
      } ?>

      <div class="row">
        <form id="form_connexion" class="col s8 m8 offset-s3 offset-m3" action="" method="POST">
          <div class="row">
            <div class="col s4 m4 offset-s2 offset-m2">
              <h2 > Se connecter </h2>
            </div>
          </div>
          <div class="row">
            <div class="input-field col m8 s8">
              <input id="email" type="email" name="email" class="validate" required>
              <label for="email">Email</label>
            </div>
          </div>
          <div class="row">
            <div class="input-field col m8 s8">
              <input id="password" type="password" name="password" class="validate" required>
              <label for="password">Mot de passe </label>
            </div>
          </div>

          <div class="row">
            <div class="input-field col m3 s3 offset-m3 offset-s3">
              <button class="btn waves-effect waves-light grey darken-4" type="submit" name="connexion" id="connexion">
                Se connecter<i class="material-icons right">send</i>
              </button>
            </div>
          </div>
        </form>
      </div>
    </main>

    <?php include('includes/footer.php'); ?>
</body>
</html>
