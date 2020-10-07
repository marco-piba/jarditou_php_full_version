<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--  Bootstrap css file  -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
<div class="container-fluid">
    <!--header-->

 <?php include('header.php'); ?>
 
  <!--end of header-->

  <?php 
 require "connexion_bdd.php"; // Inclusion de notre bibliothèque de fonctions
 $db = connexionBase(); // Appel de la fonction de connexion

 $pro_id = $_GET['pro_id'];
 $requete = "SELECT * FROM produits , categories WHERE cat_id = pro_cat_id AND pro_id=".$pro_id;

 $result = $db->query($requete);

 $produit = $result->fetch(PDO::FETCH_OBJ);

 if (!$result) 
 {
     $tableauErreurs = $db->errorInfo();
     echo $tableauErreur[2]; 
     die("Erreur dans la requête");
 }

 if ($result->rowCount() == 0) 
 {
    // Pas d'enregistrement
    die("La table est vide");
 }

  ?>

  <form action="add_script.php" method="post" id="form1">
  <div class="bg-light bg-gradient  row border-top border-light gx-0">
  <div class="bg-warning bg-gradient col-2 col-lg-3 border-right border-light mx-auto">
    <img src="<?= $produit->pro_photo ?>"class="img-fluid" id="image" alt="<?= $produit->pro_libelle ?>">
  </div>
    <div class="mb-3">
          <label for="reference" class="form-label">Reference:</label>
          <input type="text" class="form-control" id="reference" disabled="disabled" aria-describedby="reference du produit" value ="<?= $produit->pro_ref ?>">
    </div>
    <div class="mb-3">
          <label for="categorie" class="form-label">Categorie:</label>
          <input type="text" class="form-control" id="categorie" disabled="disabled" aria-describedby="la categorue du produit" value="<?= $produit->cat_nom ?>">
         
    </div>
      <div class="mb-3">
        <label for="libelle" class="form-label">Libelle:</label>
        <input type="text" class="form-control" id="libelle" disabled="disabled" aria-describedby="libelle du produit" value="<?= $produit->pro_libelle ?>">
    </div>
    <div class="mb-3">
      <label for="description" class="form-label">Description:</label>
      <textarea type="text" id="description" name="description" class="form-control" disabled="disabled"><?=$produit->pro_description ?></textarea>
    </div>
    <div class="mb-3">
        <label for="prix" class="form-label">Prix:</label>
        <input type="text" class="form-control" id="prix" disabled="disabled" aria-describedby="prix du produit" value="<?=$produit->pro_prix?>">
      </div>
      <div class="mb-3">
      <label for="stock" class="form-label">Stock:</label>
      <input type="text" class="form-control" id="stock" disabled="disabled" aria-describedby="quantite de produit en stock" value="<?= $produit->pro_stock ?>">
    </div>
    <div class="mb-3">
      <label for="couleur" class="form-label">Couleur:</label>
      <input type="text" class="form-control" id="couleur" disabled="disabled" aria-describedby="couleur du produit" value="<?= $produit->pro_couleur ?>">
    </div>
    <?php
    if($produit->pro_bloque == 1){ echo'<div class="mb-3">Produit bloqué
      <input type="radio" name="produitBloque" id="oui" aria-describedby="produit Bloque" value="1" class="m-2 form-check-input" checked>
      <label for="produitBloque" class="form-label">Oui</label>
      <input type="radio" id="non" aria-describedby="produit Bloque" value="0"  name="produitBloque" class="m-2 form-check-input">
      <label for="produitBloque" class="form-label">Non</label>
</div>';}

    else{echo '<div class="mb-3">Produit bloqué
      <input type="radio" name="produitBloque" id="oui" aria-describedby="produit Bloque" value="1" class="m-2 form-check-input" >
      <label for="produitBloque" class="form-label">Oui</label>
      <input type="radio" id="non" aria-describedby="produit Bloque" value="0"  name="produitBloque" class="m-2 form-check-input" checked>
      <label for="produitBloque" class="form-label">Non</label>
</div>';}
?>

    <div class="mb-3">
          <label for="dateAjout" class="form-label">Date d\'ajout:</label>
          <input type="date" id="dateAjout" name="dateAjout" class="form-control" disabled="disabled" value="<?=$produit->pro_d_ajout ?>">
    </div>
    <div class="mb-3">
          <label for="dateDeModification" class="form-label">Date de modification:</label>
          <input type="text" placeholder:"aaaa\mm\dd" id="dateDeModification" name="dateDeModification" class="form-control" value="<?= $produit->pro_d_modif ?>" step="1" readonly>
    </div>
    <div class="col-12 col-md-4">
    <a href="tableau.php" target="_blank"><input type="button" value="Retour" class="btn btn-secondary btn-lg mb-3"></a>
    <a href="formulaire_modif.php?pro_id=<?= $produit->pro_id ?>" target="_blank"><input type="button" value="Modifier" id="modifier" class="btn btn-warning btn-lg mb-3" ></a>
    <button type='button' class="btn btn-danger btn-lg mb-3 supConfirm" >Supprimer</button>
    </div>
    </form>


    <!--Footer-->
<?php
    include('footer.php');
    ?>

    <!-----------end of Footer---------------->

     <!---page confirmer la suppression du produit---->
     <div class='confirmSuppressPage'>
     <div class='confirmSuppressContainer'>
       <div class="bg-warning bg-gradient col-2 col-lg-3    border-right border-light mx-auto imgSuppr">
        <img src="<?= $produit->pro_photo ?>"class="img-fluid" id="image" alt="<?= $produit->pro_libelle ?>">
       </div>
       <h2><?= $produit->pro_libelle ?></h2>
       <div class='QSupp'>
            Etes-vous sûr de vouloir supprimer "<?= $produit->pro_libelle ?>" de la base de données ?
       </div>
       <div>
        <a href="delete_form.php?pro_id=<?=$produit->pro_id?>" target="_blank"><input type="button" value="Supprimer" class="btn btn-danger btn-lg mb-3" ></a>
        <button type='button' onclick=toggleSup() class="btn btn-warning btn-lg mb-3">Annuler</button>
       </div>

      
      <div>
    </div>
          

</div>
 
   <!-----bootstrap files---->
   <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
   <script src='app.js'></script>
  </body>
  </html>



