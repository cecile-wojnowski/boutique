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
          ?>

    <main>
      <!-- Breadcrumb -->
        <div class="nav-wrapper">
          <div class="col s12">
            <a href="#!" class="breadcrumb grey-text">Accueil</a>
            <a href="#!" class="breadcrumb grey-text">Nouveautés</a>
            <a href="#!" class="breadcrumb grey-text">Noisettes</a>
          </div>
        </div>

        <?php
        if(isset($_GET['id'])){
          $id = $_GET['id'];
        // On admet que $db est un objet PDO.
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $request = $db->query("SELECT * FROM produits WHERE id = '$id'");

        while ($donnees = $request->fetch(PDO::FETCH_ASSOC)) // Chaque entrée sera récupérée et placée dans un array.
        {
          // On passe les données (stockées dans un tableau) concernant le personnage au constructeur de la classe.
          // On admet que le constructeur de la classe appelle chaque setter pour assigner les valeurs qu'on lui a données aux attributs correspondants.
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

          <p> Stock: <?php echo $produit->stock(); ?> </p>
          <p> Elément à insérer ici : ajouter ou soustraire une quantité </p>

          <!-- Boutons -->
          <div class= "boutons_produit">
          <a id="bouton_produit1" class="waves-effect waves-green btn grey lighten-3 grey-text text-darken-2">
            <i class="material-icons left">shopping_cart</i>Panier</a>

            <a class="waves-effect waves-green btn grey darken-4 lighten-3 white-text">
              Acheter maintenant</a>
          </div>
        </div>

        <div class="col s3 m3">
          <!-- Texte -->
          <h2 class="h2_produit"> <?php echo $produit->nom(); ?></h2>
          <p> <?php echo $produit->description(); ?> </p>
        </div>
      </div>
<?php }
} ?>
    </main>


<?php include('includes/footer.php'); ?>
</body>
</html>
