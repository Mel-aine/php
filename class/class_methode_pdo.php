<?php
    require_once 'Database.php';

    $DB = Database::getInstance();


    

    // ici tu vas creer les methodes pour inserer dans ta bd en appelant la methode execute que j'ai mis dans Database.php

    // exemple supposont qu'on n'a une table ''Eleve'' dans notre BD avec les chmaps 'nom', 'age', 'prenom'
    // exemple

    $req = " SELECT nom, prenom, age  FROM Eleve";

    $result = $DB->execute($req);

    //pour voire le resultat tu lance le script dans la console du terminal en etant positionner dans le repertoire ou se trouve ton projet
    // et le projet doit etre dans le repertoir C:\wamp64\www
    echo  json_encode($result);
