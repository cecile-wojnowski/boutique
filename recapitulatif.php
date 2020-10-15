<?php
  session_start();

  include('includes/bdd.php');
  include("classes/autoloader.php");
  if(isset($_SESSION["panier"])) {
    $panier = unserialize($_SESSION['panier']);
  }
?>
<?php
if(isset($_SESSION["panier"]) & isset($_GET["validation"])) {
  $panier->commander($db);
  header("Location:panier.php?validation");
} ?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title> Récapitulatif </title>

    <?php include('includes/links.php'); ?>
  </head>
  <body>
    <?php include('includes/header.php'); ?>
    <main>

      <h2> Récapitulatif de ma commande </h2>
      <div class="row" id="titres_recap">
        <div class="col s2 m3 offset-m1">
          <h3>Produits sélectionnés</h3>
        </div>
        <div class="col s2 m3 offset-m4">
          <h3>Adresse de livraison</h3>
          <p> Ici apparaîtra l'adresse de livraison du client. </p>
        </div>
      </div>

      <?php
      foreach($panier->liste_produits() as $key => $value){
        $request = $db->query("SELECT * FROM produits WHERE id = $key");
        $data = $request->fetch();
      ?>
    <div class="row">
      <div class="col s1 m1 offset-m1">
        <div class="card">
          <div class="card-image">
            <a href="produit.php?id=<?php echo $key; ?>"> <img src="img/<?= $data["image"] ?>"> </a>
          </div>
        </div>
      </div>

      <div class="col s1 m1 offset-m1">
        <p><?= $data["nom"] ?></p>
      </div>

      <div class="col s1 m1">
          <p>x<?= $value ?></p>
      </div>

      <div class="col s1 m1">
        <p><?= $data["prix"] ?> euros</p>
      </div>
    </div>

  <?php } ?>


  <?php # On affiche le prix et le bouton commander uniquement si le panier n'est pas vide
  if(!empty($panier->liste_produits())){?>
  <div class="row">
    <div class="col m2 offset-m9" id="prix_total">
      <div class="row_panier">
        <p>Total: <?php
          /* Calcul du prix total */
          $panier->calculer_prix_total($db);
          ?> euros</p>
      </div>
    </div>
  </div>
<?php } ?>
      <div class="row">
        <div class="col m3 offset-m9">
        <div class= "boutons_produit">
          <a href="recapitulatif.php?validation" class="waves-effect waves-green btn grey darken-4 lighten-3 white-text">
          Valider la commande </a>


        </div>
      </div>
    </div>
    </main>
    <?php include('includes/footer.php'); ?>
  </body>
</html>
