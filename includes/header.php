<header>
    <div class="row">
      <div class="col m3">
        <a href="index.php" id="link_logo">
          <img src="img/logo_boutique" class="img_header">
          <h2> Ferme Biologique </h2>
        </a>
      </div>
      <div class="col m3 offset-m5">
      <p class="p_connexion">
        <?php include 'includes/co_deco.php' ?>
        <?php include('bdd.php'); ?>
      </p>
    </div>



      <!-- Barre de recherche -->
      <div class="col m4 offset-m3">
        <nav class=" nav_header grey darken-2" style="margin-right:2%">
         <div class="nav-wrapper">
           <form class="header_recherche" method="post" action="recherche.php">
             <div class="input-field">
               <input id="search" type="search" name="search" placeholder ="Rechercher...">
               <label class="label-icon" for="search"><i class="material-icons grey-text text-lighten-2">search</i></label>
             </div>
           </form>
         </div>
     </nav>
     </div>
     <div class="col m2">
     <!-- Bouton Panier -->
     <a href="panier.php" class="btn grey darken-2 grey-text text-lighten-2"><i class="material-icons left">shopping_cart</i>Panier</a>
      </div>


   </div>

 <nav class="nav_header2">
    <div class="nav-wrapper">
      <ul id="nav-mobile" class="left hide-on-med-and-down">
        <li><a href="index.php" class="liens_navbar"> Accueil </a></li>
        <li><a href="nouveautes.php" class="liens_navbar"> Nouveautés </a></li>
        <li><a href="promotions.php" class="liens_navbar"> Promotions </a></li>

        <?php
        $query = $db->prepare("SELECT * FROM categories");
        $query->execute();
        # Liens s'affichant en fonction des catégories se trouvant en bdd
        while ($donnees = $query->fetch(PDO::FETCH_ASSOC)){ ?>
          <li><a class="liens_navbar" href="categories.php?id=<?= $donnees['id']; ?>"> <?= $donnees["nom_header"] ?> </a></li>

        <?php }
         ?>
      </ul>
    </div>
  </nav>

</row>
</header>
