<?php
include 'includes/bdd.php';

  session_start();
  require "classes/autoloader.php";
  if (!isset($_SESSION['email'])){
    header("Location:index.php");
  } else {
    if($_SESSION["admin"] == 0) {
      header("Location:index.php");
    }
  }

  if(isset($_POST['modifier_produit'])){
      $identite_produit = $_SESSION['identite_produit'];
      $req = $db->prepare("SELECT * FROM produits WHERE id = $identite_produit");
      $result = $req->execute();

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

      header("Location:admin.php");
      
  }

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Boutique / Admin</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <!-- <script src="https://kit.fontawesome.com/eaf570753d.js" crossorigin="anonymous"></script> -->
</head>
<body>
    <?php include 'includes/header.php'; ?>

    <main id="admin">
      <?php include 'includes/php_modifier_produit.php'; ?>

    </main>

    <?php
      include 'includes/footer.php';
    ?>
</body>
</html>
