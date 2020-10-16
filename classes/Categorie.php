<?php
class Categorie
{
  private $id;
  private $nom;
  # filtrer les produits appartenant à la catégorie grâce à la classe ?
  private $liste_produits = []; # Tableau contenant les produits de la catégorie
  private $liste_sous_categories; # Tableau contenant les sous-catégories liées à la catégorie

  public function __construct($db, $id_categorie) {
    # Remplir la liste de produits avec tous les produits ayant le bon id dans la bdd
    $query = $db->prepare("SELECT id, nom FROM produits WHERE id_categorie = '$id_categorie'");
    $query->execute();

    while ($donnees = $query->fetch(PDO::FETCH_ASSOC)){
      # On place les id des produits dans le tableau
      $this->liste_produits[] = $donnees['id'];
    }
  }

  public function afficher_produits($db, $tableau = null){
    if(is_null($tableau)) {
      $tableau = $this->liste_produits;
    }
    # Récupérer les id du tableau $liste_produits et aller chercher les informations dans la table produits
    # Parcourt le tableau $liste_produits
    foreach($tableau as $value){
      $request = $db->query("SELECT * FROM produits WHERE id = $value");
      $data = $request->fetch();

      if($data['valorisation'] == 1){
        echo
          "<div class='col s2 m3'>
            <div class='card'>
              <div class='card-image'>
                <a href='produit.php?id=" . $data['id'] . "&new '>" .
                "<img src='img/" . $data['image']. "'></a>
              </div>
            </div>

            <div class='card-content'>"
                . "<strong>" .$data["nom"] . "</strong><br>
                <span class='ancien_prix'>" . $data["prix"] . " euros</span> "
                . $data["prix_solde"] . " euros
            </div>
          </div>";
      }else{
        echo
          "<div class='col s2 m3'>
            <div class='card'>
              <div class='card-image'>
                <a href='produit.php?id=" . $data['id'] . "&categorie=" . $data['id_categorie'] . "'>" .
                "<img src='img/" . $data['image']. "'></a>
              </div>
            </div>

            <div class='card-content'>"
                . "<strong>" . $data["nom"] . "</strong> <br>"
                . $data["prix"] . " euros
            </div>
          </div>";
      }


    }
  }

  public function afficher_sous_categories($db, $id_categorie){
    # Affiche les sous-catégories liées à la catégorie sous forme de liens
    $query = $db->prepare("SELECT * FROM sous_categories WHERE id_categorie = '$id_categorie'");
    $query->execute();
    while ($donnees = $query->fetch(PDO::FETCH_ASSOC)){
       echo "<a id='button_sous_categ' class='waves-effect waves-light btn  grey darken-3 white-text'
       href='categories.php?id=" . $id_categorie . "&souscategorie=" . $donnees['id'] . "'>" . $donnees['nom'] . "</a>";

    }
  }

  // Hydratation
  public function hydrate(array $donnees)
  {
    if (isset($donnees['id']))
    {
      $this->setId($donnees['id']);
    }
    if (isset($donnees['nom']))
    {
      $this->setNom($donnees['nom']);
    }
  }

  // Setters
  public function setId($id){
    $id = (int) $id;
    if ($id > 0){

     $this->id = $id;
    }
  }
  public function setNom($nom){
    if (is_string($nom))
    {
      $this->nom = $nom;
    }
  }


  // Getters
  public function id(){
    return $this->id;
  }
  public function nom(){
    return $this->nom;
  }
  public function prix(){
    return $this->prix;
  }
  public function liste_produits(){
    return $this->liste_produits;
  }

}
 ?>
