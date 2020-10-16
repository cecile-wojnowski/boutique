<?php
    session_start();
    require "classes/autoloader.php";
    require "includes/bdd.php";
?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Boutique / Profil</title>

    <?php include('includes/links.php'); ?>
  </head>
<body>
    <?php
        include('includes/header.php');

    ?>
    <main>
      <h3>Historique d'achat</h3>
      <div class="row">
        <div class="col m6 offset-m3">
          <?php include 'includes/php_profil.php'; ?>
        </div>
      </div>
        <div class="row">
          <?php

          if(isset($erreur)) {
            echo $erreur;
          }
           ?>
            <form id="form_inscription" class="col s8 m8 offset-s2 offset-m2" action="" method="POST">
                <div class="row">
                    <div class="row">
                        <div class="col s8 m8 offset-s2 offset-m2">
                        <h3> Informations Personnelles </h3>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s8 m8 offset-m2 texte_aligne">
                            <input id="prenom" type="text" class="validate" name="prenom" value="<?php echo $infos_perso['prenom']; ?>" required>
                            <label for="prenom">Prénom</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s8 m8 offset-m2 texte_aligne">
                        <input id="nom" type="text" class="validate" name="nom" value="<?php echo $infos_perso['nom']; ?>" required>
                        <label for="nom">Nom</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s8 m8 offset-m2 texte_aligne">
                        <input id="email" type="email" class="validate" name="email" value="<?php echo $infos_perso['email']; ?>"required>
                        <label for="email">Email</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s8 m8 offset-m2 texte_aligne">
                        <input id="password" type="password" class="validate" name="password" required>
                        <label for="password">Mot de passe </label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s8 m8 offset-m2 texte_aligne">
                        <input id="new_password" type="password" class="validate" name="new_password">
                        <label for="password">Nouveau mot de passe </label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s8 m8 offset-m2 texte_aligne">
                        <input id="conf_password" type="password" class="validate" name="conf_password">
                        <label for="conf_password"> Confirmation du nouveau mot de passe </label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12 m12 texte_aligne">
                        <input id="adresse" type="text" class="validate" name="adresse" value="<?php echo $infos_perso['adresse']; ?>">
                        <label for="adresse"> Adresse de Livraison </label>
                    </div>
                </div>

                <div class="row">
                    <div class="input-field col m3 s3 offset-m5 offset-s5">
                    <button class="btn waves-effect waves-light grey darken-4" type="submit" name="modifier">
                        Modifier<i class="material-icons right">cloud</i>
                    </button>
                    </div>
                </div>
            </form>
        </div>
    </main>

    <?php include 'includes/footer.php'; ?>
</body>
</html>
