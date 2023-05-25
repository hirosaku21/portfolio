<?php
require_once 'list/list.php';
$path = './'
?>
<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>お問い合わせ | naturel</title>
  <meta name="description" content="naturel（ナチュレル）のお問い合わせページです。naturelではキッチン用品、インテリア、ギフトなど「大切な人にプレゼントしたい雑貨」を多数取り扱っています。商品や店舗について疑問点がございましたら、お気軽にお問い合わせください。">
  <meta name="format-detection" content="telephone=no">
  <link rel="canonical" href="https://portfolio-sakuma.com/naturel/contact.php">
  <meta name="robots" content="noindex,nofollow">

  <!-- ogp -->
  <meta property="og:site_name" content="naturel">
  <meta property="og:url" content="https://portfolio-sakuma.com/naturel/contact.php">
  <meta property="og:type" content="article">
  <meta property="og:title" content="naturelお問い合わせ">
  <meta property="og:description" content="naturel（ナチュレル）のお問い合わせページです。naturelではキッチン用品、インテリア、ギフトなど「大切な人にプレゼントしたい雑貨」を多数取り扱っています。商品や店舗について疑問点がございましたら、お気軽にお問い合わせください。">
  <meta property="og:image" content="https://portfolio-sakuma.com/naturel/img/ogp_photo.jpg">
  <meta property="og:locale" content="ja_JP">

  <?php require_once 'element/head.php'; ?>
</head>

<body id="contact">
  <!-- header -->
  <header class="header" id="header">
    <?php require_once 'element/header.php'; ?>
  </header>
  <!-- breadcrumb -->
  <div id="breadcrumb" class="w-container container">
    <ul>
      <li><a href="index.php">TOP</a></li>
      <li>お問い合わせ</li>
    </ul>
  </div>

  <!-- contact -->
  <main class="container w-container">
    <h2 class="section-heading">Contact<span>お問い合わせ</span></h2>
    <p>商品や店舗についてのお問い合わせは、下記フォームよりお気軽にお寄せください。</p>
    <p> 必要事項を記入し、「確認する」をクリックしてください。</p>
    <p>ご登録いただいた個人情報は、お問い合わせ内容の確認以外には使用いたしません。</p>
    <form action="confirm.php" method="post">
      <p>
        <label>お名前<span>*必須</span><br>
          <input type="text" name="name" id="name">
        </label>
      </p>
      <p>
        <label>メールアドレス<span>*必須</span><br>
          <input type="email" name="mail" id="mail">
        </label>
      </p>
      <p>お問い合わせ種類<span>*必須</span><br>
        <?php foreach ($kind_list as $key => $list) : ?>
          <label>
            <input type="radio" name="kind" value="<?= $key; ?>" <?= $key == 1 ? 'checked' : ''; ?>>
            <?= $list; ?>
          </label>
        <?php endforeach; ?>
      </p>
      <p>
        <label>
          お問い合わせ内容<span>*必須</span><br>
          <textarea name="comment" cols="30" rows="5" id="comment"></textarea>
        </label>
      </p>
      <p><input id="submit" type="submit" value="確認する"></p>
    </form>
  </main>

  <!-- footer -->
  <footer class="footer" id="footer">
    <?php require_once 'element/footer.php'; ?>
  </footer>


  <script>
    $(function() {
      $('#submit').on('click', function() {
        let isEmpty = false;
        jQuery('#name,#mail,#comment').each(function() {
          if (jQuery(this).val() === '') {
            alert('必須項目が入力されていません！');
            jQuery('#name,#mail,#comment').each(function() {
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