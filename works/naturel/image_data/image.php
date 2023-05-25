<?php
    $id = (int)$_GET['id'];
    require_once '../inc/inc_path.php';
    require_once 'natural_config.php';
    require_once '../func/function.php';
    try {
        $dbh = getDB($dsn, $user, $pass);
        $sql = 'select * from products where id = :id';
        $stmt = $dbh->prepare($sql);
        $stmt->bindValue(':id',$id,PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC); 
        $dbh = null;
        echo $result['pic'];
    } catch (PDOException $e) {
        echo 'エラー発生：' . htmlspecialchars($e->getMessage(), ENT_QUOTES) . '<br>';
        exit;
    }