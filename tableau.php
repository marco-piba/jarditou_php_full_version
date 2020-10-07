
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
  <tbody>
    <?php include('tab1.php');?>
  </tbody>
 </table>
</div>

               <!-- bouton pour ajouter un produit-->
       <div class="col-12 col-md-4 mx-auto d-flex justify-content-center align-items-center">    
       <a href="add_form.php" target="_blank"><input type="button" value="Ajouter un Produit" class="my-3 btn btn-success btn-lg my-3"></a>
       </div>
           
      </main>
      <!-----------end of main---------------->
      <!----------- Footer---------------->
      <?php include('footer.php');?> 
       <!-----------end of Footer---------------->
</div>

      <!-----bootstrap files---->
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
      </body>
      </html>

