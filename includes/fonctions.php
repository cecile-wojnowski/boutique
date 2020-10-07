<?php
    function deconnexion(){
        session_destroy();
        header('Location:index.php');
    }

    function afficher_promotions($db){
      $query = $db->prepare("SELECT * FROM produits WHERE valorisation = 1");
      $query->execute();

      while ($donnees = $query->fetch(PDO::FETCH_ASSOC)){
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

    function afficher_nouveautes($db){
      $query = $db->prepare("SELECT * FROM produits ORDER BY date_ajout DESC LIMIT 8");
      $query->execute();

      while ($donnees = $query->fetch(PDO::FETCH_ASSOC)){
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

    function rechercher($db, $recherche){

      $recherche = strtolower($recherche);
      $resultats = $db->query("SELECT * FROM produits WHERE nom LIKE '%$recherche%'");
      $resultats->execute();
      if($resultats->rowCount() > 0) {
      while ($donnees = $resultats->fetch(PDO::FETCH_ASSOC)){
        if($donnees['valorisation'] == 1){
          echo
            "<div class='col s2 m3'>
              <div class='card'>
                <div class='card-image'>
                  <a href='produit.php?id=" . $donnees['id'] . "'>" .
                  "<img src='img/" . $donnees['image']. "'></a>
                </div>
              </div>

              <div class='card-content'>"
                  . $donnees["nom"] . "<br>
                  <span class='ancien_prix'>" . $donnees["prix"] . " euros</span><br>"
                  . $donnees["prix_solde"] . " euros
              </div>
            </div>";
        }else{
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
                  . $donnees["prix"] . " euros
              </div>
            </div>";
        }
      }
    }else{
      echo "Aucun résultat ne correspond à votre recherche.";
    }
  }
?>
