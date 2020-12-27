<?php

require "connexion_bdd.php"; // Inclusion de notrebibliothèque de fonctions

$nouvnom = $_POST["Customernom"];
$nouvpre = $_POST["Customerpre"];
$nouvpseudo=$_POST["Custpseudo"];
$nouvmail = $_POST["Email0"];
$nouvmdp = $_POST["Password0"];
$nouvmdpconfirm = $_POST["Password1"];
date_default_timezone_set('Europe/Paris');
$actueldate=date("Y-m-d H:i:s");
$expr = "#^([a-z]+(( |')[a-z]+)*)+([-]([a-z]+(( |')[a-z]+)*)+)*$#u";
$emailExp = "#[_a-z0-9-]+(.[_a-z0-9-]+)+@[a-z]+.[a-z]{2,3}#";


if (isset($_POST['inscription'])) {
          // Controle des champs si javascript est desactive
          $Err='';

    if (!preg_match($expr,$nouvnom) || empty($nouvnom)) {
            $Err = "Veuillez indiquer votre nom !";
          }

    else if (!preg_match($expr,$nouvpre) || empty($nouvpre)) {
            $Err = "Veuillez indiquer votre prénom !"; 
          }
         
    else if (empty($nouvmail) || !preg_match($emailExp, $nouvmail) ) {
              $Err = "Veuillez enter une addresse mail valide !";
    }

    else if (empty($nouvmdp) || empty($nouvmdpconfirm) )
    {$Err = "Veuillez entrer ou confirmer un mot de passe ";}

    else if ($nouvmdp !== $nouvmdpconfirm) {
        $Err = "Votre mot de passe n'a pas été confirmé";
    }
   
    else {
            $Err='';
            
          }

        }
        var_dump($Err);



if ($Err ==""){ 

$nouvmdp =password_hash($_POST["Password0"], PASSWORD_DEFAULT);

$db = connexionBase(); // Appel de la fonction de connexion 

$req= $db->prepare("SELECT COUNT(*) FROM users WHERE user_pseudo =:nouvpseudo");

$req->execute(array(
    'nouvpseudo' => $nouvpseudo));

 $resultat = $req->fetch();


    if ($resultat[0] !== "0" ) 
    {
    // Pas d'enregistrement
    header("Location:register_page.php?msg=3");exit;
    }

        

    else{

  /***Envoi de mail pour verification****/

  $dest = $nouvmail;
  $sujet = "Confirmation d'inscription";
  $corp = "Bienvenue sur Jarditou ! Tu peux y acheter des tomates cerises pour l'apéro et une brouette pour les transporter. Sors vite ton American Express !";
  $headers = array("From" => "contact@jarditou.com", "Reply-To" => "commercial@jarditou.com", "X-Mailer" => "PHP/".phpversion() );
  if (mail($dest, $sujet, $corp, $headers)) {
    echo "Email envoyé avec succès à $dest ...";
  } else {
    echo "Échec de l'envoi de l'email...";
  }

  /***fin Envoi de mail pour verification****/


      $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $requete=$db->prepare(
                    "INSERT INTO users
        (user_pseudo,user_nom,user_prenom,user_mail,user_mdp,user_inscripDate)
        VALUES(:nouvpseudo,:nouvnom,:nouvpre,:nouvmail,:nouvmdp,:actueldate)");


        $requete->bindParam(":nouvpseudo",$nouvpseudo);
        $requete->bindParam(":nouvnom",$nouvnom);
        $requete->bindParam(":nouvpre",$nouvpre);
        $requete->bindParam(":nouvmail",$nouvmail);
        $requete->bindParam(":nouvmdp",$nouvmdp);
        $requete->bindParam(":actueldate",$actueldate); 
        $requete->execute();

   header('Location:register_page.php?msg=1');
   exit;
        }

}

else{ header('Location:register_page.php?msg=2');
        exit;}




?>


