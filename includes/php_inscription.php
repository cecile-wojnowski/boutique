<?php
    if (isset($_POST['inscription']))
    {
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $email = $_POST['email'];
        $mdp = $_POST['password'];

        // appel a la classe et ses methodes
        $utilisateur = new Utilisateur($db);
        $utilisateur->creer_compte($nom, $prenom, $email, $mdp);
    }
?>