<?php
$path = './';
require_once $path . 'list/list.php';
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
  <title>お問い合わせ：送信完了 | naturel</title>
  <meta name="description" content="naturel（ナチュレル）へのお問い合わせを送信しました。">
  <meta name="format-detection" content="telephone=no">
  <link rel="canonical" href="https://portfolio-sakuma.com/naturel/done.php">
  <meta name="robots" content="noindex,nofollow">

  <!-- ogp -->
  <meta property="og:site_name" content="naturel">
  <meta property="og:url" content="https://portfolio-sakuma.com/naturel/done.php">
  <meta property="og:type" content="article">
  <meta property="og:title" content="naturelお問い合わせ完了">
  <meta property="og:description" content="naturel（ナチュレル）へのお問い合わせを送信しました。">
  <meta property="og:image" content="https://portfolio-sakuma.com/naturel/done.php">
  <meta property="og:locale" content="ja_JP">

  <?php require_once $path . 'element/head.php'; ?>
</head>

<body id=contact>
  <!-- header -->
  <header class="header" id="header">
    <?php require_once $path . 'element/header.php'; ?>
  </header>
  <!-- breadcrumb -->
  <div id="breadcrumb" class="w-container container">
    <ul>
      <li><a href="index.php">TOP</a></li>
      <li>お問い合わせ：送信完了</li>
    </ul>
  </div>
  <main class="container">
    <h2 class="section-heading">CONTACT<span>お問い合わせ</span></h2>
    <?php
    require_once $path . 'inc/inc_path.php';
    require_once 'natural_config.php';
    require_once $path . 'func/function.php';
    try {
      $dbh = getDB($dsn, $user, $pass);
      $sql = 'insert into contacts (name,mail,kind,comment,reg_time) values (:name,:mail,:kind,:comment,now())';
      $stmt = $dbh->prepare($sql);
      $stmt->bindValue((':name'), $name, PDO::PARAM_STR);
      $stmt->bindValue((':mail'), $mail, PDO::PARAM_STR);
      $stmt->bindValue((':kind'), $kind, PDO::PARAM_INT);
      $stmt->bindValue((':comment'), $comment, PDO::PARAM_STR);
      $stmt->execute();
      $dbh = null;
    ?>
      <p class="contact-done__text">送信しました。</p>
      <p class="contact-done__text--back"><a href="<?= $path; ?>">ホームに戻る</a></p>

    <?php
    } catch (PDOException $e) {
      echo 'エラー発生:' . htmlspecialchars($e->getMessage(), ENT_QUOTES) . '<br>';
      exit;
    }
    ?>

    <!-- contact -->
  </main>

  <!-- footer -->
  <footer class="footer" id="footer">
    <?php require_once $path . 'element/footer.php'; ?>
  </footer>

</body>

</html>