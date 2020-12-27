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
 
  <main class="row gx-0 shadow p-3 bg-white rounded">
          <div class="col-12 col-md-8 px-4 py-4">
              <h3>L'entreprise</h3>
              <p class="lh-base">Notre entreprise familiale met tout son savoir-faire à votre disposition dans le domaine du jardin et du paysagisme.</p>

                <p class="lh-base">Créée il y a 70 ans, notre entreprise vend fleurs, arbustes, matériel à main et motorisés.</p>
                
                <p class="lh-base">Implantés à Amiens, nous intervenons dans tout le département de la Somme : Albert, Doullens, Péronne, Abbeville, Corbie</p>
                <h3>qualité</h3>
                <p class="lh-base">Nous mettons à votre disposition un service personnalisé, avec 1 seul interlocuteur durant tout votre projet.<br>

                    Vous serez séduit par notre expertise, nos compétences et notre sérieux.</p>
                <h3>Devis gratuit</h3>
                <p class="lh-base">Vous pouvez bien sûr contacter pour de plus amples informations ou pour une demande d’intervention. Vous souhaitez un devis ? Nous vous le réalisons gratuitement.</p>
          </div>
          <div class="col-12 col-md-4 bg-warning text-center pt-2">
              <h3>[colonne de droite]</h3>
            </div>

              <!--shopping-cart-->
     <?php include('shopping_cart.php');?>
      <!--end shopping-cart-->
      </main>

<!----------- Footer---------------->
<?php include("footer.php");?>
<!-----------end of Footer---------------->

</div>

<!-----bootstrap files---->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
<script src='e_commerce.js'></script>
<script src='carte.js'></script>

</body>
</html>