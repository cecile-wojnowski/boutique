<?php
  if (isset($_GET['id_produit'])){
    $id_produit = $_GET['id_produit'];

    $_SESSION['identite_produit'] = $id_produit;

    $req_produit = $db->query("SELECT * FROM (produits INNER JOIN sous_categories ON id_sous_categorie = sous_categories.id)
                                          INNER JOIN categories ON sous_categories.id_categorie = categories.id
                                          WHERE produits.id = $id_produit");
    $result_modif = $req_produit->fetch();
    var_dump($result_modif);
    echo '<div class="row">
    <form id="form_ajout_produit" class="col s8 m8 offset-s3 offset-m3" action="admin.php" method="POST">
      <div class="row">
        <div class="col s4 m4 offset-s2 offset-m2">
          <h2 > Modifier le Produit: '.$result_modif[1].' </h2>
        </div>
      </div>
      <div class="row">
        <div class="input-field col m8 s8">
                <span class="btn btn-file">
                    <i class="material-icons left">cloud_upload</i>
                    Télécharger Image du Produit<input type="file" name="image_update" id="image_update">
                </span>
                <img src="img/'.$result_modif['image'].'">
            </div>
        </div>
      </div>
      <div class="row">
        <div class="input-field col m8 s8">
          <input id="nom_update" type="text" class="validate" name="nom_update" value="'.$result_modif[1].'" required>
          <label for="nom_update">Nom</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s8">
          <textarea name="description_update" id="description_update" class="validate" cols="30" rows="10" required>'.$result_modif['description'].'</textarea>
          <label for="description_update">Description</label>
      </div>
      <div class="input-field col s8">
        <label for="categorie"></label>
          <select class="browser-default" name="categorie_update" id="categorie_update">
            <option value="'.$result_modif['id_categorie'].'" selected>'.$result_modif['nom_header'].'</option>';
            require "includes/foreach_categorie.php";
    echo    '</select>
      </div>
      <div class="input-field col s8">
        <input type="text" name="new_categorie_update" id="new_categorie_update">
        <label for="new_categorie_update">Nouvelle Catégorie</label>
      </div>

      <div class="input-field col s8">
        <label for="sous_categorie"></label>
          <select class="browser-default" name="sous_categorie_update" id="sous_categorie_update">
            <option value="'.$result_modif['id_sous_categorie'].'" selected>'.$result_modif[12].'</option>';
            require "includes/foreach_sous_categorie.php";
    echo    '</select>
      </div>
      <div class="input-field col s8">
        <input type="text" name="new_sous_categorie_update" id="new_sous_categorie_update">
        <label for="new_sous_categorie_update">Nouvelle sous-catégorie</label>
      </div>
      <div class="row">
        <div class="input-field col m8 s8">
          <input id="stock_update" type="text" class="validate" name="stock_update" value="'.$result_modif['stock'].'" required>
          <label for="stock_update"> Quantité en Kg</label>
        </div>
      </div>

      <div class="row">
        <div class="input-field col m8 s8">
          <input id="prix_update" name="prix_update" type="text" class="validate" value="'.$result_modif['prix'].'">
          <label for="prix_update"> Prix en €/Kg </label>
        </div>
      </div>

      <div class="row">
        <div class="input-field col m8 s8">
          <input id="prix_solde_update" name="prix_solde_update" type="text" class="validate" value="'.$result_modif['prix_solde'].'">
          <label for="prix_solde_update"> Prix en €/Kg </label>
        </div>
      </div>

      <div class="row">
        <div class="input-field col m8 s8">
            <p>
                <label>
                    <input class="with-gap validate" id="valorisation_update" name="valorisation_update" type="radio" value="1" required/>
                    <span>Produit Valorisé</span>
                </label>
            </p>
            <p>
                <label>
                    <input class="with-gap validate" id="valorisation_update" name="valorisation_update" type="radio" value="0" required/>
                    <span>Produit non Valorisé</span>
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

  if(isset($_POST['modifier_produit'])){
      $identite_produit = $_SESSION['identite_produit'];
      $req = $db->prepare("SELECT * FROM produits WHERE id = $identite_produit");
      $result = $req->execute();

      var_dump($result);
      var_dump($_POST);

      $image = $_POST['image_update'];
      $nom = $_POST['nom_update'];
      $description = $_POST['description_update'];
      $categorie = $_POST['categorie_update'];
      $sous_categorie = $_POST['sous_categorie_update'];
      $stock = $_POST['stock_update'];
      $prix = $_POST['prix_update'];
      $prix_solde = $_POST['prix_solde_update'];
      $valorisation = $_POST['valorisation_update'];

      $date_actu = date("Y-m-d H:i:s");

      $new_categorie = $_POST['new_categorie_update'];
      $new_sous_categorie = $_POST['new_sous_categorie_update'];


      // update image
      if ($image != $result['image'] && !empty($image)){
        $req = $db->query("UPDATE produits SET image = '$image' WHERE produits.id = $identite_produit ");
      }

      // update nom
      if ($nom != $result['nom'] && !empty($nom)){
        $req = $db->query("UPDATE produits SET nom = '$nom' WHERE produits.id = $identite_produit ");
      }

      // update description
      if ($description != $result['description'] && !empty($description)){
        $req = $db->query("UPDATE produits SET description = '$description' WHERE produits.id = $identite_produit ");
      }

      // update categorie
      if ($categorie != $result['id_categorie'] && !empty($categorie)){
        $req = $db->query("UPDATE produits SET categorie = '$categorie' WHERE produits.id = $identite_produit ");
      }

      // update sous_categorie
      if ($sous_categorie != $result['id_sous_categorie'] && !empty($sous_categorie)){
        $req = $db->query("UPDATE produits SET sous_categorie = '$sous_categorie' WHERE produits.id = $identite_produit ");
      }

      // update stock
      if ($stock != $result['stock'] && !empty($stock)){
        $req = $db->query("UPDATE produits SET stock = '$stock' WHERE produits.id = $identite_produit ");
      }

      // update prix
      if ($prix != $result['prix'] && !empty($prix)){
        $req = $db->query("UPDATE produits SET prix = '$prix' WHERE produits.id = $identite_produit ");
      }

      // update prix_solde
      if ($prix_solde != $result['prix_solde']){
        $req = $db->query("UPDATE produits SET prix_solde = '$prix' WHERE produits.id = $identite_produit ");
      }

      // update valorisation
      if($valorisation != $result['valorisation'] && !empty($valorisation)){
        $req = $db->query("UPDATE produits SET valorisation = '$valorisation' WHERE produits.id = $identite_produit ");
      }

  }

?>