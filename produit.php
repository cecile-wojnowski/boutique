<?php
session_start();
 ?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>

    <?php include('includes/links.php'); ?>
  </head>
  <body>
    <?php include('includes/header.php');
          include('includes/bdd.php');
          include('classes/Produit.php');
          include('classes/Panier.php');
          ?>

    <main>
        <?php
        if(isset($_GET['id'])){
          $id = strval($_GET['id']);

          if(isset($_POST['add_product'])){

            $quantite = (int) $_POST['quantite'];
            if(isset($_SESSION['panier'])){

              $panier = unserialize($_SESSION['panier']);

            } else {
              $panier = new Panier();
            }
            $panier->ajouter_produit($id, $quantite);

            $_SESSION['panier'] = serialize($panier);
            $_SESSION['produit'] = $id ;
          }

        // On admet que $db est un objet PDO.
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $request = $db->query("SELECT * FROM produits WHERE id = '$id'");

        while ($donnees = $request->fetch(PDO::FETCH_ASSOC))
        {
          $produit = new Produit($donnees);
          $produit->hydrate($donnees);
        ?>
        <!-- Breadcrumb : doit s'adapter à sa catégorie-->
          <div class="nav-wrapper">
            <div class="col s12">
              <a href="#!" class="breadcrumb grey-text">Accueil</a>
              <a href="#!" class="breadcrumb grey-text">
                <?php
                  # Affiche un nom différent en fonction de l'origine du lien sur lequel on a cliqué
                  if(isset($_GET["new"])){
                    echo "Nouveautés";
                  }elseif(isset($_GET["promotion"])){
                    echo "Promotions";
                  }else{
                    echo "Produits";
                  }
                  ?>
                </a>
              <a href="#!" class="breadcrumb grey-text"><?= $produit->nom(); ?></a>
            </div>
          </div>
        <!-- Image -->
        <div class="row">
          <div class="col s3 m3 offset-m1">
            <div class="card">
              <div class="card-image">
                <img src="img/<?php echo $produit->image();?> ">
              </div>
            </div>
          </div>

        <div class="col s3 m3 offset-m1">
          <!-- Elements divers -->
          <p><?php echo $produit->nom(); ?></p>
          <p>
            <?php
              if($produit->prix_solde() > 0){
                echo "<span class='ancien_prix'>" . $produit->prix() . " " ." euros" . "</span>" . "<br>";
                echo $produit->prix_solde() . " " ."euros";
              }else{
                echo $produit->prix() . " " ."euros";
              }
            ?>
          </p>

          <p> <?php echo $produit->stock(); ?> </p>

          <form class="" action="produit.php?id=<?php echo $produit->id(); ?>" method="post">


            <!-- Boutons -->
            <?php
            if($produit->stock() !== NULL){ ?>
              <input type="text" name="add_product" value="<?php echo $produit->id(); ?>" style="display:none;">

              <p> Quantité <input type="text" name="quantite" value="1" required> </p>

              <div class= "boutons_produit">
                <button id="bouton_produit1" class="waves-effect waves-green btn grey lighten-3 grey-text text-darken-2" type="submit">
                  <i class="material-icons left">shopping_cart</i>Panier
                </button>

                <a class="waves-effect waves-green btn grey darken-4 lighten-3 white-text">
                  Acheter maintenant</a>
              </div>

            <?php }else{
              echo "Le stock est vide.";
            } ?>

          </form>

        </div>

        <div class="col s3 m3">
          <!-- Texte -->
          <h2 class="h2_produit"> Description du produit </h2>
          <p> <?php echo $produit->description(); ?> </p>
        </div>
      </div>
<?php }
} ?>
    </main>


<?php include('includes/footer.php'); ?>
</body>
</html>
