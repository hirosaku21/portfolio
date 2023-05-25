<?php
    function getDB($dsn, $user, $pass){            
        $dbh = new PDO($dsn, $user, $pass); 
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $dbh->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
        return $dbh;
    }