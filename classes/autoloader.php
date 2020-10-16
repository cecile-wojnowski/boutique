<?php
    spl_autoload_register('app_autoload');

    function app_autoload($class){
        require 'classes/'.$class.'.php';
    }
    // plus simple que les autoloader automatique
    // En premier, les classes parentes
    require 'classes/Utilisateur.php';
    require 'classes/Admin.php';

    require 'classes/Categorie.php';
    require 'classes/SousCategorie.php';

    require 'classes/Panier.php';
    require 'classes/Produit.php';
    
?>
