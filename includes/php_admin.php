<?php
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
        echo '</tr>';
    }
    echo '<tbody>';
    echo '<table>';
    // var_dump($users);


    //recup produits
    $requete = $db->query("SELECT * FROM produits");
    $produits = $requete->fetchall(PDO::FETCH_ASSOC);

    echo '<table>';
    echo '<thead>';
    echo '<th>Image</th>';
    echo '<th>Nom</th>';
    echo '<th>Description</th>';
    echo '<th>Catégorie</th>';
    echo '<th>Prix</th>';
    echo '<th>Date du dernier réaprovisionnement</th>';
    echo '<th>Stock</th>';
    echo '<th>Promotion</th>';
    echo '<th>Prix Soldé</th>';
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
        echo '<td>'.$produit['prix'].'</td>';
        echo '<td>'.$produit['date_ajout'].'</td>';
        echo '<td>'.$produit['stock'].'</td>';
        echo '<td>'.$solde.'</td>';
        echo '<td>'.$produit['prix_solde'].'</td>';
        echo '</tr>';
    }
    echo '<tbody>';
    echo '<table>';
    // var_dump($produits);

    if(isset($_POST['ajouter_produit'])){
        var_dump('ajout du produit ?');
        var_dump($_POST);
        $nom = $_POST['nom'];
        $prix = $_POST['prix'];
        $description = $_POST['description'];
        $image = $_POST['image'];
        $stock = $_POST['stock'];
        $recup_valo = $_POST['valorisation'];
        // if($recup_valo == )
        $date_ajout = date("Y-m-d H:i:s");
        var_dump($date_ajout);
        $id_categorie = $_POST['categorie'];
        $id_sous_categorie = $_POST['sous_categorie'];

        $ajout_produit = new Admin($db);

        $ajout_produit->ajouter_produit($nom, $prix, $description, $image, $stock, $valorisation, $id_categorie, $id_sous_categorie, $date_ajout);
    }
?>