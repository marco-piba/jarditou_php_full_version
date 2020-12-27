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

 
  <!-----------main---------------->
      <main>

     
       <div class="card my-3 col-12">
  <div class="row g-0">
    <div class="col-md-4 d-flex justify-content-center align-items-center">
      <img style="max-width: 100%;" src="<?="photo/".$produit->pro_id.".".$produit->pro_photo; ?>" alt="<?=$produit->pro_id.".".$produit->pro_photo; ?>">
    </div>
    <div class="col-md-8">
      <div class="card-body ml-5">
        <h3 class="card-title mb-3"><?=$produit->pro_prix?> EUR</h3>
        <p class="card-text border border-secondary p-2 d-inline-block rounded"><span><i class="fas fa-truck mr-2"></i></span> Livraison offerte</p>
        <p class="card-text">Livraison en 7 jours ouvrés chez vous<span class='ml-5 font-weight-bold'> GRATUIT</span></p>
        <p class="text-danger"><span class="mr-2"><i class="fas fa-exclamation-circle"></i></span>Livraison en France hors D.O.M. et T.O.M.</p>
        <p class="card-text">Vendu et expédié par <span class="text-decoration-underline">Jarditou</span></p>
        <p class="card-text"><?=$produit->pro_description?></p>
        <p class="card-text">Couleur : <?=$produit->pro_couleur?></p>
       
        <div>
          <div class=" d-flex mb-3">
           <p class="mr-3 my-auto">Quantité</p>
           <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                <button type="button" class="btn btn-success border border-success btnless">-</button>
                <button type="button" class="btn btn-light border border-success btnQ">1</button>
                <button type="button" class="btn btn-success border border-success btnmore">+</button>
           </div>
          </div>
          <button class="btn btn-success btnAjout" data-id="<?=$produit->pro_id;?>" type="submit"><span class="mr-2"><i class="fas fa-shopping-cart"></i></span>Ajouter au panier</button>
        </div>
        <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
      </div>
    </div>
  </div>
</div>

      <!--shopping-cart-->
     <?php include('shopping_cart.php');?>
      <!--end shopping-cart-->
           
      </main>
  <!-----------end of main---------------->
  <!-----------Footer---------------->
    <?php include("footer.php");?>
</div>
    <!-----------end of Footer---------------->

   <!-----bootstrap files---->
   <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
  <script src="e_commerce.js"></script>
  <script src='carte.js'></script>
  <script src="pro_detail.js"></script>
  </body>
  </html>