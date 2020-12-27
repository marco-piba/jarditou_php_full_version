<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--  Bootstrap css file  -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
     <link rel="stylesheet" href="CSS/all.min.css">
    <link rel="stylesheet" href="CSS/fontawesome.min.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <title>Document</title>
</head>
<body>
  <?php
include("header.php");
?>
<?php

require "connexion_bdd.php"; // Inclusion de notre bibliothèque de fonctions
$db = connexionBase(); // Appel de la fonction deconnexion 
$pro_id = $_GET['pro_id'];

$requete = "SELECT * FROM produits , categories WHERE pro_id=".$pro_id;

$result = $db->query($requete);

// Renvoi de l'enregistrement sous forme d'un objet
$produit = $result->fetch(PDO::FETCH_OBJ);
?>

<?php

if($produit->pro_d_modif =='' ||$produit->pro_d_modif == NULL ){
  $produit->pro_d_modif = date("Y-m-d");}

?>


<div class="container-fluid">
   <form action="update_form.php" method="post">
  <div class="bg-light bg-gradient row border-top border-light gx-0 ">
  <div class="bg-warning bg-gradient col-2 col-lg-3 border-right border-light mx-auto">
    <img src="<?= $produit->pro_photo ?>"class="img-fluid" id="image" alt="<?= $produit->pro_libelle ?>">
  </div>
  <div class="mb-3">
  <label for="pro_id" class="form-label"></label>
  <input type="hidden"  class="form-control"  id="pro_id" name="pro_id" aria-describedby="l\'id du produit" value ="<?= $pro_id ?>">
  </div>
    <div class="mb-3">
          <label for="reference" class="form-label">Reference:</label>
          <input type="text" class="form-control" id="reference" name="reference" aria-describedby="reference du produit" value ="<?= $produit->pro_ref ?>">
    </div>
    <div class="mb-3">
          <label for="categorie" class="form-label">Categorie:</label>
          <input type="text" name="categorie" class="form-control" id="categorie" aria-describedby="la categorie du produit" value="<?= $produit->cat_nom ?>">
    </div>
      <div class="mb-3">
        <label for="libelle" class="form-label">Libelle:</label>
        <input type="text" class="form-control" id="libelle" name="libelle" aria-describedby="libelle du produit" value="<?= $produit->pro_libelle ?>">
    </div>
    <div class="mb-3">
      <label for="description" class="form-label">Description:</label>
      <textarea type="text" id="description" name="description" name="description" class="form-control" ><?= $produit->pro_description ?></textarea>
    </div>
    <div class="mb-3">
        <label for="prix" class="form-label">Prix:</label>
        <input type="text" class="form-control" id="prix" name="prix" aria-describedby="prix du produit" value="<?= $produit->pro_prix ?>">
      </div>
      <div class="mb-3">
      <label for="stock" class="form-label">Stock:</label>
      <input type="text" class="form-control" id="stock" name="stock" aria-describedby="quantite de produit en stock" value="<?= $produit->pro_stock ?>">
    </div>
    <div class="mb-3">
      <label for="couleur" class="form-label">Couleur:</label>
      <input type="text" class="form-control" id="couleur" name="couleur" aria-describedby="couleur du produit" value="<?= $produit->pro_couleur ?>">
    </div>
    <div class="mb-3">Produit bloqué
    <input type="radio" name="produitBloque" id="oui" aria-describedby="produit Bloque" value="1" class="m-2 form-check-input" checked>
    <label for="produitBloque" class="form-label">Oui</label>
    <input type="radio" id="non" aria-describedby="produit Bloque" value="0"  name="produitBloque" class="m-2 form-check-input">
    <label for="produitBloque" class="form-label">Non</label>
    </div>
    <div class="mb-3">
          <label for="dateAjout" class="form-label">Date d\'ajout:</label>
          <input type="date" id="dateAjout" 
          disabled="disabled"
          name="dateAjout" class="form-control"  value="<?= $produit->pro_d_ajout ?>">
    </div>
    <div class="mb-3">
          <label for="dateDeModification" class="form-label">Date de modification:</label>
          <input type="text" id="dateDeModification" name="dateDeModification" class="form-control" value="<?= $produit->pro_d_modif ?>">
    </div>
    <div class="col-12 col-md-4">
    <input type="submit" value="Envoyer les modifications" class="btn btn-warning btn-lg mb-3" name="envoi">
    </div>
    </form>
    
  
<!--Footer-->
<?php include('footer.php');?>

<!-----------end of Footer---------------->
</div>
 
   <!-----bootstrap files---->
   <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
  </body>
  </html>