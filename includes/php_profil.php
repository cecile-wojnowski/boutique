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

    $requete = $db->query("SELECT * FROM historique INNER JOIN produits
                                    ON id_produit = produits.id
                                    WHERE id_utilisateur = 3
                                    ORDER BY date_achat DESC");
    $historique = $requete->fetchall(PDO::FETCH_ASSOC);

    // afficher résultat dans un tab
    var_dump($historique);
    echo '<table>';
    echo '<thead>';
    echo '<th> Produit </th>';
    echo '<th> Prix </th>';
    echo '<th> Quantité </th>';
    echo '<th> Date d\'Achat </th>';
    echo '</thead>';
    echo '<tbody>';
    foreach($historique as $recap)
    {
        var_dump($recap);
        echo '<tr>';
        echo '<td>'.$recap['nom'].'</td>';
        echo '<td>'.$recap['prix'].'</td>';
        echo '<td>'.$recap['quantite'].'</td>';
        echo '<td>'.$recap['date_achat'].'</td>';
        echo '</tr>';
    }
    echo '</tbody>';
    echo '</table>';
?>