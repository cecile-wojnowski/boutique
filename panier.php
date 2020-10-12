<?php
  session_start();

  include('includes/bdd.php');
  include('classes/Produit.php');
  include('classes/Panier.php');
  if(isset($_SESSION["panier"])) {
    $panier = unserialize($_SESSION['panier']);
  }
?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Boutique / Panier</title>

    <?php include('includes/links.php'); ?>
  </head>
  <body>
    <?php include('includes/header.php'); ?>
    <main> <!-- Cette page permet de visualiser le contenu du panier de l'utilisateur -->
      <h2> Mon panier </h2>

        <?php
        if(isset($_SESSION['panier']) & !isset($_GET["validation"])){
          if(isset($_GET['supp_id'])){
            $key = $_GET['supp_id'];
            $panier->supprimer_produit($key);
            $_SESSION['panier'] = serialize($panier);
            header('Location:panier.php');
          }

            if(isset($_POST['quantite'])){
              if(isset($_GET['modif'])){
                $get_key = $_GET['modif'];
                $post_value = $_POST['quantite'];
                $panier->modifier_quantite($get_key, $post_value);
                $_SESSION['panier'] = serialize($panier);
                header('Location:panier.php');
              }
            }



          # Il faut récupérer l'id du produit dans le tableau $liste_produits
          # pour utiliser cet id en faisant une requête sql qui permettra d'afficher les infos du produits.
          # La quantité, quant à elle, proviendra du tableau lui-même.
          foreach($panier->liste_produits() as $key => $value){
            $request = $db->query("SELECT * FROM produits WHERE id = $key");
            $data = $request->fetch();
          ?>
        <div class="row">
          <div class="col s1 m2 offset-m1">
            <div class="card">
              <div class="card-image">
                <a href="produit.php?id=<?php echo $key; ?>"> <img src="img/<?= $data["image"] ?>"> </a>
              </div>
            </div>
          </div>

          <div class="col s1 m2 offset-m1">
            <p><?= $data["nom"] ?></p>
          </div>

          <div class="col s1 m2">
            <form class="" action="panier.php?modif=<?= $key ?>" method="post">
              <input class="input_quantite" type="text" name="quantite" value="<?= $value ?>" required>
            </form>
          </div>

          <div class="col s1 m2">
            <p><?= $data["prix"] ?> euros</p>
          </div>

          <!-- Cliquer sur l'icone doit permettre de supprimer le bon index dans le tableau -->
          <div class="col s1 m2">
            <a href="panier.php?supp_id=<?php echo $key ?>"> <i class="material-icons">delete</i></a>
          </div>
        </div>

      <?php } ?>


      <div class="row">
        <div class="col m1 offset-m9" id="prix_total">
          <div class="row_panier">
            <h2 class="h2_produit"> Total </h2>
            <p> <?php
              /* Calcul du prix total */
              $panier->calculer_prix_total($db);
              ?> euros</p>

          </div>
        </div>
      </div>

      <div class="row">
        <div class="col m3 offset-m9">
        <div class= "boutons_produit">
          <a href="panier.php?validation" class="waves-effect waves-green btn grey darken-4 lighten-3 white-text">
          Commander </a>
        </div>
      </div>
    </div>

  <?php
} elseif(isset($_SESSION["panier"]) & isset($_GET["validation"])) {
  $panier->commander($db);
} else {
    ?>
    <div class="row">
      <p class="p_panier"> Le panier est actuellement vide. </p>

      <p class="lien_panier"><a class="link_color" href="index.php"> Retourner vers la boutique. </a></p>
    </div>
    <?php
  }
   ?>
    </main>

    <?php include 'includes/footer.php'; ?>
  </body>
  </html>
