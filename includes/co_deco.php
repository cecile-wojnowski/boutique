<?php
    if(!isset($_SESSION['email']))
    {
        echo '<a class="link_header" href="connexion.php"> Connexion </a>';
        echo 'ou ';
        echo '<a class="link_header" href="inscription.php">créer un compte</a>';
    }
    else
    {
        echo 'Bonjour '.$_SESSION['prenom'].' !';
        echo '<form action="" method="POST" class="p_connexion">';
        echo '<button type="submit" name="deconnexion" id="deconnexion" class="link_header">';
        echo 'Déconnexion';
        echo '</button>';
        echo '</form>';
    }

    if (isset($_POST['deconnexion']))
    {
        // var_dump('entrer dans la deco');
        session_destroy();
        App::redirect('index.php');
    }
?>