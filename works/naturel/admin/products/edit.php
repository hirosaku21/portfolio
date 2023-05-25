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
  <title>管理メニュー：編集</title>
  <?php require_once $path . 'element/head.php'; ?>
</head>

<body>
  <!-- header -->
  <header class="header" id="header">
    <?php require_once $path . 'element/header.php'; ?>
  </header>

  <!-- page -->
  <div class="page section container">
    <div id="breadcrumb">
      <ul class="breadcrumb__list">
        <li class="breadcrumb__item"><a href="../index.php">管理メニュー</a></li>
        <li class="breadcrumb__item"><a href="./">管理メニュー：商品</a></li>
        <li class="breadcrumb__item">管理メニュー：編集</li>
      </ul>
    </div>
  </div>

  <?php
  require_once $path . 'inc/inc_path.php';
  require_once 'natural_config.php';
  require_once $path . 'func/function.php';
  require_once 'category_list.php';
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
      <form action="edit_done.php" method="post" enctype="multipart/form-data">
        <table>
          <tr>
            <th>ID</th>
            <td><?= $result['id'] ?>
              <input type="hidden" name="id" value="<?= $result['id'] ?>">
            </td>
          </tr>
          <tr>
            <th><label for="name">商品名</label></th>
            <td><input type="text" name="name" id="name" value="<?= $result['name'] ?>">
            </td>
          </tr>
          <tr>
            <th><label for="pic">画像</label></th>
            <td><img src="../../image_data/image.php?id=<?= $result['id']; ?>" alt=""><br><input type="file" name="pic" id="pic"></td>
          </tr>
          <tr>
            <th><label for="price">金額</label></th>
            <td><input type="text" name="price" id="price" value="<?= $result['price'] ?>">
            </td>
          </tr>
          <tr>
            <th><label for="detail">商品情報</label></th>
            <td>
              <textarea name="detail" id="detail"><?= $result['detail'] ?></textarea>
            </td>
          </tr>
          <tr>
            <th><label>カテゴリー</label></th>
            <td>
              <?php foreach ($category_list as $key => $list) : ?>
                <label>
                  <input type="radio" name="category" value="<?= $key ?>" <?= $key == $result['category'] ? 'checked' : ''; ?>><?= $list; ?>
                </label>
              <?php endforeach; ?>
            </td>
          </tr>
          <tr>
            <th><label for="more_detail">詳細情報</label></th>
            <td>
              <textarea name="more_detail" id="more_detail"><?= $result['more_detail'] ?></textarea>
            </td>
          </tr>
          <tr>
            <th><label for="size">サイズ</label></th>
            <td><input type="text" name="size" id="size" value="<?= $result['size'] ?>">
            </td>
          </tr>
          <tr>
            <th><label for="material">素材</label></th>
            <td><input type="text" name="material" id="material" value="<?= $result['material'] ?>">
            </td>
          </tr>
          <tr>
            <th><label for="note">備考</label></th>
            <td>
              <textarea name="note" id="note"><?= $result['note'] ?></textarea>
            </td>
          </tr>
        </table>
        <p class="admin-back">
          <input type="submit" value="編集する">
          <input type="button" value="戻る" onclick="history.back()">
        </p>
      </form>
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