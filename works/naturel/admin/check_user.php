<?php
session_start();
$path='../';
$email = htmlspecialchars($_POST['email'], ENT_QUOTES);
$password = htmlspecialchars($_POST['password'], ENT_QUOTES);
require_once $path . 'inc/inc_path.php';
require_once 'natural_config.php';
require_once $path . 'func/function.php';
try{
    $dbh = getDB($dsn,$user,$pass);
    $sql='select * from users where email= :email';
    $stmt= $dbh->prepare($sql);
    $stmt->bindValue('email',$email,PDO::PARAM_STR);
    $stmt->execute();
    $result =$stmt->fetch(PDO::FETCH_ASSOC);
    if($result && password_verify($password,$result['password'])){
        $_SESSION['login'] = session_id();
        $_SESSION['name'] = $result['name'];
        $_SESSION['id'] = $result['id'];
        header('location:./');
    }else{
        $_SESSION['msg'] = '入力情報が間違っています。';
        header('location:login.php');
    }



} catch (PDOException $e) {
    echo 'エラー発生：' . htmlspecialchars($e->getMessage(), ENT_QUOTES) . '<br>';
    exit;
}