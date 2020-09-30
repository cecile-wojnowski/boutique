<?php
    if(!isset($_SESSION['email']))
    {
        echo '<a class="link_header" href="connexion.php"> Connexion </a>';
        echo 'ou ';
        echo '<a class="link_header" href="inscription.php">créer un compte</a>';
    }
    else
    {
        echo '<button type="submit">';
        echo '<a class="link_header" href="index.php">Déconnexion</a>';
        echo '</button>';
    }

    if (isset($_POST['deconnexion']))
    {
        deconnexion();
    }
?>