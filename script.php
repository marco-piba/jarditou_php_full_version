<?php    
        require "connexion_bdd.php"; // Inclusion de notrebibliothèque de fonctions
    
        
        $nom= $_POST['fname'];
        $prenom= $_POST['lname'];
        $genre= $_POST['sex'];
        $birthday= $_POST['birthday'];
        $CodePostal= $_POST['CodePostal'];
        $address= $_POST['address'];
        $ville= $_POST['ville'];
        $email= $_POST['email'];
        $sujet=$_POST['sujet'];
        $question=$_POST['question'];
        $Fvalidation=$_POST['formulaireValidation'];
        

        $expr = "#^([a-z]+(( |')[a-z]+)*)+([-]([a-z]+(( |')[a-z]+)*)+)*$#u";
        $dateExp = "#[0-9]{4}-[0-9]{2}-[0-9]{2}#";
        $postalExp ="#[0-9]{5}#";
        $emailExp = "#[_a-z0-9-]+(.[_a-z0-9-]+)+@[a-z]+.[a-z]{2,3}#";
        $QExpr= "#\?$#";

        if (isset($_POST['valider'])) {
          // Controle des champs si javascript est desactive
          $Err='';

          if (!preg_match($expr,$nom) || empty($nom)) {
            $Err = "Veuillez indiquer votre nom !";
           
          }
          else if (!preg_match($expr,$prenom) || empty($prenom)) {
            $Err = "Veuillez indiquer votre prénom !";
           
          }
          else if (empty($genre)) {
            $Err = "Veuillez indiquer votre prénom !";}
           
          else if (empty($birthday) || !preg_match($dateExp, $birthday)) {
            $Err = "Veuillez indiquer votre date de naisssance !";
          
        }
          else if (empty($CodePostal) || !preg_match($postalExp, $CodePostal)) {
              $Err = "Veuillez indiquer votre code postal !";
            
        } else if (empty($email) || !preg_match($emailExp, $email) ) {
              $Err = "Veuillez enter une addresse mail valide !";
             
        } else if (empty($question) || !preg_match($QExpr, $question)) {
          $Err = "Votre question est incorrecte !";
         
          }
          else if (!isset($Fvalidation)){  
            $Err = "Veuillez accepter le traitement";
         }

          else {
            $Err='';
            
           /*   // Enregistrement en BDD (si besoin)
              Insérer votre requête à cet endroit
              
              // Envoi du mail
              $sujet = "Mail depuis mon site";
              $msg_texte = "Votre texte<br /><br />";
              $msg_texte.= "E-mail : ".$_POST['email']."<br /><br />";
              $msg_texte.= "Nom : ".$_POST['nom'];
              $entete = "Reply-to: noreply@votre-site.com";
              $entete.= "From: Mon site <noreply@mon-site.com>";
              $entete.= "MIME-Version: 1.0";
              $entete.= "Content-Type:text/html; charset=utf-8;";
              $send = mail("votre-email", $sujet, $msg_texte, $entete);
              // Tag pour afficher le bon envoi du formulaire
              $ok = true;*/
            
          }
        
       if ($Err ==''){ header('Location:contact.php?msg=1');
        exit;}

          else{header('Location:contact.php?msg=2');
            exit;}
     
      }


?>
       
        