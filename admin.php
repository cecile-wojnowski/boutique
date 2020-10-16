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

  $admin = new Admin($db);

  // Suppression d'un produit
  if(isset($_GET["id_produit_supp"])) {
    $admin->delete_produit($_GET["id_produit_supp"]);
  }

  if(isset($_GET['id_client_modif'])){
          // modifier un client en admin
          $id_client = $_GET['id_client_modif'];
          $req = $db->prepare("SELECT * FROM utilisateurs WHERE id=?");
          $req->execute([$id_client]);
          $info = $req->fetch();

          if($info['admin'] == 1){
              $boleen = 0;
          }
          else{
              $boleen = 1;
          }
          $modif_admin = $admin->change_admin($boleen, $id_client);
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
    <script src="https://kit.fontawesome.com/eaf570753d.js" crossorigin="anonymous"></script>
</head>
<body>
    <?php include 'includes/header.php'; ?>

    <main id="admin">
      <h3> Gestion des utilisateurs </h3>
      <?php include 'includes/php_admin_tab_user.php'; ?>

      <h3> Gestion des produits </h3>
      <?php include 'includes/php_admin_tab_produits.php'; ?>
        <div class="row" id="bouton_ajout">
          <form action="admin_ajout_produit.php" method="POST">
            <a href="admin_ajout_produit.php"><button type="submit" name="ajout_produit" id="ajout_produit" class="filtrer"> Ajouter un produit </button></a>
          </form>
        </div>
      <section id="cat_souscat">
        <form id="cont_filtre" action="" method="POST">
          <button type="submit" class="filtrer" id="cat" name="cat">Catégories</button>
          <button type="submit" class="filtrer" id="sous_cat" name="sous_cat">Sous Catégories</button>
        </form>
      </section>
      <?php include 'cat_souscat.php'; ?>

    </main>

    <?php
      include 'includes/footer.php';
    ?>
</body>
</html>
