<?php
    if(!isset($_SESSION['email']))
    {
        echo '<a class="link_header" href="connexion.php"> Connexion </a>';
        echo '/';
        echo '<a class="link_header" href="inscription.php"> Créer un compte</a>';
    }
    else
    { ?>
      <form action="" method="POST" class="form_deconnexion">
      <button type="submit" name="deconnexion" id="deconnexion" class="btn_deco"> <i class="material-icons">power_settings_new</i>
      </button>
      </form>

  <?php  }

    if (isset($_POST['deconnexion']))
    {
        // var_dump('entrer dans la deco');
        session_destroy();
        header("Location:index.php");
    }
?>
