<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--  Bootstrap css file  -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>

<div class="container-fluid">
 <form action='add_script.php' method ='post'>
   <div class="bg-secondary rounded bg-gradient col-2 col-lg-3 border-right border-light mx-auto text-center" id='photoAdd'>
    <label for="inputPhoto" class='mt-3 mb-1 text-light' >ENTRER LE LIEN POUR LA PHOTO</label></br>
    <input type="text" id='inputPhoto' name="inputPhoto" class='my-3'></br>
    <button class='btn btn-success rounded my-3' id="btnImage" type='button' onclick=addphoto()>cliquer ici pour ajouter une photo</button>
  </div>
    <div class="mb-3">
          <label for="reference" class="form-label">Reference:</label>
          <input type="text" class="form-control" name="reference" aria-describedby="reference du produit" value ="">
    </div>
    <div class="mb-3">
          <label for="categorie" class="form-label">Categorie ID:</label>
          <input type="text" class="form-control" id="categorie" name="categorie" aria-describedby="la categorie du produit" value="">
    </div>
        <div class="mb-3">
        <label for="libelle" class="form-label">Libelle:</label>
        <input type="text" class="form-control" id="libelle" name="libelle" aria-describedby="libelle du produit" value="">
    </div>
    <div class="mb-3">
      <label for="description" class="form-label">Description:</label>
      <textarea type="text" id="description"
     name="description" class="form-control"></textarea>
    </div>
    <div class="mb-3">
        <label for="prix" class="form-label">Prix:</label>
        <input type="text" class="form-control" id="prix" name="prix" aria-describedby="prix du produit" value="">
      </div>
      <div class="mb-3">
      <label for="stock" class="form-label">Stock:</label>
      <input type="text" class="form-control"id="stock" name="stock" aria-describedby="quantite de produit en stock" value="">
    </div>
    <div class="mb-3">
      <label for="couleur" class="form-label">Couleur:</label>
      <input type="text" class="form-control" id="couleur" name="couleur"  aria-describedby="couleur du produit" value="">
    </div>
    <div class="mb-3">Produit bloqué?<br>
          <input type="radio" name="produitBloque" id="oui" aria-describedby="produit Bloque" value="1" class="m-2 form-check-input">
          <label for="produitBloque" class="form-label">Oui</label>
          <input type="radio" id="non" aria-describedby="produit Bloque" value="0"  name="produitBloque" class="m-2 form-check-input">
          <label for="produitBloque" class="form-label">Non</label>
    </div>
    <div class="mb-3">
          <label for="dateAjout" class="form-label">Date d\'ajout:</label>
          <input type="date" id="dateAjout" name="dateAjout" class="form-control"  value="">
    </div>
    <div class="col-12 col-md-4 mx-auto d-flex justify-content-center align-items-center">
    <button class="btn btn-danger btn-lg mb-3" type="submit">Enregistrer le produit</button>
   </div>
 </form>

<!--Footer-->
<?php
    include('footer.php');
    ?>

    <!-----------end of Footer---------------->

</div>
   <!-----bootstrap files---->
   <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
  <script src="app.js"></script>
  </body>
  </html>