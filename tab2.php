<?php

    require "connexion_bdd.php"; // Inclusion de notre bibliothèque de fonctions
    $db = connexionBase();// Appel de la fonction de connexion
/**********************/
 

$page = (!empty($_GET['page']) ? $_GET['page'] : 1);

$limite = 10;

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
            <tr class="produit">
              <th scope="row" ><img src="'.$row->pro_photo.'" class="img-thumbnail img-fluid w-auto " alt="barbecue '.$row->pro_libelle.'"></th>
              <td><p>'.$row->pro_id.'</p></td>
              <td><p>'.$row->cat_nom.'</p></td>
              <td><p><a href="produits_ajout.php?pro_id='.$row->pro_id.'" title='.$row->pro_libelle.'>'.$row->pro_libelle.'</a></p></td>
              <td><p>'.$row->pro_prix.'$</p></td>
              <td><p>'.$row->pro_couleur.'</p></td>
              <td><p>'.$row->pro_d_ajout.'</p></td>
              <td><p>'.$row->pro_d_modif.'</p></td>
              <td><div>'.$row->pro_bloque.'</div></td>
            </tr>';
            
          }
        



/**si filtre btn Search est activé***/
/*if(isset($_POST["searchInput"])){
 
 $searchInput=$_POST["searchInput"];
 $ff= "SELECT pro_photo,pro_id , cat_nom , pro_couleur , pro_prix , pro_libelle, pro_bloque, pro_d_modif,pro_d_ajout FROM produits , categories WHERE cat_id = pro_cat_id AND cat_nom LIKE '%$searchInput%'";

 $ff = $db->prepare($ff);
 $ff->bindValue('ff', $ff,PDO::PARAM_INT);
 $ff->execute();

 while ($row= $ff->fetch(PDO::FETCH_OBJ))
 { echo '
   <tr class="produit">
     <th scope="row" ><img src="'.$row->pro_photo.'" class="img-thumbnail img-fluid w-auto " alt="barbecue '.$row->pro_libelle.'"></th>
     <td><p>'.$row->pro_id.'</p></td>
     <td><p>'.$row->cat_nom.'</p></td>
     <td><p><a href="produits_ajout.php?pro_id='.$row->pro_id.'" title='.$row->pro_libelle.'>'.$row->pro_libelle.'</a></p></td>
     <td><p>'.$row->pro_prix.'$</p></td>
     <td><p>'.$row->pro_couleur.'</p></td>
     <td><p>'.$row->pro_d_ajout.'</p></td>
     <td><p>'.$row->pro_d_modif.'</p></td>
     <td><div>'.$row->pro_bloque.'</div></td>
   </tr>'; 
 }}
 
  /**si filtre btn Search n'est pas activé***/
// else{
/* On ajoute le marqueur pour spécifier le premier enregistrement */
 /*   $requete = "SELECT pro_photo,pro_id , cat_nom , pro_couleur , pro_prix , pro_libelle, pro_bloque, pro_d_modif,pro_d_ajout FROM produits , categories WHERE cat_id = pro_cat_id LIMIT :limite OFFSET :debut";

    $requete = $db->prepare($requete);

    $requete->bindValue('limite', $limite, PDO::PARAM_INT);
    /* On lie aussi la valeur */
  /*  $requete->bindValue('debut', $debut, PDO::PARAM_INT);
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
            <tr class="produit">
              <th scope="row" ><img src="'.$row->pro_photo.'" class="img-thumbnail img-fluid w-auto " alt="barbecue '.$row->pro_libelle.'"></th>
              <td><p>'.$row->pro_id.'</p></td>
              <td><p>'.$row->cat_nom.'</p></td>
              <td><p><a href="produits_ajout.php?pro_id='.$row->pro_id.'" title='.$row->pro_libelle.'>'.$row->pro_libelle.'</a></p></td>
              <td><p>'.$row->pro_prix.'$</p></td>
              <td><p>'.$row->pro_couleur.'</p></td>
              <td><p>'.$row->pro_d_ajout.'</p></td>
              <td><p>'.$row->pro_d_modif.'</p></td>
              <td><div>'.$row->pro_bloque.'</div></td>
            </tr>';
            

          }
        }*/


          /*********determiner le nbre de page */
        $query="SELECT COUNT(cat_id = pro_cat_id)FROM produits , categories WHERE cat_id = pro_cat_id";
         $query = $db->prepare($query);
         $query->bindValue('nbreRow', $query,PDO::PARAM_INT);
         $query->execute();
         $element = $query->fetch(); 
         $nbre_produits=$element[0] ;
         $nbreDePage =ceil($nbre_produits/$limite);

      
            ?>

