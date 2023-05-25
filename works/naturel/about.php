<?php
$path = './';
?>
<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>お店について | naturel</title>
  <meta name="description" content="naturel（ナチュレル）では「大切な人にプレゼントしたい雑貨」をテーマに、多数の商品を取り扱っています。創業時からの歴史を引き継ぎつつ、新たな価値を提供します。">
  <meta name="format-detection" content="telephone=no">
  <link rel="canonical" href="https://portfolio-sakuma.com/naturel/about.php">
  <meta name="robots" content="noindex,nofollow">

  <!-- ogp -->
  <meta property="og:site_name" content="naturel">
  <meta property="og:url" content="https://portfolio-sakuma.com/naturel/about.php">
  <meta property="og:type" content="article">
  <meta property="og:title" content="naturelについて">
  <meta property="og:description" content="naturel（ナチュレル）では「大切な人にプレゼントしたい雑貨」をテーマに、多数の商品を取り扱っています。創業時からの歴史を引き継ぎつつ、新たな価値を提供します。">
  <meta property="og:image" content="https://portfolio-sakuma.com/naturel/img/ogp_photo.jpg">
  <meta property="og:locale" content="ja_JP">

  <?php require_once 'element/head.php'; ?>
</head>

<body id="about">
  <!-- header -->
  <header class="header" id="header">
    <?php require_once 'element/header.php'; ?>
  </header>
  <!-- breadcrumb -->
  <div id="breadcrumb" class="w-container container">
    <ul>
      <li><a href="index.php">TOP</a></li>
      <li>お店について</li>
    </ul>
  </div>

  <main class="container">

    <div class="section-wrapper">
      <section class="about">
        <h2 class="section-heading">Greeting<span>ご挨拶</span></h2>
        <div class="section__image">
          <img src="img/top1.jpg" alt="naturel-facade">
        </div>
        <p>naturel(ナチュレル)は天神新天町にある雑貨店です。創業は1985年の雑貨店で、私たちは2022年に引き継ぎました。見ているだけで落ち着く店内では、「大切な人にプレゼントしたい雑貨」があなたを待っています。古いものも新しいものも活かし、新たな価値を提供します。</p>
      </section>
      <section class="access">
        <h2 class="section-heading">Access<span>アクセス方法</span></h2>
        <div class="gmap">
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3323.5253368300637!2d130.39379211536735!3d33.591671449307206!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3541918ed60e33bd%3A0xa9e3df35de659d25!2z77yI5qCq77yJ44OS44Ol44O844Oq44K544Ki44Kr44OH44Of44O8!5e0!3m2!1sja!2sjp!4v1681269885868!5m2!1sja!2sjp" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
        <div class="access-description">
          <p>naturel</p>
          <dl class="info">
            <div>
              <dt>住所:</dt>
              <dd>〒810-0001 福岡県福岡市中央区天神6丁目4-2</dd>
            </div>
            <div>
              <dt>電話番号:</dt>
              <dd>000-000-0000</dd>
            </div>
            <div>
              <dt>メールアドレス:</dt>
              <dd>naturel@gmail.com</dd>
            </div>
            <div>
              <dt>営業時間:</dt>
              <dd> 9:00~18:00 （不定休）</dd>
            </div>
            <div>
              <dt>所要時間:</dt>
              <dd>西鉄天神駅から徒歩15分<br>
                西鉄バス「天神新天町入り口」から徒歩5分</dd>
            </div>
          </dl>
        </div>
      </section>

      <section class="follow-us">
        <h2 class="section-heading">Follow us<span>各種SNS</span></h2>
        <ul class="sns-list">
          <li class="sns__item">
            <a href="https://line.me/ja/" target="_blank">
              <div class="iconset">
                <i class="fa-brands fa-line about-icon"></i>
                <span>LINE</span>
              </div>
            </a>
          </li>
          <li class="sns__item">
            <a href="https://www.instagram.com/" target="_blank">
              <div class="iconset">
                <i class="fa-brands fa-instagram about-icon"></i>
                <span>Instagram</span>
              </div>
            </a>
          </li>
          <li class="sns__item">
            <a href="https://twitter.com/?lang=ja" target="_blank">
              <div class="iconset">
                <i class="fa-brands fa-twitter about-icon"></i>
                <span>Twitter</span>
              </div>
            </a>
          </li>
        </ul>
      </section>
    </div>

    <!-- category -->
    <section class="category">
      <h3 class="category__title">カテゴリから探す</h3>
      <ul class="category__list">
        <li class="category__item"><a href="list.php#kitchen"><img src="img/kitchen.svg" alt="kitchen" class="kitchen-icon">キッチン</a></li>
        <li class="category__item"><a href="list.php#stationary"><img src="img/interior.svg" alt="interior" class="interior-icon">インテリア</a></li>
        <li class="category__item"><a href="list.php#gift"><img src="img/gift.svg" alt="gift" class="gift-icon">ギフト</a></li>
      </ul>
    </section>

    <!-- cart -->
    <div class="cart">
      <a href="cart/cart.php"><i class="fa-solid fa-cart-shopping"></i></a>
    </div>
  </main>

  <footer class="footer" id="footer">
    <?php require_once 'element/footer.php'; ?>
  </footer>

</body>

</html>