<?php
  session_start();

  include('includes/bdd.php');
  include('classes/Produit.php');
  include('classes/Panier.php');
  include('classes/Categorie.php');
  include('classes/SousCategorie.php')
?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Boutique</title>

    <?php include('includes/links.php'); ?>
  </head>
  <body>
    <?php include('includes/header.php'); ?>
    <main>
      <?php
      if(isset($_GET['id'])){
        # Lie l'id provenant d'un GET et l'id de la catégorie
        $id_categorie = $_GET['id'];
        $categorie = new Categorie();
        $categorie->recuperer_produits($db, $id_categorie);


        $sousCategorie = new SousCategorie();
        $sousCategorie->recuperer_produits($db, $id_categorie);
        $sousCategorie->afficher_produits($db);

        # Permet l'affichage du nom de la catégorie
        $query = $db->prepare("SELECT nom_header FROM categories WHERE id = '$id_categorie'");
        $query->execute();
        while ($donnees = $query->fetch(PDO::FETCH_ASSOC)){?>
          <h2>  <?= $donnees['nom_header']; ?>  </h2>
          <?php
        } ?>

        <?php
        # Afficher les sous-catégories liées à la catégorie
        $query = $db->prepare("SELECT * FROM sous_categories WHERE id_categorie = '$id_categorie'");
        $query->execute();
        while ($donnees = $query->fetch(PDO::FETCH_ASSOC)){
           echo $donnees['nom'] . " ";

        } ?>



        <!-- Affiche les produits -->
        <div class='row'>
        <?php  $categorie->afficher_produits($db); ?>
       </div>
       <?php
      }else{
        header('Location:index.php'); # Redirige si on tente d'aller sur cette page sans avoir choisi une catégorie
      } ?>

    </main>
    <?php include 'includes/footer.php'; ?>
  </body>
</html>
