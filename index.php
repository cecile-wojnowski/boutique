<?php
  session_start();
  require "classes/autoloader.php";
  require "includes/bdd.php";

?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <?php include('includes/links.php');  ?>
  </head>
  <body>
    <?php

      include('includes/header.php');
      include('includes/bdd.php');
    ?>

    <main>
      <!-- Section 1 -->
      <div class="row">
        <div class="col offset-m3">
        <img class="index_img" src="img/img_accueil.jpg">
      </div>
    </div>

<!-- Section 2 : requête SQL affichant les derniers produits ajoutés -->
<section class="section_index">
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
                <a href="produit.php?id=<?php echo $produit->id(); ?>&new"> <img src="img/<?php echo $produit->image();?> "> </a>
              </div>
            </div>
            <div class="card-content">
              <p>
                <?php
                  echo "<strong>" . $produit->nom() . "</strong><br>";
                  if($produit->prix_solde() > 0){
                    echo "<span class='ancien_prix'>" . $produit->prix() . " " ." euros" . "</span>" . "<br>";
                    echo $produit->prix_solde() . " " ."euros";
                  }else{
                    echo $produit->prix() . " " ."euros";
                  }
                ?>
              </p>
            </div>
          </div>
          <?php
    }?>
      </div>
</section>

      <!-- Section 3 : requête SQL n'affichant que les produits valorisés -->
      <section class="section_index">
        <h3> Promotions </h3>
        <?php
        $request = $db->query('SELECT * FROM produits WHERE valorisation = 1 ORDER BY date_ajout LIMIT 4');

        while ($donnees = $request->fetch(PDO::FETCH_ASSOC))
        {
          $produit = new Produit($donnees);
          $produit->hydrate($donnees);
          ?>
            <div class="row">
              <div class="col s3 m3">
                <div class="card">
                  <div class="card-image">
                    <a href="produit.php?id=<?php echo $produit->id(); ?>&promotion"> <img src="img/<?php echo $produit->image();?> "> </a>
                  </div>

                </div>
                <div class="card-content">
                  <p>
                    <?php
                      echo "<strong>" . $produit->nom() . "</strong><br>";
                      if($produit->prix_solde() > 0){
                        echo "<span class='ancien_prix'>" . $produit->prix() . " " ." euros" . "</span>" . "<br>";
                        echo $produit->prix_solde() . " " ."euros";
                      }
                    ?>
                  </p>
                </div>
              </div>
              <?php
        }?>
          </div>
      </section>

      <div class="row">
        <div class="col m4 offset-m4">
          <h3> Qui sommes nous ?</h3>
          <p class="index_text">
            Nous mettons à disposition d'agriculteurs bio une plateforme leur permettant de faire de
            la vente directe. Les consommateurs peuvent directement commander des produits frais sur le site,
            et ceux-ci leur seront livrés directement chez eux. Nous proposons ainsi une manière de supprimer les
            intermédiaires entre les agriculteurs et les consommateurs : c'est à la fois une plus grande marge pour les
            agriculteurs, et des prix moins élevés pour les consommateurs.
          </p>
        </div>
      </div>

    </main>

    <?php include 'includes/footer.php'; ?>
  </body>
</html>
