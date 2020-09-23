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
    include('classes/Produit.php');?>

    <main>
      <!-- Section 1 -->
      <div class="row">
        <div class="col offset-m3">
        <img class="index_img" src="img/apples.jpg">
      </div>
    </div>

<!-- Section 2 -->
<section>
  <h3> Nouveautés </h3>
    <?php
    // On admet que $db est un objet PDO.
    $request = $db->query('SELECT * FROM produits ORDER BY date_ajout LIMIT 4');

    while ($donnees = $request->fetch(PDO::FETCH_ASSOC)) // Chaque entrée sera récupérée et placée dans un array.
    {
      // On passe les données (stockées dans un tableau) concernant le personnage au constructeur de la classe.
      // On admet que le constructeur de la classe appelle chaque setter pour assigner les valeurs qu'on lui a données aux attributs correspondants.
      $produit = new Produit($donnees);
      $produit->hydrate($donnees);
      ?>

        <div class="row">
          <div class="col s3 m3">
            <div class="card">
              <div class="card-image">
                <a href="produit.php?id=<?php echo $produit->id(); ?>"> <img src="img/<?php echo $produit->image();?> "> </a>
              </div>
              <div class="card-content">
                <p> <?php echo $produit->nom(); ?> </p>
                <p> <?php echo $produit->prix(); ?> euros </p>
              </div>
            </div>
          </div>
          <?php
    }?>
      </div>
</section>

      <!-- Section 3 : à remplacer par une boucle exerçant un filtrage -->
      <section>
        <h3> Promotions </h3>
        <div class="row">
          <div class="col s3 m3">
            <div class="card">
              <div class="card-image">
                <a href="#"> <img src="img/peppers.jpg"> </a>
              </div>
              <div class="card-content">
                <p> Poivrons </p>
                <p> Prix </p>
              </div>
            </div>
          </div>

          <div class="col s3 m3">
            <div class="card">
              <div class="card-image">
                <a href="#"> <img src="img/pepper-mix.jpg"> </a>
              </div>
              <div class="card-content">
                <p>Mélange de baies (poivre)</p>
                <p> Prix </p>
              </div>
            </div>
          </div>

          <div class="col s3 m3">
            <div class="card">
              <div class="card-image">
                <a href="#"> <img src="img/pumpkin2.jpg"> </a>
              </div>
              <div class="card-content">
                <p>Courges</p>
                <p> Prix </p>
              </div>
            </div>
          </div>

          <div class="col s3 m3">
            <div class="card">
              <div class="card-image">
                <a href="#"> <img src="img/tomatoes2.jpg"></a>
              </div>
              <div class="card-content">
                <p>Tomates</p>
                <p> Prix </p>
              </div>
            </div>
          </div>
        </div>

      </section>


      <div class="row">
        <div class="col m4 offset-m4">
          <h3> Qui sommes nous ?</h3>
          <p class="index_text">
            Lorem ipsum dolor sit amet,
            consetetur sadipscing elitr,
            sed diam nonumy eirmod tempor invidunt ut
            labore et dolore magna aliquyam erat, sed diam voluptua.
            At vero eos et accusam et justo duo dolores et ea rebum.
            Stet clita kasd gubergren, no sea takimata sanctus est
            Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet,
            consetetur sadipscing elitr, sed diam nonumy eirmod tempor
            invidunt ut labore et dolore magna aliquyam erat, sed diam
          </p>
        </div>
      </div>

    </main>

    <?php include('includes/footer.php'); ?>
  </body>
</html>
