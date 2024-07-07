<?php
    require_once 'Database.php';

    $DB = Database::getInstance();


    
            $req="INSERT INTO Enseignat SET Age=1, Nom ='Teste'";

            
            
            $result=$DB->execute($req);
            
    
    echo  json_encode("creation reussi");
