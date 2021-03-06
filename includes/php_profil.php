<?php
    if(isset($_SESSION['email']))
    {
        // recup données bdd
        $utilisateur = new Utilisateur($db);
        $infos = $db->query("SELECT * FROM utilisateurs WHERE email = ? ", [$_SESSION['email']]);
        $info = $infos->fetch();
        $infos_perso = get_object_vars($info);
        // var_dump($infos_perso);

        if(isset($_POST['modifier']) && !empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['email']) && !empty($_POST['password'])){
            $nom = $_POST['nom'];
            $prenom = $_POST['prenom'];
            $email = $_POST['email'];
            $mdp = $_POST['password'];
            $new_mdp = $_POST['new_password'];
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
            }


        }
        // $utilisateur = new Utilisateur;

    }
    else
    {
        App::redirect('index.php');
    }
    $id_utilisateur = $_SESSION['id'];
    $utilisateur->afficher_historique($id_utilisateur);
?>