
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
   <!-----------Header---------------->
  <?php include('header.php');?>
    <!-----------end of header---------------->
    <!-----------main---------------->
      <main>
          <!--Creation du tableau-->
<div class="table-responsive">
 <table class="table table-striped table-bordered">
  <thead>
    <tr>
      <th scope="col" class='col-2'>Photo</th>
      <th scope="col" >Id</th>
      <th scope="col"class='col-2' >Catégorie</th>
      <th scope="col"class='col-2'>Libellé</th>
      <th scope="col" >Prix</th>
      <th scope="col">Couleur</th>
      <th scope="col" >Ajout</th>
      <th scope="col" >Modif</th>
      <th scope="col">Bloqué</th>
    </tr>
  </thead>
  <tbody id="ajaxDiv">
    <?php include('tab2.php');?>
  </tbody>
 </table>
 <!----recuperer la valeur php $page pr connaitre la derniere page du tableau ------>
 <input type=hidden id=lastPage value=<?=$nbreDePage; ?>>

<!-- /*Partie "Liens"
/* Notez que les liens ainsi mis vont bien faire rester sur le même script en passant
 le numéro de page en paramètre-->

    <ul class="pager list-group d-flex flex-row align-items-center justify-content-between ">
      <li class="list-group-item list-group-item-action list-group-item-success mr-3 p-2 text-center precedentBtn"><a href="?page=<?php echo $page - 1; ?>" title="Précédent" class="text-decoration-none text-dark">Page précédente</a></li>
      <li class="list-group-item list-group-item-action list-group-item-success p-2 text-center suivantBtn"><a href="?page=<?php echo $page + 1; ?>" title="Suivant" class="text-decoration-none text-dark">Page suivante</a></li>
    </ul>
 </div>

               <!-- bouton pour ajouter un produit-->
       <div class="col-12">    
       <a href="add_form.php" target="_blank" ><input type="button" value="Ajouter un Produit" class="my-3 btn btn-info btn-lg w-100"></a>
       </div>

         <!--shopping-cart-->
     <?php include('shopping_cart.php');?>
      <!--end shopping-cart-->
           
      </main>
      <!-----------end of main---------------->
      <!----------- Footer---------------->
      <?php include('footer.php');?> 
       <!-----------end of Footer---------------->
</div>

      <!-----bootstrap files---->
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
      </body>
      <script src='tableau.js'></script>
      <script src='e_commerce.js'></script>
      <script src='carte.js'></script>
      </html>

