<!DOCTYPE html>
     <html lang="fr">
     <head>
        <meta charset="UTF-8">
        <title>Atelier PHP N°4 - page de détail</title>
    </head>
    <body>
    <?php 
    require "connexion_bdd.php"; //Inclusion de la base de la fonction vers la base de donnee
    $db =connexionBase(); //appel base de donnée
    
    try{
        $reference = $_POST['reference'];
        $pro_id=$_POST['pro_id'];
        $categorie= $_POST['categorie'];
        $libelle= $_POST['libelle'];
        $description= $_POST['description'];
        $prix= $_POST['prix'];
        $stock= $_POST['stock'];
        $couleur= $_POST['couleur'];
        $produitBloque= ($_POST['produitBloque']==true)?1:0;
        $dateDeModification= $_POST['dateDeModification'];

    
        
        if(isset($_POST['envoi'])){



      $db->setAttribute(PDO::ATTR_ERRMODE,
        PDO::ERRMODE_EXCEPTION);

        $req = $db->prepare("UPDATE produits LEFT JOIN categories ON cat_id = pro_cat_id SET pro_ref = :reference , pro_libelle=:libelle , pro_prix=:prix,pro_stock=:stock , pro_couleur=:couleur , cat_nom=:categorie ,pro_d_modif= :dateDeModification , pro_bloque =:produitBloque WHERE pro_id=".$pro_id);
    
      $req->bindParam(':reference',$reference);
      $req->bindParam(':libelle',$libelle);
      $req->bindParam(':prix',$prix);
      $req->bindParam(':stock',$stock);
      $req->bindParam(':couleur',$couleur);
      $req->bindParam(':categorie',$categorie);
      $req->bindParam(':dateDeModification', $dateDeModification);
      $req->bindParam(':produitBloque', $produitBloque);
      $req->execute();

        
    }
    //On renvoie l'utilisateur vers la page de remerciement
    header("Location:tableau.php");
    }

    catch (PDOException $e)
    
    {echo "Erreur : " . $e->getMessage();}

    ?>

    </body>
    </html>