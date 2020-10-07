
    <?php

    require "connexion_bdd.php"; // Inclusion de notre bibliothèque de fonctions
    $db = connexionBase();// Appel de la fonction de connexion
    
    $requete = "SELECT pro_photo,pro_id , cat_nom , pro_couleur , pro_prix , pro_libelle, pro_bloque, pro_d_modif,pro_d_ajout FROM produits , categories WHERE cat_id = pro_cat_id";
    
    $result = $db->query($requete);

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

    // boucle pour ajouter chaque produit de la bdd;
    while ($row = $result->fetch(PDO::FETCH_OBJ))
    {   
          if($row->pro_bloque == 1){ $row->pro_bloque = '
            <p class="bg-danger text-center ">Bloqué</p
            >';}
          else{$row->pro_bloque ='';}

            echo '
            <tr>
              <th scope="row" ><img src="'.$row->pro_photo.'" class="img-thumbnail img-fluid w-auto " alt="barbecue '.$row->pro_libelle.'"></th>
              <td><p>'.$row->pro_id.'</p></td>
              <td><p>'.$row->cat_nom.'</p></td>
              <td><p><a href="produits_ajout.php?pro_id='.$row->pro_id.'" title='.$row->pro_libelle.'>'.$row->pro_libelle.'</a></p></td>
              <td><p>'.$row->pro_prix.'$</p></td>
              <td><p>'.$row->pro_couleur.'</p></td>
              <td><p>'.$row->pro_d_ajout.'</p></td>
              <td><p>'.$row->pro_d_modif.'</p></td>
              <td><div>'.$row->pro_bloque.'</div></td>
            </tr>'
            ;}
            ?>
            
            
           