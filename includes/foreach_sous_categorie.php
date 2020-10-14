<?php
    $categorie_requete = $db->query("SELECT * FROM categories");
    $result = $categorie_requete->fetchall(PDO::FETCH_ASSOC);

    $sous_cat_requete = $db->query("SELECT * FROM sous_categories ORDER BY id_categorie ASC");
    $sous_categories = $sous_cat_requete->fetchall(PDO::FETCH_ASSOC);

    for($i = 0; $i < count($result); $i++){
        echo '<optgroup label="'.$result[$i]['nom_header'].'">';
        for($j=0; $j < count($sous_categories); $j++){
            if($sous_categories[$j]['id_categorie'] == $result[$i]['id']){
                echo '<option value="'.$sous_categories[$j]['id'].'">'.$sous_categories[$j]['nom'].'</option>';
            }
        }
        echo '</optgroup>';
    }
?>