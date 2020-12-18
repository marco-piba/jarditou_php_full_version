<?php


require "connexion_bdd.php"; // Inclusion de notrebibliothèque de fonctions


$verifpseudo = $_POST["Custpseudo1"];
var_dump($verifpseudo);
$verifmdp = $_POST["Password2"];
var_dump($verifmdp);

$db = connexionBase(); // Appel de la fonction de connexion
$req = $db->prepare('SELECT user_pseudo, user_mdp FROM users WHERE user_pseudo = "'.$verifpseudo.'"');
$req->execute();
$resultat = $req->fetch();


// Comparaison du pass envoyé via le formulaire avec la base
$isPasswordCorrect = password_verify($verifmdp, $resultat['user_mdp']);


if (!$resultat)
{
    echo 'Mauvais identifiant ou mot de passe !';
     header("Location:register_page.php?msg=4");exit;
}
else{ 
    
    if($isPasswordCorrect) {
        session_start();
        $_SESSION['pseudo'] = $resultat['user_pseudo'];
        echo 'Vous êtes connecté !';
        header("Location:first_page.php");exit;
    }
    else {
        echo 'Mauvais identifiant ou mot de passe !';
        header("Location:register_page.php?msg=4");exit;
    }
}




?>