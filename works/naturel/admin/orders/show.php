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
  <title>管理メニュー：注文情報の詳細</title>
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
        <li class="breadcrumb__item"><a href="../../">管理メニュー</a></li>
        <li class="breadcrumb__item"><a href="../">管理メニュー：注文情報</a></li>
        <li class="breadcrumb__item">管理メニュー：注文情報の詳細</li>
      </ul>
    </div>
    <h2 class="section-heading">注文情報の詳細</h2>
  </div>

  <?php
  require_once $path . 'inc/inc_path.php';
  require_once 'natural_config.php';
  require_once $path . 'func/function.php';
  require_once $path . 'list/list.php';
  try {
    $id = (int)$_POST['id'];
    $dbh = getDB($dsn, $user, $pass);
    $sql = 'select * from orders where id = :id';
    $stmt = $dbh->prepare($sql);
    $stmt->bindValue(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    $sql = 'select * from order_products where order_id = :order_id';
    $stmt = $dbh->prepare($sql);
    $stmt->bindValue(':order_id', $result['id'], PDO::PARAM_INT);
    $stmt->execute();
    $result_quantity = $stmt->fetchAll(PDO::FETCH_ASSOC);
  ?>
    <div class="container">
      <table>
        <tr>
          <th>ID</th>
          <th>お名前</th>
          <th>フリガナ</th>
          <th>電話番号</th>
          <th>メールアドレス</th>
          <th>郵便番号</th>
          <th>住所</th>
          <th>支払方法</th>
          <th>合計注文金額</th>
        </tr>
        <tr>
          <td><?= $result['id'] ?></td>
          <td><?= $result['lastname'] ?></td>
          <td><?= $result['kana_name'] ?></td>
          <td><?= $result['tel'] ?></td>
          <td><?= $result['mail'] ?></td>
          <td><?= $result['postcode'] ?></td>
          <td><?= $result['address1'] ?>
            <?= $result['address2'] ?>
            <?= $result['address3'] ?>
            <?= $result['num_address'] ?> </td>
          <td><?= $pay_list[$result['pay']]; ?></td>
          <td><?= $result['total'] ?></td>
        </tr>
      </table><br>
      <table>
        <caption class="caption">
          商品ごとの注文数
        </caption>
        <tr>
          <th>商品名</th>
          <th>数量</th>
          <th>小計</th>
        </tr>
        <?php foreach ($result_quantity as $row_quantity) : ?>
          <tr>
            <td><?= $product_list[$row_quantity['product_id']] ?></td>
            <td><?= $row_quantity['quantity'] ?></td>
            <td><?= $row_quantity['subtotal'] ?></td>
          </tr>
        <?php endforeach; ?>
      </table>
      <p class="admin-back">
        <input type="button" value="戻る" onclick="history.back()">
      </p>
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