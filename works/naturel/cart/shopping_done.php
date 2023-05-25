<?php
$path = '../';

require_once '../inc/inc_path.php';
require_once 'natural_config.php';
require_once '../func/function.php';
session_start();

try {
  $lastname = htmlspecialchars($_POST['lastname'], ENT_QUOTES);
  $kana_name = htmlspecialchars($_POST['kana_name'], ENT_QUOTES);
  $tel = htmlspecialchars($_POST['tel'], ENT_QUOTES);
  $mail = htmlspecialchars($_POST['mail'], ENT_QUOTES);
  $postcode = htmlspecialchars($_POST['postcode'], ENT_QUOTES);
  $address1 = htmlspecialchars($_POST['address1'], ENT_QUOTES);
  $address2 = htmlspecialchars($_POST['address2'], ENT_QUOTES);
  $address3 = htmlspecialchars($_POST['address3'], ENT_QUOTES);
  $num_address = htmlspecialchars($_POST['num_address'], ENT_QUOTES);
  $pay = $_POST['pay'];
  $total = 0;
  foreach ($_SESSION['cart'] as $key => $cart) {
    $total = $total + $cart['subtotal'];
  }

  $dbh = getDB($dsn, $user, $pass);
  $sql = 'insert into orders (lastname, kana_name, tel, mail, postcode, address1, address2, address3, num_address, pay, total) values (:lastname, :kana_name, :tel, :mail, :postcode, :address1, :address2, :address3, :num_address, :pay, :total)';
  $stmt = $dbh->prepare($sql);
  $stmt->bindValue(':lastname', $lastname, PDO::PARAM_STR);
  $stmt->bindValue(':kana_name', $kana_name, PDO::PARAM_STR);
  $stmt->bindValue(':tel', $tel, PDO::PARAM_STR);
  $stmt->bindValue(':mail', $mail, PDO::PARAM_STR);
  $stmt->bindValue(':postcode', $postcode, PDO::PARAM_STR);
  $stmt->bindValue(':address1', $address1, PDO::PARAM_STR);
  $stmt->bindValue(':address2', $address2, PDO::PARAM_STR);
  $stmt->bindValue(':address3', $address3, PDO::PARAM_STR);
  $stmt->bindValue(':num_address', $num_address, PDO::PARAM_STR);
  $stmt->bindValue(':pay', $pay, PDO::PARAM_INT);
  $stmt->bindValue(':total', $total, PDO::PARAM_INT);
  $stmt->execute();

  $last_id = $dbh->lastInsertId();

  foreach ($_SESSION['cart'] as $key => $cart) {
    $quantity = $cart['quantity'];
    $price = $cart['price'];
    $subtotal = $cart['subtotal'];
    $product_id = $cart['id'];
    $sql = 'insert into order_products (quantity, price, subtotal, product_id, order_id) values (:quantity, :price, :subtotal, :product_id, :order_id)';
    $stmt = $dbh->prepare($sql);
    $stmt->bindValue(':quantity', $quantity, PDO::PARAM_INT);
    $stmt->bindValue(':price', $price, PDO::PARAM_INT);
    $stmt->bindValue(':subtotal', $subtotal, PDO::PARAM_INT);
    $stmt->bindValue(':product_id', $product_id, PDO::PARAM_INT);
    $stmt->bindValue(':order_id', $last_id, PDO::PARAM_INT);
    $stmt->execute();
  }
  unset($_SESSION['cart']);
  $dbh = null;
} catch (PDOException $e) {
  echo 'エラー発生：' . htmlspecialchars($e->getMessage(), ENT_QUOTES) . '<br>';
  exit;
}
?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>購入完了ページ | naturel</title>
  <meta name="description" content="naturel（ナチュレル）の購入完了ページです。naturelでは「大切な人にプレゼントしたい雑貨」をテーマに、多数の商品を取り扱っています。" />
  <meta name="format-detection" content="telephone=no">
  <link rel="canonical" href="https://portfolio-sakuma.com/cart/shopping_done.php">
  <meta name="robots" content="noindex,nofollow">

  <!-- ogp -->
  <meta property="og:site_name" content="naturel">
  <meta property="og:url" content="https://portfolio-sakuma.com/cart/shopping_done.php">
  <meta property="og:type" content="website or article">
  <meta property="og:title" content="naturelの購入完了ページ" />
  <meta property="og:description" content="naturel（ナチュレル）の購入完了ページです。naturelでは「大切な人にプレゼントしたい雑貨」をテーマに、多数の商品を取り扱っています。" />
  <meta property="og:image" content="https://portfolio-sakuma.com/img/ogp_photo.jpg">
  <meta property="og:locale" content="ja_JP">

  <?php require_once $path . 'element/head.php'; ?>
</head>

<body id="shopping-done">
  <!-- header -->
  <header class="header" id="header">
    <?php require_once $path . 'element/header.php'; ?>
  </header>

  <!-- カートフロー -->
  <div class="cart-nav container">
    <ul class="step">
      <li><span class="flow-bar">STEP1</span><br>カートの確認</li>
      <li><span class="flow-bar">STEP2</span><br>ご注文方法指定</li>
      <li class="is-current"><span class="flow-current">STEP3</span><br>ご注文完了</li>
    </ul>
  </div>

  <div class="null-cont">
    <div class="sdvh th-container">
      <div class="thank">
        <p>Thank you!</p>
        <p>ご注文ありがとうございました。</p>
      </div>
    </div>
    <div class="th-container">
      <p><a href="<?= $path; ?>">ホームに戻る</a></p>
    </div>
  </div>


  <!-- footer -->
  <footer class="footer" id="footer">
    <?php require_once $path . 'element/footer.php'; ?>
  </footer>


</body>

</html>