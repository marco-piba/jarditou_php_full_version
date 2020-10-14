<!DOCTYPE html>
     <html lang="fr">
     <head>
        <meta charset="UTF-8">
        <title>Atelier PHP N°4 - page de détail</title>
    </head>
    <body>
        <?php    
        require "connexion_bdd.php"; // Inclusion de notrebibliothèque de fonctions
    
        $image=$_FILES['fichier'];
        var_dump($image);
        $reference= $_POST['reference'];
        $categorie= $_POST['categorie'];
        $libelle= $_POST['libelle'];
        $description= $_POST['description'];
        $prix= $_POST['prix'];
        $stock= $_POST['stock'];
        $couleur= $_POST['couleur'];
        $produitBloque= $_POST['produitBloque'];
        $dateAjout= $_POST['dateAjout'];
        

        // On met les types autorisés dans un tableau (ici pour une image)
$aMimeTypes = array("image/gif", "image/jpeg", "image/pjpeg", "image/png", "image/x-png", "image/tiff");

// On extrait le type du fichier via l'extension FILE_INFO 
$finfo = finfo_open(FILEINFO_MIME_TYPE);
var_dump($finfo);
$mimetype = finfo_file($finfo,$image["tmp_name"]);
var_dump($mimetype);
finfo_close($finfo);


if (in_array($mimetype,$aMimeTypes))
{
    /* Le type est parmi ceux autorisés, donc OK, on va pouvoir 
       déplacer et renommer le fichier */
      /* var_dump('photo\'$image["name"]);*/
       $chaine= 'photo\\'.$_FILES["fichier"]["name"];
       var_dump($chaine);
   
     move_uploaded_file($image["tmp_name"],$chaine);

} 
else 
{
   // Le type n'est pas autorisé, donc ERREUR
   echo "Type de fichier non autorisé";    
   exit;
}    

        try{
                $db = connexionBase(); // Appel de la fonction deconnexion 
                $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $requete=$db->prepare(
                    "INSERT INTO produits
        (pro_cat_id,pro_ref,pro_libelle,pro_description,pro_prix,pro_stock,pro_couleur,pro_photo,pro_d_ajout,pro_bloque)
        VALUES(:categorie,:reference,:libelle,:description,:prix,:stock,:couleur,:photo,:dateAjout,:produitBloque)");

        /**Acceder au fichier photo et recuperer la photo****/
        $chaineImg ='.\\'.$chaine;

        $requete->bindParam(':photo',$chaineImg);
        $requete->bindParam(':categorie',$categorie);
        $requete->bindParam(':reference',$reference);
        $requete->bindParam(':libelle',$libelle);
        $requete->bindParam(':description',$description);
        $requete->bindParam(':prix',$prix);
        $requete->bindParam(':stock',$stock);
        $requete->bindParam(':couleur',$couleur);
        $requete->bindParam(':dateAjout',$dateAjout);
        $requete->bindParam(':produitBloque',$produitBloque);
        $requete->execute();
      

                //On renvoie l'utilisateur vers la page 
             header("Location:tableau.php");
             exit;
            }
            catch(PDOException $e){
                echo 'Impossible de traiter les données. Erreur : '.$e->getMessage();
            }

        

?>
    </body>
    </html>