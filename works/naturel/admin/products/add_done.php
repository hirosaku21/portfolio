<?php
session_start();
if (!isset($_SESSION['login'])) {
  header('location:../login.php');
}
$path = '../../';
require_once $path.'inc/inc_path.php';
require_once 'natural_config.php';
require_once $path.'func/function.php';

try {
  $tmp_name = $_FILES['pic']['tmp_name'];
  $pic = fopen($tmp_name, 'r');
  $name = htmlspecialchars($_POST['name'], ENT_QUOTES);
  $detail = htmlspecialchars($_POST['detail'], ENT_QUOTES);
  $price = htmlspecialchars((int)$_POST['price'], ENT_QUOTES);
  $category = (int)$_POST['category'];
  $more_detail = htmlspecialchars($_POST['more_detail'], ENT_QUOTES);
  $size = htmlspecialchars($_POST['size'], ENT_QUOTES);
  $material = htmlspecialchars($_POST['material'], ENT_QUOTES);
  $note = htmlspecialchars($_POST['note'], ENT_QUOTES);

  $dbh = getDB($dsn, $user, $pass);
  $sql = 'insert into products (name, pic, price, detail, category, more_detail, size, material, note) values (:name, :pic, :price, :detail, :category, :more_detail, :size, :material, :note)';
  $stmt = $dbh->prepare($sql);
  $stmt->bindValue(':name', $name, PDO::PARAM_STR);
  $stmt->bindValue(':pic', $pic, PDO::PARAM_LOB);
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
