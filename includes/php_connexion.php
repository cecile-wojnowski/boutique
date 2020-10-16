<?php
    if(isset($_POST['connexion'])){
        $email = $_POST['email'];
        $mdp = $_POST['password'];

        $utilisateur = new Utilisateur($db);
        $utilisateur->se_connecter($email, $mdp);
    }

?>
