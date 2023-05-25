<?php
$path = '../';
require_once $path . 'list/list.php';
$lastname = htmlspecialchars($_POST['lastname'], ENT_QUOTES);
$kana_name = htmlspecialchars($_POST['kana_name'], ENT_QUOTES);
$tel = htmlspecialchars($_POST['tel'], ENT_QUOTES);
$mail = htmlspecialchars($_POST['mail'], ENT_QUOTES);
$postcode = htmlspecialchars($_POST['postcode'], ENT_QUOTES);
$address1 = htmlspecialchars($_POST['address1'], ENT_QUOTES);
$address2 = htmlspecialchars($_POST['address2'], ENT_QUOTES);
$address3 = htmlspecialchars($_POST['address3'], ENT_QUOTES);
$num_address = htmlspecialchars($_POST['num_address'], ENT_QUOTES);
$pay = (int)$_POST['pay'];
?>
<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>お客様情報の入力内容確認 | naturel</title>
  <meta name="description" content="naturel（ナチュレル）の「お客様情報の入力内容確認」ページです。naturelでは「大切な人にプレゼントしたい雑貨」をテーマに、多数の商品を取り扱っています。">
  <meta name="format-detection" content="telephone=no">
  <link rel="canonical" href="https://portfolio-sakuma.com/cart/user_address_conf.php">
  <meta name="robots" content="noindex,nofollow">

  <!-- ogp -->
  <meta property="og:site_name" content="naturel">
  <meta property="og:url" content="https://portfolio-sakuma.com/cart/user_address_conf.php">
  <meta property="og:type" content="article">
  <meta property="og:title" content="naturelのお客様情報の入力内容確認の画面">
  <meta property="og:description" content="naturel（ナチュレル）の「お客様情報の入力内容確認」ページです。naturelでは「大切な人にプレゼントしたい雑貨」をテーマに、多数の商品を取り扱っています。">
  <meta property="og:image" content="https://portfolio-sakuma.com/img/ogp_photo.jpg">
  <meta property="og:locale" content="ja_JP">

  <?php require_once $path . 'element/head.php'; ?>
</head>

<body id="user-adress">
  <!-- header -->
  <header class="header" id="header">
    <?php require_once $path . 'element/header.php'; ?>
  </header>

  <!-- カートフロー -->
  <div class="cart-nav">
    <ul class="step">
      <li><span class="flow-bar">STEP1</span><br>カートの確認</li>
      <li class="is-current"><span class="flow-current">STEP2</span><br>ご注文方法指定</li>
      <li><span class="flow-bar">STEP3</span><br>ご注文完了</li>
    </ul>
  </div>

  <!-- 情報入力 -->
  <div class="cus-adress in-container">
    <div class="adress-base">
      <form action="shopping_done.php" method="post">
        <h1>お客様情報の入力</h1>
        <p>内容を確認して問題がなければ、「注文を確定する」を押してください。</p>
        <label for="name-a" class="adress-title">氏名<br></label><?= $lastname ?>
        <input type="hidden" name="lastname" id="name-a" value="<?= $lastname ?>">
        <p>
          <label for="name-b" class="adress-title">フリガナ<br></label><?= $kana_name ?>
          <input type="hidden" name="kana_name" id="name-b" value="<?= $kana_name ?>">
        </p>
        <label for="tel" class="adress-title">電話番号<br></label><?= $tel ?>
        <input type="hidden" name="tel" id="tel" value="<?= $tel ?>">
        <p>
          <label for="u-email" class="adress-title">メールアドレス<br></label><?= $mail ?>
          <input type="hidden" name="mail" id="u-email" value="<?= $mail ?>">
        </p>
        <p>
          <label for="postcode" class="adress-title">郵便番号<br></label><?= $postcode ?>
          <input type="hidden" name="postcode" id="postcode" class="search" maxlength="7" value="<?= $postcode ?>">
        </p>
        <label for="address1" class="adress-title">住所</label>
        (都道府県)<input type="hidden" name="address1" id="address1" value="<?= $address1 ?>"><?= $address1 ?><br>
        (市区町村)<input type="hidden" name="address2" id="address2" value="<?= $address2 ?>"><?= $address2 ?><br>
        (番地)<input type="hidden" name="address3" id="address3" value="<?= $address3 ?>"><?= $address3 ?><br>
        (マンション名・部屋番号)<input type="hidden" name="num_address" id="num-address" value="<?= $num_address ?>"><?= $num_address ?>
        <p class="adress-title">お支払方法</p><?= $pay_list[$pay]; ?>
        <label>
          <input type="hidden" name="pay" value="<?= $pay; ?>">
        </label>
        <p class="btn-cent"><button type="submit" id="submit"><i class="fa-solid fa-cart-shopping"></i>注文を確定する</button></p>
        <input type="button" value="戻る" onclick="history.back()">
      </form>
    </div>
  </div>

  <!-- footer -->
  <footer class="footer" id="footer">
    <?php require_once $path . 'element/footer.php'; ?>
  </footer>
</body>

</html>