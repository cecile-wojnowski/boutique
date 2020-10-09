<?php
if (isset($_GET['id_produit'])){
    $id_produit = $_GET['id_produit'];
    $req_produit = $db->query("SELECT * FROM (produits INNER JOIN sous_categories ON id_sous_categorie = sous_categories.id)
                                         INNER JOIN categories ON sous_categories.id_categorie = categories.id
                                         WHERE produits.id = $id_produit");
    $result_modif = $req_produit->fetch();

    // var_dump($result_modif);

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

if(isset($_POST['modifier_produit'])){
    $image = ;
    $nom = ;
    $description = ;
    $categorie = ;
    $sous_categorie = ;
    $stock = ;
    $prix = ;
    $new_categorie = ;
    $new_sous_categorie = ;
}

?>