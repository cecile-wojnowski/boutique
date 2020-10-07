<?php
    function deconnexion(){
        session_destroy();
        header('Location:index.php');
    }

    function afficher_promotions($db){
      $query = $db->prepare("SELECT * FROM produits WHERE valorisation = 1");
      $query->execute();

      while ($donnees = $query->fetch(PDO::FETCH_ASSOC)){
        #echo "<a href='produit.php?id=" . $donnees['id']. "'>" . $donnees['nom'] . "</a>";

        echo
          "<div class='col s2 m3'>
            <div class='card'>
              <div class='card-image'>
              <a href='produit.php?id=" . $donnees['id'] . "'>" .
                "<img src='img/" . $donnees['image']. "'></a>
              </div>
            </div>

            <div class='card-content'>"
                . $donnees["nom"] . "<br>"
                . "<span class='ancien_prix'>" . $donnees["prix"] . " " . "euros" . "</span>" . "<br>"
                . $donnees["prix_solde"] . " " . "euros".

              "</div>
          </div>";
      }

    }
?>
