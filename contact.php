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
  <!-----------header---------------->
  <?php

 include('header.php');

 ?>
    <!-----------end of header ---------------->

    <!-----------main---------------->
    <main>
     <form class="row gx-0 formSub " action="script.php" method="post">
        <div class="col-12 py-2">* Ces zones sont obligatoires</div>
        <h2 class="col-12">Vos Coordonnées</h2>
       
<!-----------message erreur si formulaire pas valide---------------->
        <?php
if(isset($_GET['msg'])){
  if($_GET['msg'] == 1) {
    echo "<p class='border border-success text-center text-success py-2 formulAir'>Votre formulaire a bien été envoyé</p>";
    }
    else{echo "<p class='border border-danger text-center text-danger py-2'>Erreur dans le formulaire</p>";}
}

?>
<!-----------message erreur fin ---------------->
        <div class="mb-3">
          <label for="fname" class="form-label">Nom*</label>
          <input type="text" class="form-control" id="fname" name="fname" aria-describedby="nom du client" placeholder="Veuillez saisir votre nom">
          <p class="messageError1"></p>
        </div>
        <div class="mb-3">
          <label for="lname" class="form-label">Prénom*</label>
          <input type="text" class="form-control" id="lname" name="lname" aria-describedby="prénom du client" placeholder="Veuillez saisir votre prénom">
          <p class="messageError2"></p>
        </div>
        <div class="mb-3">
          <label for="gender" class="form-label">Sexe*</label><br>
          <input type="radio" name="sex" id="male" aria-describedby="sexe du client" value="male"  class="m-2 form-check-input" >Homme
          <input type="radio" id="female" aria-describedby="sexe du client" value="female"  name="sex" class="m-2 form-check-input">Femme
          <p class="messageError3"></p>
        </div>
        <div class="mb-3">
          <label for="birthday" class="form-label">Date de naissance*:</label>
          <input type="date" id="birthday" name="birthday"  class="form-control"  min="1900-01-01" max="2009-01-01">
        </div>
      <div class="mb-3">
        <label for="CodePostal" class="form-label">Code postal*</label>
        <input type="text" class="form-control" id="CodePostal" name="CodePostal" aria-describedby="code postal" >
        <p class="messageError5"></p>
      </div>
      <div class="mb-3">
        <label for="adress" class="form-label">Adresse</label>
        <input type="text" class="form-control" id="address" name="address" aria-describedby="adresse du client">
      </div>
      <div class="mb-3">
        <label for="ville" class="form-label">Ville</label>
        <input type="text" class="form-control" id="ville"  name="ville" aria-describedby="ville">
      </div>
      <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input id="email" name="email" class="form-control"  placeholder="dave.loper@afpa.fr"></input>
        <p class="messageError6"></p>
      </div>
      <h2 class="col-12">Votre demande</h2>

      <div class="input-group mb-3">
        <label for="sujet" class="form-label">Sujet</label>
        <div class="col-12"></div>
        <select class="form-select" id="sujet" name="sujet">
         <option selected>Veuillez selectionner votre sujet</option>
         <option value="1">One</option>
         <option value="2">Two</option>
         <option value="3">Three</option>
        </select>
      </div>
      <div class="mb-3">
       <label for="question" class="form-label">Votre Question*:</label>
       <textarea type="text" id="question" name="question" class="form-control"></textarea>
       <p class="messageError7"></p>
      </div>
      <div class="form-check  mb-3">
       <input class="form-check-input" type="checkbox" value="" name="formulaireValidation" id="formulaireValidation" >
       <label class="form-check-label" for="formulaireValidation">
      J'accepte le traitement informatique de ce formulaire
       </label>
       <p class="messageError8"></p>
      </div>
      <div class="row gx-0">
      <div class="col-12 col-md-4 
      " id="formSub">
        <button class="btn btn-secondary btn-lg mb-3 " type="submit" name="valider">Envoyer</button>
        <button class="btn btn-secondary btn-lg mb-3" type="reset">Annuler</button>
       </div>
      </div>
       
     </form>
    </main>
    <!-----------end of  main---------------->
    <!-----------Footer---------------->
    <?php include('footer.php');?>
</div>
    <!-----------end of Footer---------------->

   <!-----bootstrap files---->
   <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
  <script src="app2.js"></script>
  </body>
  </html>

