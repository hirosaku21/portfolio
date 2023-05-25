<?php
session_start();
if(!isset($_SESSION['login'])){
  header('location:../login.php');
}
$path = '../../';
require_once $path.'inc/inc_path.php';
require_once 'natural_config.php';
require_once $path.'func/function.php';
require_once 'category_list.php';
try {
  if (empty($_POST['id'])) {
    echo 'idを正しく入力してください。';
    exit;
  }
  $id = (int)$_POST['id'];
  $name = htmlspecialchars($_POST['name'], ENT_QUOTES);
  $tmp_name = $_FILES['pic']['tmp_name'];
  $pic_error = $_FILES['pic']['error'];
  if ($pic_error == 0) {
    $pic = fopen($tmp_name, 'r');
  }
  $price = htmlspecialchars((int)$_POST['price'], ENT_QUOTES);
  $detail = htmlspecialchars($_POST['detail'], ENT_QUOTES);
  $category = $_POST['category'];
  $more_detail = htmlspecialchars($_POST['more_detail'], ENT_QUOTES);
  $size = htmlspecialchars($_POST['size'], ENT_QUOTES);
  $material = htmlspecialchars($_POST['material'], ENT_QUOTES);
  $note = htmlspecialchars($_POST['note'], ENT_QUOTES);
  $dbh = getDB($dsn, $user, $pass);
  $sql = 'update products set name = :name, ';
  if ($pic_error == 0) {
    $sql .= 'pic = :pic, ';
  }
  $sql .= 'price = :price, detail = :detail, category = :category, more_detail = :more_detail, size = :size, material = :material ,note = :note where id = :id';
  $stmt = $dbh->prepare($sql);
  $stmt->bindValue(':id', $id, PDO::PARAM_INT);
  $stmt->bindValue(':name', $name, PDO::PARAM_STR);
  if ($pic_error == 0) {
    $stmt->bindValue(':pic', $pic, PDO::PARAM_LOB);
  }
  $stmt->bindValue(':price', $price, PDO::PARAM_INT);
  $stmt->bindValue(':detail', $detail, PDO::PARAM_STR);
  $stmt->bindValue(':category', $category, PDO::PARAM_INT);
  $stmt->bindValue(':more_detail', $more_detail, PDO::PARAM_STR);
  $stmt->bindValue(':size', $size, PDO::PARAM_STR);
  $stmt->bindValue(':material', $material, PDO::PARAM_STR);
  $stmt->bindValue(':note', $note, PDO::PARAM_STR);
  $stmt->execute();
  $dbh = null;
  header('location:./');
} catch (PDOException $e) {
  echo 'エラー発生：' . htmlspecialchars($e->getMessage(), ENT_QUOTES) . '<br>';
  exit;
}
