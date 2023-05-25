<?php
require_once 'list/list.php';
$path = './';
$name = htmlspecialchars($_POST['name'], ENT_QUOTES);
$mail = htmlspecialchars($_POST['mail'], ENT_QUOTES);
$kind = (int)$_POST['kind'];
$comment = htmlspecialchars($_POST['comment'], ENT_QUOTES);
?>
<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>お問い合わせ：確認 | naturel</title>
  <meta name="description" content="naturel（ナチュレル）のお問い合わせ確認ページです。商品や店舗について疑問点がございましたら、お気軽にお問い合わせください。">
  <meta name="format-detection" content="telephone=no">
  <link rel="canonical" href="https://portfolio-sakuma.com/naturel/confirm.php">
  <meta name="robots" content="noindex,nofollow">

  <!-- ogp -->
  <meta property="og:site_name" content="naturel">
  <meta property="og:url" content="https://portfolio-sakuma.com/naturel/confirm.php">
  <meta property="og:type" content="article">
  <meta property="og:title" content="naturelお問い合わせ確認">
  <meta property="og:description" content="naturel（ナチュレル）のお問い合わせ確認ページです。商品や店舗について疑問点がございましたら、お気軽にお問い合わせください。">
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
      <li>お問い合わせ：確認</li>
    </ul>
  </div>
  <!-- contact -->
  <main class="container">
    <h2 class="section-heading">Contact<span>お問い合わせ</span></h2>
    <p> 入力内容を確認し間違いがなければ、「送信する」をクリックしてください。</p>
    <p>ご登録いただいた個人情報は、お問い合わせ内容の確認以外には使用いたしません。</p>
    <form action="done.php" method="post">
      <p>
        <label>お名前<br><?= $name ?>
          <input type="hidden" name="name" value="<?= $name ?>">
        </label>
      </p>
      <p>
        <label>メールアドレス<br><?= $mail ?>
          <input type="hidden" name="mail" value="<?= $mail ?>">
        </label>
      </p>
      <p>お問い合わせ種類<br><?= $kind_list[$kind]; ?>
        <label>
          <input type="hidden" name="kind" value="<?= $kind; ?>">
        </label>
      </p>
      <p>
        <label>
          お問い合わせ内容<br><?= nl2br($comment); ?>
          <input type="hidden" name="comment" value="<?= $comment; ?>">
        </label>
      </p>
      <p>
        <input type="submit" value="送信する">
        <input type="button" value="戻る" onclick="history.back()">
      </p>
    </form>
  </main>

  <!-- footer -->
  <footer class="footer" id="footer">
    <?php require_once 'element/footer.php'; ?>
  </footer>

</body>

</html>