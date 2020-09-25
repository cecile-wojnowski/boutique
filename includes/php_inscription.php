<?php
    if (isset($_POST['inscription']))
    {
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $mail = $_POST['email'];
        $mdp = $_POST['password'];

        // appel a la classe et ses methodes
        $utilisateur = new Utilisateurs;
        $utilisateur->creer_compte($nom, $prenom, $mail, $mdp);
    }
?>