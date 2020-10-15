<?php
    if(isset($_SESSION['email']))
    {
        // recup données bdd
        $utilisateur = new Utilisateur($db);
        $infos_perso = $db->prepare("SELECT * FROM utilisateurs WHERE email = ? ");
        $infos_perso->execute([$_SESSION['email']]);
        $infos_perso = $infos_perso->fetch();

        // var_dump($infos_perso);

        if(isset($_POST['modifier']) && !empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['adresse'])){
            $nom = $_POST['nom'];
            $prenom = $_POST['prenom'];
            $email = $_POST['email'];
            $mdp = $_POST['password'];
            $new_mdp = $_POST['new_password'];
            $adresse = $_POST['adresse'];

            if(password_verify($mdp, $infos_perso['password'])){
                if($nom != $infos_perso['nom']){
                    $utilisateur->modifier_nom($nom);
                    $_SESSION['nom'] = $nom;
                }

                if($prenom != $infos_perso['prenom']){
                    $utilisateur->modifier_prenom($prenom);
                    $_SESSION['prenom'] = $prenom;
                }

                if($email != $infos_perso['email']){
                    $utilisateur->modifier_email($email);
                    $_SESSION['email'] = $email;
                }

                if($new_mdp != $infos_perso['password'] && $new_mdp == $_POST['conf_password'] && !empty($new_mdp)){
                    $utilisateur->modifier_mdp($new_mdp);
                }

                if($adresse != $infos_perso['adresse']){
                    $utilisateur->modifier_adresse($adresse);

                    $_SESSION['adresse'] = $adresse;
                }

                // Il est nécessaire de refaire la recherche des infos perso en cas de modification
                $infos_perso = $db->prepare("SELECT * FROM utilisateurs WHERE email = ? ");
                $infos_perso->execute([$_SESSION['email']]);
                $infos_perso = $infos_perso->fetch();

            } else {
                $erreur = "Le mot de passe n'est pas bon !";
            }

        }
        // $utilisateur = new Utilisateur;

    }
    else
    {
        App::redirect('index.php');
    }
    $id_utilisateur = $_SESSION['id'];
    $utilisateur->stocker_historique($id_utilisateur);
?>
