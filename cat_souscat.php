<?php
    $admin = new Admin($db);
    if(isset($_POST['cat'])){
        $recup = $db->query("SELECT * FROM categories");
        $cat = $recup->fetchall(PDO::FETCH_ASSOC);

        echo '<h3 class="tab_title">Catégories</h3>';
        echo '<table class="tableau_historique tb_centrer">';
        echo '<thead>';
        echo '<th>Nom</th>';
        echo '</thead>';
        echo '<tbody>';
        foreach($cat as $categorie){
            echo '<tr>';
            echo '<td>'.$categorie['nom_header'].'</td>';
            echo '</tr>';
        }
        echo '<tbody>';
        echo '</table>';
    }



    if(isset($_POST['sous_cat'])){
        $recup = $db->query("SELECT * FROM sous_categories INNER JOIN categories ON id_categorie = categories.id");
        $souscat = $recup->fetchall();

        // var_dump($souscat);

        echo '<h3 class="tab_title">Sous Catégories</h3>';
        echo '<table class="tableau_historique tb_centrer">';
        echo '<thead>';
        echo '<th> Nom </th>';
        echo '<th> Catégorie dépendante </th>';
        echo '</thead>';
        echo '<tbody>';
        foreach($souscat as $souscategorie){
            echo '<tr>';
            echo '<td>'.$souscategorie[1].'</td>';
            echo '<td>'.$souscategorie['nom_header'].'</td>';
            echo '</tr>';
        }
        echo '<tbody>';
        echo '</table>';
    }
?>


