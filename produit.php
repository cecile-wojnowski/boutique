<?php
session_start();
 ?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://kit.fontawesome.com/eaf570753d.js" crossorigin="anonymous"></script>
  </head>
  <body>
    <?php include('includes/header.php');
          include('includes/bdd.php');
          include('classes/Produit.php');
          include('classes/Panier.php');
          ?>

    <main>
      <!-- Breadcrumb : doit s'adapter au nom du produit ET à sa catégorie-->
        <div class="nav-wrapper">
          <div class="col s12">
            <a href="#!" class="breadcrumb grey-text">Accueil</a>
            <a href="#!" class="breadcrumb grey-text">Nouveautés</a>
            <a href="#!" class="breadcrumb grey-text">Noisettes</a>
          </div>
        </div>

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
            var_dump($panier);

            $_SESSION['panier'] = serialize($panier);
            $_SESSION['produit'] = $id ;

            var_dump($_SESSION['produit']);
          }

        // On admet que $db est un objet PDO.
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $request = $db->query("SELECT * FROM produits WHERE id = '$id'");

        while ($donnees = $request->fetch(PDO::FETCH_ASSOC)) // Chaque entrée sera récupérée et placée dans un array.
        {
          $produit = new Produit($donnees);
          $produit->hydrate($donnees);
        ?>

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
          <p><?php echo $produit->prix(); ?> euros</p>

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
