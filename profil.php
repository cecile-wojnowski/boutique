<?php
    session_start();
    require "classes/autoloader.php";
    $db = App::getDatabase();
?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Boutique / Profil</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://kit.fontawesome.com/eaf570753d.js" crossorigin="anonymous"></script>
  </head>
<body>
    <?php
        include('includes/header.php');
        include 'includes/php_profil.php';
    ?>
    <main>
        <div class="row">
            <form id="form_inscription" class="col s8 m8 offset-s3 offset-m3" action="" method="POST">
                <div class="row">
                    <div class="col s4 m4 offset-s2 offset-m2">
                    <h2 > Informations Personnelles </h2>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col m8 s8">
                    <input id="prenom" type="text" class="validate" name="prenom" value="<?php echo $infos_perso['prenom']; ?>" required>
                    <label for="prenom">Prénom</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col m8 s8">
                    <input id="nom" type="text" class="validate" name="nom" value="<?php echo $infos_perso['nom']; ?>" required>
                    <label for="nom">Nom</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col m8 s8">
                    <input id="email" type="email" class="validate" name="email" value="<?php echo $infos_perso['email']; ?>"required>
                    <label for="email">Email</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col m8 s8">
                    <input id="password" type="password" class="validate" name="password" required>
                    <label for="password">Mot de passe </label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col m8 s8">
                    <input id="new_password" type="password" class="validate" name="new_password">
                    <label for="password">Nouveau mot de passe </label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col m8 s8">
                    <input id="conf_password" type="password" class="validate" name="conf_password">
                    <label for="conf_password"> Confirmation du nouveau mot de passe </label>
                    </div>
                </div>

                <div class="row">
                    <div class="input-field col m3 s3 offset-m3 offset-s3">
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