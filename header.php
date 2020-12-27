<?php session_start();?>

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
                <a class="nav-link active " aria-current="page" href="first_page.php">Accueil</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="e_commerce.php">E-commerce</a>
              </li>

              <!--menu dispo seulement admin-->
              <?php 
                If($_SESSION["type"] == "admin"){echo '<li class="nav-item">
                <a class="nav-link" href="tableau.php">Tableau</a>
              </li>';};
              ?>
              <!--fin menu dispo seulement admin-->


              <li class="nav-item">
                <a class="nav-link " href="contact.php">Contact</a>
              </li>
            </ul>


          <?php if(isset($_SESSION['nom']) and isset($_SESSION['prenom'])){ ?>

           <form action="deconnexion.php" method="post" class="d-flex">
             <p class="mr-2 mt-3">Bienvenu(e) <span><?php echo strtoupper($_SESSION['prenom']);?></span> sur notre site!</p>
             <button type="submit" class="btn btn-outline-danger mr-5 my-2 px-2 rounded-circle" data-toggle="tooltip" data-placement="top" title="Déconnexion">
             <?php $a=str_split($_SESSION['nom']);$b=str_split($_SESSION['prenom']);echo strtoupper($a[0].$b[0]);?>
             </button>
           </form>
          
         <?php } ;?>
 
           <form class="d-flex formSearch">
              <input class="form-control mr-2" type="search" placeholder="Trier par" name="searchInput" aria-label="Search">
              <button class="btn btn-outline-success btnSearch" type="submit">Rechercher</button>
            </form>
          </div>

            <!--Panier quantité produits + Accès panier -->
            <div class="shop_cart mt-2  ml-lg-2" >
               <span><i class="fas fa-shopping-cart" style="font-size:24px"></i></span>
               <div class="shop_cart_nb">0</div>  
            </div>
          
 
           <!--Fin Panier quantité produits + Accès panier -->  
        </div> 
      </nav>
          
           
      <div class="row">
          <div class="col-12"><img src="./photo/promotion.jpg" class="img-fluid w-100" alt="publicité jarditou"></div>
      </div>
</header>





