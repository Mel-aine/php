<?php
    require_once 'Database.php';

    $DB = Database::getInstance();


    
            $req="INSERT INTO Enseignat(Age,Nom)
                    VALUES('18','pierre')";

            
            
            $result=$DB->execute($req);
            
    
    echo  json_encode("creation reussi");
