<?php
session_start();
if (!isset($_SESSION['login'])) {
  header('location:../login.php');
}
$path = '../../';
?>
<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>商品新規登録</title>
  <?php require_once $path . 'element/head.php'; ?>
</head>

<body>
  <!-- header -->
  <header class="header" id="header">
    <?php require_once $path . 'element/header.php'; ?>
  </header>

  <!-- breadcrumb -->
  <div id="breadcrumb" class="container">
    <ul>
      <li><a href="../">管理メニュー</a></li>
      <li><a href="index.php">管理メニュー：商品</a></li>
      <li>新規登録：商品</li>
    </ul>
  </div>

  <div class="container">
    <h1>新規登録</h1>
    <form action="add_done.php" enctype="multipart/form-data" method="post">
      <p>
        <label for="name">
          商品名:<br>
          <input type="text" name="name" id="name">
        </label>
      </p>
      <p>
        <label>
          画像：<br>
          <input type="file" name="pic">
        </label>
      </p>
      <p>
        <label>
          金額:<br>
          <input type="number" name="price" min='1' max='30000'>
        </label>
      </p>
      <p>
        <label>
          商品情報:<br>
          <textarea name="detail"></textarea>
        </label>
      </p>
      <p>カテゴリー:</p>
      <label><input type="radio" name="category" value="0">キッチン</label>
      <label><input type="radio" name="category" value="1">ステーショナリー</label>
      <label><input type="radio" name="category" value="2">ギフト</label>
      <p>
        <label>
          説明文：<br>
          <textarea name="description"></textarea>
        </label>
      </p>
      <p>
        <label>
          詳細情報:<br>
          <textarea name="more_detail"></textarea>
        </label>
      </p>
      <p>
        <label>
          サイズ:<br>
          <input type="text" name="size">
        </label>
      </p>
      <p>
        <label>
          素材:<br>
          <input type="text" name="material">
        </label>
      </p>
      <p>
        <label>
          備考:<br>
          <input type="text" name="note">
        </label>
      </p>
      <p class="admin-back">
        <input type="submit" value="新規登録">
        <input type="button" value="戻る" onclick="history.back()">
      </p>
    </form>
  </div>

  <!-- footer -->
  <footer class="footer" id="footer">
    <?php require_once $path . 'element/footer.php'; ?>
  </footer>
</body>

</html>