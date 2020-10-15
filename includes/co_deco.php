<?php
    if(!isset($_SESSION['email']))
    {
        echo '<a class="link_header" href="connexion.php"> Connexion </a>';
        echo '/';
        echo '<a class="link_header" href="inscription.php"> Créer un compte</a>';
    }
    else
    {


    }

    if (isset($_POST['deconnexion']))
    {
        // var_dump('entrer dans la deco');
        session_destroy();
        header("Location:index.php");
    }
?>
