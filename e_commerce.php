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
        <h2 class="text-align-center font-weight-bold mt-2">Nos produits</h3>
        <div class="produits">
        
<?php

    require "connexion_bdd.php"; // Inclusion de notre bibliothèque de fonctions
    $db = connexionBase();// Appel de la fonction de connexion
/**********************/
 

$page = (!empty($_GET['page']) ? $_GET['page'] : 1);

$limite = 12;

// Partie "Requête"
/* On calcule donc le numéro du premier enregistrement */
$debut = ($page - 1) * $limite;

if(isset($_GET["searchInput"])){
  $searchInput=$_GET["searchInput"];
$requete= "SELECT pro_photo,pro_id , cat_nom , pro_couleur , pro_prix , pro_libelle, pro_bloque, pro_d_modif,pro_d_ajout FROM produits , categories WHERE cat_id = pro_cat_id AND cat_nom LIKE '%$searchInput%'";
}

else {
 
 $requete = "SELECT pro_photo,pro_id , cat_nom , pro_couleur , pro_prix , pro_libelle, pro_bloque, pro_d_modif,pro_d_ajout FROM produits , categories WHERE cat_id = pro_cat_id LIMIT :limite OFFSET :debut"
;}

$requete = $db->prepare($requete);

    $requete->bindValue('limite', $limite, PDO::PARAM_INT);

    /* On lie aussi la valeur */
  $requete->bindValue('debut', $debut, PDO::PARAM_INT);
    $requete->execute();

   if (!$requete) 
    {
        $tableauErreurs = $db->errorInfo();
        echo $tableauErreur[2]; 
        die("Erreur dans la requête");
    }

    if ($requete->rowCount() == 0 && $page == 1 ) 
    {
       // Pas d'enregistrement
       die("La table est vide");
    }

    if  ($requete->rowCount() == 0 && $page !== 1 )
    {   $page-=1;
        header("Location:tableau.php?page=$page");
    exit;}


    // boucle pour ajouter chaque produit de la bdd;
    while ($row = $requete->fetch(PDO::FETCH_OBJ))

    {   
          if($row->pro_bloque == 1){ $row->pro_bloque = '
            <p class="bg-danger text-center ">Bloqué</p
            >';}

          else{$row->pro_bloque ='';}

            echo '
    

      <section class="unitproduit">
       <div class="unitproduit_image">
         <img src="photo/'.$row->pro_id.'.'.$row->pro_photo.'" >
       </div>
       <div class="descproduit py-2">
        <h4 class="prod_titre"><a href="pro_detail.php?pro_id='.$row->pro_id.'" class="prodColor">'.$row->cat_nom.'<span> '.$row->pro_libelle.'</span></a></h4>
        <div class="prix">'.$row->pro_prix.' Eur</div>
       </div>
      </section> ';

          };?>
        
          </div> <!--end of produits  -->

          <?php

          /*********determiner le nbre de page */
        $query="SELECT COUNT(cat_id = pro_cat_id)FROM produits , categories WHERE cat_id = pro_cat_id";
         $query = $db->prepare($query);
         $query->bindValue('nbreRow', $query,PDO::PARAM_INT);
         $query->execute();
         $element = $query->fetch(); 
         $nbre_produits=$element[0] ;
         $nbreDePage =ceil($nbre_produits/$limite);


            ?>

         <!----recuperer la valeur php $page pr connaitre la derniere page du tableau ------>
 <input type=hidden id=lastPage value=<?=$nbreDePage; ?>>


<!-- /*Partie "Liens"
/* Notez que les liens ainsi mis vont bien faire rester sur le même script en passant
 le numéro de page en paramètre-->

    <ul class="pager list-group d-flex flex-row align-items-center justify-content-between mb-2">
      <li class="list-group-item list-group-item-action list-group-item-success mr-3 p-2 text-center precedentBtn btnprecsuiv"><a href="?page=<?php echo $page - 1; ?>" title="Précédent" class="text-decoration-none text-dark">Page précédente</a></li>
      <li class="list-group-item list-group-item-action list-group-item-success p-2 text-center suivantBtn btnprecsuiv"><a href="?page=<?php echo $page + 1; ?>" title="Suivant" class="text-decoration-none text-dark">Page suivante</a></li>
    </ul>


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
      <script src='e_commerce.js'></script>
      <script src='carte.js'></script>
      </html>

