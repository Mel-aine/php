<?php
    require_once 'Database.php';

    $DB = Database::getInstance();

    $req = " DELETE FROM Enseignat
                  
                  WHERE Nom='junior' ";

    $result = $DB->execute($req);

    
    echo  json_encode("enregistrement supprime");