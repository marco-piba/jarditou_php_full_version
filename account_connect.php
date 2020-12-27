<?php


require "connexion_bdd.php"; // Inclusion de notrebibliothèque de fonctions


$verifpseudo = $_POST["Custpseudo1"];
$verifmdp = $_POST["Password2"];


$db = connexionBase(); // Appel de la fonction de connexion
$req = $db->prepare('SELECT * FROM users WHERE user_pseudo = "'.$verifpseudo.'"');
$req->execute();
$resultat = $req->fetch();


// Comparaison du pass envoyé via le formulaire avec la base
$isPasswordCorrect = password_verify($verifmdp, $resultat['user_mdp']);


if (!$resultat)
{
    echo 'Mauvais identifiant ou mot de passe !';
     header("Location:client_connexion.php?msg=4");exit;
}
else{ 
    
    if($isPasswordCorrect) {
        session_start();
        $_SESSION['pseudo'] = $resultat['user_pseudo'];
        $_SESSION['nom'] = $resultat['user_nom'];
        $_SESSION['prenom'] = $resultat['user_prenom'];
        $_SESSION['type'] = $resultat ['user_type'];
        echo 'Vous êtes connecté !';


        //se souvenir de moi 
			//Si la case est cochée
			 if(isset($_POST["remember2"])) {
                 
                //On set 2 cookies un pour l'utilisateur et un pour le mot de passe

				//le nom du cookie "remembermeu" la valeur "$verifpseudo" et la durée "time() + 31536000"
				setcookie("remembermeu", $verifpseudo, time()+31536000);

				//le nom du cookie "remembermep" la valeur "$verifmdp" et la durée "time() + 31536000"
				setcookie("remembermep", $verifmdp, time()+31536000);

			}
			//Si la case est décochée
			elseif (!isset($_POST["remember2"])){

			//On cherche pour nos 2 cookies
			    if (isset($_COOKIE['remembermeu']) and isset($_COOKIE['remembermep'])) {
                 
				//Nous les plaçons comme si ils avaient expirés
             
                setcookie("remembermep", "", time()-3600);
                setcookie("remembermeu", "", time()-3600);
                
			
			}
		}
	//fin se souvenir de moi 



           if($_SESSION['type']=="client"){
            header("Location:first_page.php");exit;}
            else{header("Location:admin_first_page.php");exit;}
    }
    else {
        echo 'Mauvais identifiant ou mot de passe !';
        header("Location:client_connexion.php?msg=4");exit;
    }
}




?>