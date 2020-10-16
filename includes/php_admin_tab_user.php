<?php

$requete = $db->query("SELECT * FROM utilisateurs");
$users = $requete->fetchall(PDO::FETCH_ASSOC);

echo '<table>';
echo '<thead>';
echo '<th>Nom</th>';
echo '<th>Prenom</th>';
echo '<th>Email</th>';
echo '<th>Droit d\'accés</th>';
echo '<th> Modification / Suppression </th>';
echo '</thead>';
echo '<tbody>';
foreach($users as $user){

    if ($user['admin'] == 1){
        $droit = 'Administrateur';
    }
    else{
        $droit = 'Client';
    }

    echo '<tr>';
    echo '<td>'.$user['nom'].'</td>';
    echo '<td>'.$user['prenom'].'</td>';
    echo '<td>'.$user['email'].'</td>';
    echo '<td>'.$droit.'</td>';


    echo '<td>';
    echo '<a href="admin.php?id_client_modif='.$user['id'].'"><i class="material-icons"> assignment_ind </i></a>';
    if($user["id"] != $_SESSION["id"]) {
      echo '<a href="admin.php?id_client_over='.$user['id'].'"><i class="material-icons"> delete_forever </i></a>';
    }
    echo '</td>';

    echo '</tr>';
}
echo '</tbody>';
echo '</table>';



?>
