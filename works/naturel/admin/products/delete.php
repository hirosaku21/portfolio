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
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>管理メニュー：商品の削除</title>

  <?php require_once $path . 'element/head.php'; ?>

</head>

<body>
  <!-- header -->
  <header class="header" id="header">
    <?php require_once $path . 'element/header.php'; ?>
  </header>

  <!-- page -->
  <div class="page section container">
    <div id="breadcrumb" class="container">
      <ul>
        <li><a href="../">管理メニュー</a></li>
        <li><a href="index.php">管理メニュー：商品</a></li>
        <li>削除：商品</li>
      </ul>
    </div>
  </div>

  <?php
  require_once $path . 'inc/inc_path.php';
  require_once 'natural_config.php';
  require_once $path . 'func/function.php';
  try {
    if (empty($_POST['id'])) {
      echo 'idを正しく入力してください。';
      exit;
    }
    $id = (int)$_POST['id'];
    $dbh = getDB($dsn, $user, $pass);
    $sql = 'select * from products where id = :id';
    $stmt = $dbh->prepare($sql);
    $stmt->bindValue(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
  ?>
    <div class="container">
      <table>
        <tr>
          <th>ID</th>
          <td><?= $result['id'] ?></td>
        </tr>
        <tr>
          <th>商品名</th>
          <td><?= $result['name'] ?></td>
        </tr>
        <tr>
          <th>画像</th>
          <td><img src="../../image_data/image.php?id=<?= $result['id']; ?>" alt=""></td>
        </tr>
        <tr>
          <th>金額</th>
          <td><?= $result['price'] ?></td>
        </tr>
        <tr>
          <th>商品情報</th>
          <td><?= $result['detail'] ?></td>
        </tr>
        <tr>
          <th>カテゴリー</th>
          <td><?= $result['category'] ?></td>
        </tr>
        <tr>
          <th>詳細情報</th>
          <td><?= $result['more_detail'] ?></td>
        </tr>
        <tr>
          <th>サイズ</th>
          <td><?= $result['size'] ?></td>
        </tr>
        <tr>
          <th>素材</th>
          <td><?= $result['material'] ?></td>
        </tr>
        <tr>
          <th>備考</th>
          <td><?= $result['note'] ?></td>
        </tr>
      </table>
      <div class="admin-back">
        <form action="delete_done.php" method="post">
          <input type="submit" name="id" value="削除する">
          <input type="hidden" name="id" value="<?= $result['id'] ?>">
          <input type="button" value="戻る" onclick="history.back()">
        </form>
      </div>
    </div>
  <?php
    $dbh = null;
  } catch (PDOException $e) {
    echo 'エラー発生：' . htmlspecialchars($e->getMessage(), ENT_QUOTES) . '<br>';
    exit;
  }
  ?>

  <!-- footer -->
  <footer class="footer" id="footer">
    <?php require_once $path . 'element/footer.php'; ?>
  </footer>
</body>

</html>