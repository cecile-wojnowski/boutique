<header>
  <div class="row">
    <div class="row">
      <p class="p_connexion">
        <?php include 'includes/co_deco.php' ?>
      </p>
    </div>

    <div class="row">
      <h1 class="logo col m2"> <a href="index.php"> Boutique en ligne </a></h1>

      <!-- Barre de recherche -->
      <div class="col m3 offset-m5">
        <nav class=" nav_header grey lighten-3">
         <div class="nav-wrapper">
           <form>
             <div class="input-field">
               <input id="search" type="search" placeholder ="Rechercher..." required>
               <label class="label-icon" for="search"><i class="material-icons grey-text text-darken-2">search</i></label>
               <i class="material-icons">close</i>
             </div>
           </form>
         </div>
     </nav>
      </div>
      <!-- Bouton Panier -->
      <a href="panier.php" class="waves-effect waves-green btn grey lighten-3 grey-text text-darken-2"><i class="material-icons left">shopping_cart</i> Panier </a>

   </div>

 <nav class="nav_header2">
    <div class="nav-wrapper">
      <ul id="nav-mobile" class="left hide-on-med-and-down">
        <li><a href="index.php"> Accueil </a></li>
        <li><a href=""> Nouveautés </a></li>
        <li><a href=""> Promotions </a></li>
        <li><a href=""> Fruits à coque</a></li>
        <li><a href=""> Légumes </a></li>
        <li><a href=""> Fruits </a></li>
      </ul>
    </div>
  </nav>

</row>
</header>
