<!DOCTYPE html>
     <html lang="fr">
     <head>
        <meta charset="UTF-8">
        <title>Atelier PHP N°4 - page de détail</title>
    </head>
    <body>
    <?php 
    
    
    try{
        require "connexion_bdd.php"; //Inclusion de la base de la fonction vers la base de donnee
        $db = connexionBase() ;//appel base de donnée
        $pro_id =$_GET['pro_id'];
        $db->setAttribute(PDO::ATTR_ERRMODE,
        PDO::ERRMODE_EXCEPTION);
        $requete = "DELETE FROM produits WHERE pro_id =".$pro_id;
        $sth= $db->prepare($requete);

        $sth->execute();

        $count = $sth->rowCount();
        print('Effacement de ' .$count. ' entrées.');

        //On renvoie l'utilisateur vers la page de remerciement
        header("Location:tableau.php");

    }

    catch(PDOException $e){
            echo "Erreur : " . $e->getMessage();
    }

    ?>

    </body>
    </html>