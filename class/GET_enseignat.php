<?php
    require_once 'Database.php';

    $DB = Database::getInstance();

    $req = " SELECT Age , Nom FROM Enseignat";

    $result = $DB->execute($req);

    
    echo  json_encode($result);