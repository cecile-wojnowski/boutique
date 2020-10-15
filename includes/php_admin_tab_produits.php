<?php

//recup produits
$requete = $db->query("SELECT * FROM produits");
$produits = $requete->fetchall(PDO::FETCH_ASSOC);

echo '<table>';
echo '<thead>';
echo '<th>Image</th>';
echo '<th>Nom</th>';
echo '<th>Description</th>';
echo '<th>Catégorie</th>';
echo '<th>Prix en €/Kg</th>';
echo '<th>Date du dernier réaprovisionnement</th>';
echo '<th>Stock en Kg</th>';
echo '<th>Promotion</th>';
echo '<th>Prix Soldé en €/Kg</th>';
echo '<th>Supprimer</th>';
echo '</thead>';
echo '<tbody>';
foreach($produits as $produit){

    if ($produit['valorisation'] == 1){
        $solde = 'Oui';
    }
    else{
        $solde = 'Non';
    }

    echo '<tr>';
    echo '<td>'."<img class='img_admin' src='img/".$produit['image']."'>"."</td>";
    echo '<td>'.$produit['nom'].'</td>';
    echo '<td>'.$produit['description'].'</td>';
    echo '<td>'.$produit['id_categorie'].'</td>'; // associé catégorie et id catégorie
    echo '<td>'.$produit['prix'].' €/Kg </td>';
    echo '<td>'.$produit['date_ajout'].'</td>';
    echo '<td>'.$produit['stock'].' Kg</td>';
    echo '<td>'.$solde.'</td>';
    echo '<td>'.$produit['prix_solde'].' €/Kg </td>';
    echo '<td>'.'<a href="admin.php?id_produit='.$produit['id'].'"><i class="material-icons"> delete_forever </i></a>'.'<a href="admin.php?id_produit='.$produit['id'].'"><i class="material-icons"> edit </i></a>'.'</td>';
    echo '</tr>';
}
echo '</tbody>';
echo '</table>';
// var_dump($produits);

?>
