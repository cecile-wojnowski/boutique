<?php
    if(!isset($_SESSION['email']))
    {
        echo '<a class="link_header" href="connexion.php"> Connexion </a>';
        echo '/';
        echo '<a class="link_header" href="inscription.php"> Créer un compte</a>';
    }
    else
    {
        echo 'Bonjour '.$_SESSION['prenom'].' !';
        if($_SESSION['admin'] == 1){
            echo '<div class="row">';
            echo '<a class="link_header" href="admin.php"> Page Admin </a>';
        }
        echo '<form action="" method="POST" class="p_connexion">';
        echo '<button type="submit" name="deconnexion" id="deconnexion" class="link_header">';
        echo 'Déconnexion';
        echo '</button>';
        echo '</form>';
        echo '</div>';
    }

    if (isset($_POST['deconnexion']))
    {
        // var_dump('entrer dans la deco');
        session_destroy();
        header("Location:index.php");
    }
?>
