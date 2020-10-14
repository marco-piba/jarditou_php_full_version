<?php
function connexionBase()
{
   // Paramètre de connexion serveur
 
   if ($_SERVER["SERVER_NAME"] == "dev.amorce.org")
   {
        // Paramètres de connexion serveur distant
        $host = "localhost";
        $login = "msauvage";     // Votre loggin d'accès au serveur de BDD 
        $password ="ms20104";    // Le Password pour vous identifier auprès du serveur
        $base = "msauvage";    // La BDD avec laquelle vous voulez travailler 
        try 
        {
     
         $db = new PDO("mysql:host=localhost;dbname=msauvage;charset=utf8","msauvage","ms20104");
       
          $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
         } 
         catch (Exception $e) 
         {
             echo 'Erreur : ' . $e->getMessage() . '<br>';
             echo 'N° : ' . $e->getCode() . '<br>';
             die('Connexion au serveur impossible.');
             
         }
    }

    // ici un 'OU' car il se peut que le 'localhost' ne soit pas reconnu !
  /* if ($_SERVER["SERVER_NAME"] == "localhost" || $_SERVER["SERVER_NAME"] == "127.0.0.1")*/
    // également pour éviter la condition ci-dessus, ne mettre qu'un 'ELSE'
   else
        {
        // Paramètres de connexion serveur local
        $host = "localhost";
        $login = "root";     // Votre login d'accès au serveur de BDD 
        $password ="";    // Le Password pour vous identifier auprès du serveur
        $base = "jarditou";    // La bdd avec laquelle vous voulez travailler 

        try 
        {
     
       $db = new PDO('mysql:host='.$host.';charset=utf8;dbname='.$base, $login, $password);
          
          $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
         } 
         catch (Exception $e) 
         {
             echo 'Erreur : ' . $e->getMessage() . '<br>';
             echo 'N° : ' . $e->getCode() . '<br>';
             die('Connexion au serveur impossible.');
             
         }
}
 
    return $db; 
}
?>