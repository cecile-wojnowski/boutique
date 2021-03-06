<?php
    $admin = new Admin($db);
    // recuperer tout les clients du site
    // $users = new utilisateur($db);
    $requete = $db->query("SELECT * FROM utilisateurs");
    $users = $requete->fetchall(PDO::FETCH_ASSOC);

    echo '<table>';
    echo '<thead>';
    echo '<th>Nom</th>';
    echo '<th>Prenom</th>';
    echo '<th>Email</th>';
    echo '<th>Droit d\'accés</th>';
    echo '<th> Modification / Suppression </th>';
    echo '</thead>';
    echo '<tbody>';
    foreach($users as $user){

        if ($user['admin'] == 1){
            $droit = 'Administrateur';
        }
        else{
            $droit = 'Client';
        }

        echo '<tr>';
        echo '<td>'.$user['nom'].'</td>';
        echo '<td>'.$user['prenom'].'</td>';
        echo '<td>'.$user['email'].'</td>';
        echo '<td>'.$droit.'</td>';
        echo '<td>'.'<a href="admin.php?id_client_modif='.$user['id'].'"><i class="material-icons"> assignment_ind </i></a>'.'<a href="admin.php?id_client_over='.$user['id'].'"><i class="material-icons"> delete_forever </i></a>'.'</td>';
        echo '</tr>';
    }
    echo '<tbody>';
    echo '<table>';
    // var_dump($users);
    if(isset($_GET['id_client_modif'])){
        // modifier un client en admin
        $id_client = $_GET['id_client_modif'];
        $req = $db->query("SELECT * FROM utilisateurs WHERE id=?", [$id_client]);
        $info = $req->fetch();
        $infos = get_object_vars($info);
        if($infos['admin'] == 1){
            $boleen = 0;
        }
        else{
            $boleen = 1;
        }
        $modif_admin = $admin->change_admin($boleen, $id_client);
    }

    if(isset($_GET['id_client_over'])){
        // delete client
        $id_client = $_GET['id_client_over'];
        $supp_user = $admin->delete($id_client);
    }

    //recup produits
    $requete = $db->query("SELECT * FROM produits");
    $produits = $requete->fetchall(PDO::FETCH_ASSOC);

    echo '<table>';
    echo '<thead>';
    echo '<th>Image</th>';
    echo '<th>Nom</th>';
    echo '<th>Description</th>';
    echo '<th>Catégorie</th>';
    echo '<th>Prix en €/Kg</th>';
    echo '<th>Date du dernier réaprovisionnement</th>';
    echo '<th>Stock en Kg</th>';
    echo '<th>Promotion</th>';
    echo '<th>Prix Soldé en €/Kg</th>';
    echo '</thead>';
    echo '<tbody>';
    foreach($produits as $produit){

        if ($produit['valorisation'] == 1){
            $solde = 'Oui';
        }
        else{
            $solde = 'Non';
        }

        echo '<tr>';
        echo '<td>'.'<img src="img/'.$produit['image'].'">'.'</td>';
        echo '<td>'.$produit['nom'].'</td>';
        echo '<td>'.$produit['description'].'</td>';
        echo '<td>'.$produit['id_categorie'].'</td>'; // associé catégorie et id catégorie
        echo '<td>'.$produit['prix'].' €/Kg </td>';
        echo '<td>'.$produit['date_ajout'].'</td>';
        echo '<td>'.$produit['stock'].' Kg</td>';
        echo '<td>'.$solde.'</td>';
        echo '<td>'.$produit['prix_solde'].' €/Kg </td>';
        echo '</tr>';
    }
    echo '<tbody>';
    echo '<table>';
    // var_dump($produits);

    if(isset($_POST['ajouter_produit'])){
        // var_dump($_POST);
        $nom = $_POST['nom'];
        $prix = $_POST['prix'];
        $description = $_POST['description'];
        $image = $_POST['image'];
        $stock = $_POST['stock'];
        $valorisation = $_POST['valorisation'];
        $date_ajout = date("Y-m-d H:i:s");
        $id_categorie = $_POST['categorie'];
        $id_sous_categorie = $_POST['sous_categorie'];

        if($id_categorie == "" && isset($_POST['new_categorie'])){
            $new_categorie = $_POST['new_categorie'];
            creer_categorie($new_categorie);
        }

        if($id_categorie == "" && isset($_POST['new_sous_categorie'])){
            $new_sous_categorie = $_POST['new_sous_categorie'];
            creer_categorie($new_sous_categorie);
        }

        $admin->ajouter_produit($nom, $prix, $description, $image, $stock, $valorisation, $id_categorie, $id_sous_categorie, $date_ajout);
    }
?>