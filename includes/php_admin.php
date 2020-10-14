<?php
$admin = new Admin($db);
// recuperer tout les clients du site
// $users = new utilisateur($db);

// var_dump($users);
if(isset($_GET['id_client_modif'])){
  // modifier un client en admin
  $id_client = $_GET['id_client_modif'];
  $req = $db->prepare("SELECT * FROM utilisateurs WHERE id=?");
  $req->execute([$id_client]);
  $info = $req->fetch();
  $modif_admin = $admin->change_admin(($info['admin'] == 1), $id_client);
}

if(isset($_GET['id_client_over'])){
  // delete client
  $id_client = $_GET['id_client_over'];
  $supp_user = $admin->delete($id_client);
}


if(isset($_POST['ajouter_produit'])){
  // var_dump($_POST);
  $nom = $_POST['nom'];
  $prix = $_POST['prix'];
  $description = $_POST['description'];
  $image = $_POST['image'];
  $stock = $_POST['stock'];
  $valorisation = $_POST['valorisation'];
  $date_ajout = date("Y-m-d H:i:s");
  $id_categorie = intval($_POST['categorie']);
  $id_sous_categorie = intval($_POST['sous_categorie']);

  if($id_categorie == "" && !empty($_POST['new_categorie'])){
      $req_cat = $db->query("SELECT * FROM categories");
      $result_cat = $req_cat->fetchall(PDO::FETCH_ASSOC);
      $num_cat = count($result_cat);
      $id_categorie = $num_cat +1;

      $new_categorie = $_POST['new_categorie'];
      $admin->creer_categorie($new_categorie);
  }

  if($id_sous_categorie == "" && !empty($_POST['new_sous_categorie'])){
      $req_sous_cat = $db->query("SELECT * FROM sous_categories");
      $result_sous_cat = $req_sous_cat->fetchall(PDO::FETCH_ASSOC);
      $num_sous_cat = count($result_sous_cat);
      $id_sous_categorie = $num_sous_cat +1 ;

      $new_sous_categorie = $_POST['new_sous_categorie'];
      $admin->creer_sous_categorie($new_sous_categorie, $id_categorie);
  }

  $admin->ajouter_produit($nom, $prix, $description, $image, $stock, $valorisation, $id_categorie, $id_sous_categorie, $date_ajout);
}
?>
