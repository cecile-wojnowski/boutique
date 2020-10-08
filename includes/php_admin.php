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
    echo '<th>Supprimer</th>';
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
        echo '<td>'.'<a href="admin.php?id_produit='.$produit['id'].'"><i class="material-icons"> delete_forever </i></a>'.'<a href="admin.php?id_produit='.$produit['id'].'"><i class="material-icons"> edit </i></a>'.'</td>';
        echo '</tr>';
    }
    echo '<tbody>';
    echo '<table>';
    // var_dump($produits);

    if (isset($_GET['id_produit'])){
        $id_produit = $_GET['id_produit'];
        $req_produit = $db->query("SELECT * FROM (produits INNER JOIN sous_categories ON id_sous_categorie = sous_categories.id)
                                             INNER JOIN categories ON sous_categories.id_categorie = categories.id
                                             WHERE produits.id = $id_produit");
        $result_modif = $req_produit->fetch();

        var_dump($result_modif);

        echo '<div class="row">
        <form id="form_ajout_produit" class="col s8 m8 offset-s3 offset-m3" action="admin.php" method="POST">
          <div class="row">
            <div class="col s4 m4 offset-s2 offset-m2">
              <h2 > Modifier le Produit '.$result_modif['nom'].' </h2>
            </div>
          </div>
          <div class="row">
            <div class="input-field col m8 s8">
                    <span class="btn btn-file">
                        <i class="material-icons left">cloud_upload</i>
                        Télécharger Image du Produit<input type="file" name="image" id="image">
                        <img src="img/'.$result_modif['image'].'">
                    </span>
                </div>
            </div>
          </div>
          <div class="row">
            <div class="input-field col m8 s8">
              <input id="nom" type="text" class="validate" name="nom" value="'.$result_modif['nom'].'" required>
              <label for="nom">Nom</label>
            </div>
          </div>
          <div class="row">
            <div class="input-field col s8">
              <textarea name="description" id="description" class="validate" cols="30" rows="10">'.$result_modif['description'].'</textarea>
              <label for="description">Description</label>
          </div>
          <div class="input-field col s8">
            <label for="categorie"></label>
              <select class="browser-default" name="categorie" id="categorie">
                <option value="'.$result_modif['id_categorie'].'" selected>'.$result_modif['nom_header'].'</option>';

                require "includes/foreach_categorie.php";
        echo    '</select>
          </div>
          <div class="input-field col s8">
            <input type="text" name="new_categorie" id="new_categorie">
            <label for="new_categorie">Nouvelle Catégorie</label>
          </div>

          <div class="input-field col s8">
            <label for="sous_categorie"></label>
              <select class="browser-default" name="sous_categorie" id="sous_categorie">
                <option value="'.$result_modif['id_sous_categorie'].'" selected>'.$result_modif[12].'</option>';

                require "includes/foreach_sous_categorie.php";
        echo    '</select>
          </div>
          <div class="input-field col s8">
            <input type="text" name="new_sous_categorie" id="new_sous_categorie">
            <label for="new_sous_categorie">Nouvelle sous-catégorie</label>
          </div>
          <div class="row">
            <div class="input-field col m8 s8">
              <input id="stock" type="text" class="validate" name="stock" value="'.$result_modif['stock'].'" required>
              <label for="stock"> Quantité en Kg</label>
            </div>
          </div>

          <div class="row">
            <div class="input-field col m8 s8">
              <input id="prix" type="text" class="validate" value="'.$result_modif['prix'].'" name="prix">
              <label for="prix"> Prix en €/Kg </label>
            </div>
          </div>

          <div class="row">
            <div class="input-field col m8 s8">
                <p>
                    <label>
                        <input class="with-gap validate" id="valorisation" name="valorisation" type="radio" value="1" required/>
                        <span>Produit Valorisé</span>
                    </label>
                </p>
                <p>
                    <label>
                        <input class="with-gap validate" id="non" name="valorisation" type="radio" value="0" required/>
                        <span>Produit normal</span>
                    </label>
                </p>
            </div>
          </div>

          <div class="row">
            <div class="input-field col m3 s3 offset-m3 offset-s3">
              <button class="btn waves-effect waves-light grey darken-4" type="submit" name="modifier_produit">
                Modifier<i class="material-icons right">create</i>
              </button>
            </div>
          </div>
        </form>
      </div>';
    }

    if(isset($_POST['ajouter_produit'])){
        // var_dump($_POST);
        $nom = $_POST['nom'];
        $prix = $_POST['prix'];
        $description = $_POST['description'];
        $image = $_POST['image'];
        $stock = $_POST['stock'];
        $valorisation = $_POST['valorisation'];
        $date_ajout = date("Y-m-d H:i:s");
        $id_categorie = intval($_POST['categorie']);
        $id_sous_categorie = intval($_POST['sous_categorie']);

        if($id_categorie == "" && !empty($_POST['new_categorie'])){
            $req_cat = $db->query("SELECT * FROM categories");
            $result_cat = $req_cat->fetchall(PDO::FETCH_ASSOC);
            $num_cat = count($result_cat);
            $id_categorie = $num_cat +1;

            $new_categorie = $_POST['new_categorie'];
            $admin->creer_categorie($new_categorie);
        }

        if($id_sous_categorie == "" && !empty($_POST['new_sous_categorie'])){
            $req_sous_cat = $db->query("SELECT * FROM sous_categories");
            $result_sous_cat = $req_sous_cat->fetchall(PDO::FETCH_ASSOC);
            $num_sous_cat = count($result_sous_cat);
            $id_sous_categorie = $num_sous_cat +1 ;

            $new_sous_categorie = $_POST['new_sous_categorie'];
            $admin->creer_sous_categorie($new_sous_categorie, $id_categorie);
        }

        $admin->ajouter_produit($nom, $prix, $description, $image, $stock, $valorisation, $id_categorie, $id_sous_categorie, $date_ajout);
    }
?>