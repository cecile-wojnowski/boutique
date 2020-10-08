<header>
  <div class="row">
    <div class="row">
      <p class="p_connexion">
        <?php include 'includes/co_deco.php' ?>
        <?php include('bdd.php'); ?>
      </p>
    </div>

    <div class="row">
      <h1 class="logo col m2"> <a href="index.php"> Boutique en ligne </a></h1>

      <!-- Barre de recherche -->
      <div class="col m3 offset-m5">
        <nav class=" nav_header grey lighten-3">
         <div class="nav-wrapper">

           <form class="header_recherche" method="post" action="recherche.php">
             <div class="input-field">
               <input id="search" type="search" name="search" placeholder ="Rechercher...">
               <label class="label-icon" for="search"><i class="material-icons grey-text text-darken-2">search</i></label>
             </div>
           </form>

         </div>
     </nav>
      </div>
      <!-- Bouton Panier -->
      <a href="panier.php" class="btn grey lighten-3 grey-text text-darken-2"><i class="material-icons left">shopping_cart</i> Panier </a>

   </div>

 <nav class="nav_header2">
    <div class="nav-wrapper">
      <ul id="nav-mobile" class="left hide-on-med-and-down">
        <li><a href="index.php"> Accueil </a></li>
        <li><a href="nouveautes.php"> Nouveautés </a></li>
        <li><a href="promotions.php"> Promotions </a></li>

        <?php
        $query = $db->prepare("SELECT * FROM categories");
        $query->execute();
        # Liens s'affichant en fonction des catégories se trouvant en bdd
        while ($donnees = $query->fetch(PDO::FETCH_ASSOC)){ ?>
          <li><a href="categories.php?id=<?= $donnees['id']; ?>"> <?= $donnees["nom_header"] ?> </a></li>

        <?php }
         ?>
      </ul>
    </div>
  </nav>

</row>
</header>
