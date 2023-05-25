<?php
require_once 'inc/inc_path.php';
require_once 'natural_config.php';
require_once 'func/function.php';
$id = (int)$_GET['id'];
try {
    $dbh = new PDO($dsn, $user, $pass);
    $sql = 'select pic from products where id = ?';
    $stmt = $dbh->prepare($sql);
    $stmt->bindValue(1, $id, PDO::PARAM_INT);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    echo $result['pic'];
} catch (Exception $e) {
    echo 'エラー発生：' . htmlspecialchars($e->getMessage(), ENT_QUOTES, 'utf-8') . '<br>';
    die();
}
