<?php
    require_once 'Database.php';

    $DB = Database::getInstance();

    $req = " UPDATE Enseignat
                  SET Age='20'
                  WHERE Nom='junior' ";

    $result = $DB->execute($req);

    
    echo  json_encode("mis a jour reussi");