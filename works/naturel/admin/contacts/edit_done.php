<?php
	session_start();
	if(!isset($_SESSION['login'])){
		header('location:../login.php');
	}
$path = '../../';

        require_once $path . 'inc/inc_path.php';
        require_once 'natural_config.php';
        require_once $path . 'func/function.php';
        require_once $path . 'list/list.php';
        try {
            if (empty($_POST['id'])) {
                echo 'IDを正しく入力してください。';
                exit;
            }
            $id = (int)$_POST['id'];
            $name =htmlspecialchars($_POST['name'],ENT_QUOTES);
            $mail =htmlspecialchars($_POST['mail'],ENT_QUOTES);
            $kind = (int)$_POST['kind'];
            $comment =htmlspecialchars($_POST['comment'],ENT_QUOTES);
            $dbh = getDB($dsn, $user, $pass);
            $sql = 'update contacts set name=:name,mail=:mail, kind=:kind, comment= :comment where id =:id';
            $stmt = $dbh->prepare($sql);
            $stmt->bindValue(':id', $id, PDO::PARAM_INT);
            $stmt->bindValue(':name', $name, PDO::PARAM_STR);
            $stmt->bindValue(':mail', $mail, PDO::PARAM_STR);
            $stmt->bindValue(':kind', $kind, PDO::PARAM_INT);
            $stmt->bindValue(':comment', $comment, PDO::PARAM_STR);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
        
            $dbh = null;
            header('location:./');
        } catch (PDOException $e) {
            echo 'エラー発生:' . htmlspecialchars($e->getMessage(), ENT_QUOTES) . '<br>';
            exit;
        }