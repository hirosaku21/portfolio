<?php
$path = '../';
?>
<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>お客様情報の入力 | naturel</title>
  <meta name="description" content="naturel（ナチュレル）の「お客様情報の入力」ページです。naturelでは「大切な人にプレゼントしたい雑貨」をテーマに、多数の商品を取り扱っています。">
  <meta name="format-detection" content="telephone=no">
  <link rel="canonical" href="https://portfolio-sakuma.com/naturel/cart/user_address.php">
  <meta name="robots" content="noindex,nofollow">

  <!-- ogp -->
  <meta property="og:site_name" content="naturel">
  <meta property="og:url" content="https://portfolio-sakuma.com/naturel/cart/user_address.php">
  <meta property="og:type" content="article">
  <meta property="og:title" content="naturelのお客様情報入力画面">
  <meta property="og:description" content="naturel（ナチュレル）の「お客様情報の入力」ページです。naturelでは「大切な人にプレゼントしたい雑貨」をテーマに、多数の商品を取り扱っています。">
  <meta property="og:image" content="https://portfolio-sakuma.com/naturel/img/ogp_photo.jpg">
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
      <form action="user_address_conf.php" method="post">
        <h1>お客様情報の入力</h1>
        <label for="name-a" class="adress-title">氏名<span>*必須</span></label>
        <input type="text" name="lastname" id="name-a">
        <p>
          <label for="name-b" class="adress-title">フリガナ<span>*必須</span></label>
          <input type="text" name="kana_name" id="name-b">
        </p>
        <label for="tel" class="adress-title">電話番号<span>*必須</span></label>
        <input type="tel" name="tel" id="tel">
        <p>
          <label for="u-email" class="adress-title">メールアドレス<span>*必須</span></label>
          <input type="email" name="mail" id="u-email">
        </p>
        <p>
          <label for="postcode" class="adress-title">郵便番号<span>*必須</span></label>
          <input type="text" name="postcode" id="postcode" class="search" maxlength="7">
        </p>
        <label for="address1" class="adress-title">住所<span>*必須</span></label>
        (都道府県)<input type="text" name="address1" id="address1"><br>
        (市区町村)<input type="text" name="address2" id="address2"><br>
        (番地)<br><input type="text" name="address3" id="address3"><br>
        (マンション名・部屋番号)<input type="text" name="num_address" id="num-address">
        <p class="adress-title">お支払方法</p>
        <label>
          <input type="radio" name="pay" value="1">
          代引引換(eコレクト)
        </label>
        <label>
          <input type="radio" name="pay" value="2" checked>
          クレジットカード
        </label>
        <label>
          <input type="radio" name="pay" value="3">
          GMO後払い
        </label>
        <p class="btn-cent"><button type="submit" id="submit"><i class="fa-solid fa-cart-shopping"></i>注文内容を確認する</button></p>
        <p class="address__back"><a href="cart.php">買い物かごに戻る</a></p>
      </form>
    </div>
  </div>
  <!-- footer -->
  <footer class="footer" id="footer">
    <?php require_once $path . 'element/footer.php'; ?>
  </footer>

  <script src="<?= $path; ?>js/app_poscode.js"></script>
  <script>
    $(function() {
      $('#submit').on('click', function() {
        let isEmpty = false;
        jQuery('#name-a,#name-b,#tel,#u-email,#postcode').each(function() {
          if (jQuery(this).val() === '') {
            alert('必須項目が入力されていません！');
            jQuery('#name-a,#name-b,#tel,#u-email,#postcode').each(function() {
              if (jQuery(this).val() === '') {
                $(this).css('background-color', 'rgba(255,123,123,0.4)');
                $(this).focus;
                isEmpty = true;
              } else {
                $(this).css('background-color', '');
              }
            });
            $(this).focus();
            isEmpty = true;
            return false;
          }
        });
        if (isEmpty)
          return false;
      });
    });
  </script>
</body>

</html>