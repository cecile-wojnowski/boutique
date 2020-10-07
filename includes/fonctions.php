<?php
    function deconnexion(){
        session_destroy();
        header('Location:index.php');
    }

    function afficher_promotions($db){
      $query = $db->prepare("SELECT * FROM produits WHERE valorisation = 1");
      $query->execute();

      while ($donnees = $query->fetch(PDO::FETCH_ASSOC)){
        echo "<a href='produit.php?id=" . $donnees['id']. "'>" . $donnees['nom'] . "</a>";
      }

    }
?>
