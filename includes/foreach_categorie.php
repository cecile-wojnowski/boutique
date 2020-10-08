<?php
    $req = $db->query("SELECT * FROM categories");
    $result = $req->fetchall(PDO::FETCH_ASSOC);

    foreach($result as $categorie){
        echo '<optgroup>';
        echo '<option value="'.$categorie['id'].'">'.$categorie['nom_header'].'</option>';
    }
?>