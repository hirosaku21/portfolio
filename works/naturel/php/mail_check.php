<?php
    $email = htmlspecialchars($_POST['email'],ENT_QUOTES);
    if(!isset($_POST['id'])){
        $_POST['id'] = '';
    }
    $id = $_POST['id'];
    require_once '../inc/inc_path.php';
    require_once 'natural_config.php';
    require_once '../func/function.php';
    try{
        $dbh = getDB($dsn,$user,$pass);
        $sql = 'select * from users where email = :email';
        $stmt = $dbh->prepare($sql);
        $stmt->bindValue(':email',$email,PDO::PARAM_STR);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $msg = '';
        if($result && $id != $result['id']){
            $msg = "「{$result['email']}」は登録済のアドレスです。";
        }
        echo $msg;
    } catch (PDOException $e) {
        echo 'エラー発生：' . htmlspecialchars($e->getMessage(), ENT_QUOTES) . '<br>';
        exit;
    }
