<!DOCTYPE html>
<html>
    <head>
        <title>php</title>
        <meta charset="utf-8">
    </head>
    <body>
        <h1>Connexion a la Base de données MySQL</h1>  
        <?php
            $servername = 'localhost';
            $username = 'root';
            $password = '';
            
            //On essaie de se connecter
           try{
                $conn = new PDO("mysql:host=$servername", $username, $password);
                //On définit le mode d'erreur de PDO sur Exception$dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//creation d une base de donnée
               $sql = "CREATE DATABASE mel_";
               $conn->exec($sql);
           }

               /*On capture les exceptions si une exception est lancée et on affiche
             *les informations relatives à celle-ci*/
           catch(PDOException $e){
            echo "Erreur : " . $e->getMessage();
         }
         ?>
         <?php 
         $servername = 'localhost';
         $username = 'root';
         $password = '';
         $dbname = 'mel_';
         
         //On essaie de se connecter
        try{
             $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
             //On définit le mode d'erreur de PDO sur Exception$dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
             $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

               //creation d une table dans la base mel_
                $sql = "CREATE TABLE abonnees(
                        Id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                        Nom VARCHAR(30) NOT NULL,
                        Prenom VARCHAR(30) NOT NULL,
                        Numero_abonnee VARCHAR(9) NOT NULL,
                        Mail VARCHAR(50) NOT NULL,
                        UNIQUE(Numero_abonnee))";
                    $conn->exec($sql);
        }
                    /*On capture les exceptions si une exception est lancée et on affiche
             *les informations relatives à celle-ci*/
           catch(PDOException $e){
            echo "Erreur : " . $e->getMessage();
         }
         ?>
         <?php

        $servername = 'localhost';
        $username = 'root';
        $password = '';
        $dbname = 'mel_';
//On essaie de se connecter
try{
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    //On définit le mode d'erreur de PDO sur Exception$dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                        //inserer des elements dans la table abonnees
                $sql = "INSERT INTO abonnees(Prenom,Nom,Numero_abonnee,Mail)
                    VALUES('Giraud','Pierre','99898585','pierre.giraud@edhec.com')";

                  $conn->exec($sql)  ;  


              }
                
            
            /*On capture les exceptions si une exception est lancée et on affiche
             *les informations relatives à celle-ci*/
           catch(PDOException $e){
              echo "Erreur : " . $e->getMessage();
           }
            
    
    
        ?>
    </body>
</html>