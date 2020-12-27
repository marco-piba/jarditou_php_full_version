
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

 <header>
      <div class="row align-items-center justify-content-between mr-5">
        <div class=" col-5 ">
            <img src="./photo/jarditou_logo.jpg" alt="logo jarditou" class="img-fluid">
        </div>
        <h1 class="col-7 text-right text-dark pr-5">Tout le jardin</h1>
      </div>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">Jarditou.com</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active " aria-current="page" href="register_page.php">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="register_page.php">Tableau</a>
              </li>
              <li class="nav-item">
                <a class="nav-link " href="register_page.php">Contact</a>
              </li>
            </ul>
            <form class="d-flex formSearch">
              <input class="form-control mr-2" type="search" placeholder="Search" name="searchInput" aria-label="Search">
              <button class="btn btn-outline-success btnSearch" type="submit">Search</button>
            </form>
          </div>
        </div>
      </nav>
      <div class="row">
          <div class="col-12"><img src="./photo/promotion.jpg" class="img-fluid w-100" alt="publicité jarditou" ></div>
</header>
 
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
      </main>



<!----------- Footer---------------->
<?php include('footer.php');?>
<!-----------end of Footer---------------->


 <!--connexion des utilisateurs -->
<div class="overlaycont pt-5 row">

<!-----------message erreur si formulaire pas valide---------------->
        <?php
if(isset($_GET['msg'])){
  if($_GET['msg'] == 1) {
    echo "<p class='text-light bg-success text-center text-success py-2 zindex col-12'>Votre inscription a été enregistrée.Vous pouvez désormais vous connecter à votre compte</p>";
    }
    else if ($_GET['msg'] == 2){echo "<p class='text-light bg-danger text-center text-danger py-2 zindex col-12'>Erreur dans votre inscription</p>";}
    else if ($_GET['msg'] == 3) {echo "<p class='text-light bg-info text-center text-danger py-2 zindex col-12'>Ce pseudo est déjà utilisé .</p>";}
    else {echo "<p class='text-light bg-danger text-center text-danger py-2 zindex col-12'>Mauvais identifiant ou mot de passe !</p>";}
}

?>
<!-----------message erreur fin ---------------->

<form class="logContainer col-10 col-md-5 mt-5 shadow" action='account_connect.php' method='post'>
  <h2 class="mb-3 font-weight-bold">Déja un compte ?</h2>
  <div class="mb-3">
    <label for="Custpseudo1" class="form-label">Votre pseudo<span class="text-danger"> *</span></label>
    <input type="text" class="form-control" id="Custpseudo1" name="Custpseudo1" value="<?php if(isset($_COOKIE['remembermeu'])){echo $_COOKIE['remembermeu'];} ;?>" required>
  </div>
  <div class="mb-3">
    <label for="Password2" class="form-label">Mot de passe<span class="text-danger"> *</label>
    <input type="password" class="form-control" id="Password2" name="Password2" value="<?php if(isset($_COOKIE['remembermep'])){echo $_COOKIE['remembermep'];} ;?>">
  </div>
  <div class='d-flex align-items-center justify-content-center flex-column'>
  <div class="mb-3 form-check">
    <input type="checkbox" class="form-check-input" id="remember2" name="remember2">
    <label class="form-check-label" for="remember2">Se souvenir de moi</label>
  </div>
  
  <button type="submit" class="btn btn-primary btnInscription" name="connecter">Se connecter</button>
  <div id="emailHelp" class="form-text mt-2">Vos informations resteront confidentielles</div>
  </div>
</form>
</div>

 <!--Fin connexion des utilisateurs-->


</div>

<!-----bootstrap files---->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
</body>
</html>

