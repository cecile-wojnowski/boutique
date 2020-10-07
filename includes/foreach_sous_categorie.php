<?php
    $categorie_requete = $db->query("SELECT * FROM categories");
    $result = $categorie_requete->fetchall(PDO::FETCH_ASSOC);

    $sous_cat_requete = $db->query("SELECT * FROM sous_categories INNER JOIN categories ON id_categorie = categories.id ORDER BY nom_header ASC");
    $sous_categories = $sous_cat_requete->fetchall(PDO::FETCH_ASSOC);

    for($i=1; $i<=count($result); $i++){
        echo '<optgroup label="">';

        echo '</optgroup>';
    }
?>