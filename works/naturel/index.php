<?php
$path = './';
?>
<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>naturel</title>
  <meta name="description" content="福岡の天神新天町にある雑貨店naturel（ナチュレル）では、キッチン用品、インテリア、ギフトなど「大切な人にプレゼントしたい雑貨」を多数取り扱っています。">
  <meta name="format-detection" content="telephone=no">
  <link rel="canonical" href="https://portfolio-sakuma.com/naturel/index.php">
  <meta name="robots" content="noindex,nofollow">

  <!-- ogp -->
  <meta property="og:site_name" content="naturel">
  <meta property="og:url" content="https://portfolio-sakuma.com/naturel/index.php">
  <meta property="og:type" content="website">
  <meta property="og:title" content="naturelトップページ">
  <meta property="og:description" content="福岡の天神新天町にある雑貨店naturel（ナチュレル）では、キッチン用品、インテリア、ギフトなど「大切な人にプレゼントしたい雑貨」を多数取り扱っています。">
  <meta property="og:image" content="https://portfolio-sakuma.com/naturel/img/ogp_photo.jpg">
  <meta property="og:locale" content="ja_JP">

  <?php require_once 'element/head.php'; ?>
</head>

<body id="home">
  <!-- header -->
  <header class="header" id="header">
    <?php require_once 'element/header.php'; ?>
  </header>

  <main>
    <!-- mv -->
    <div class="mv container">
      <div class="admin-entrance">
        <a href="admin/index.php">管理者ページ</a>
      </div>
      <div class="slider">
        <div><img src="img/top1.jpg" alt="inside_the_store"></div>
        <div><img src="img/shop_image05.jpg" alt="shop_facade"></div>
        <div><img src="img/shop_image.jpg" alt="knick-knacks"></div>
      </div>
    </div>

    <!-- news -->
    <section class="news section container">
      <h2 class="section-heading">Pick Up<span>新着商品</span></h2>
      <ul class="news__list">
        <li class="news__item">
          <a href="product.php?id=5">
            <div class="flex">
              <img src="img/kitchen/wooden-cutlery.jpg" alt="wooden-cutlery" class="scroll-fade-up">
              <div class="news__box">
                <span>NEW</span>
                <h3 class="news__title">木製カトラリーセット</h3>
                <p class="news__text">オリーブ材を使用したカトラリーセット(スプーン/フォーク/ナイフ)です。ナチュラルなテーブルコーディネートや北欧風、素朴な陶器などにピッタリです。</p>
              </div>
            </div>
          </a>
        </li>

        <li class="news__item">
          <a href="product.php?id=9">
            <div class="flex">
              <img src="img/kitchen/pot.jpg" alt="pot" class="scroll-fade-up">
              <div class="news__box">
                <span>NEW</span>
                <h3 class="news__title">両手鍋(コーラルピンク)</h3>
                <p class="news__text">カレーやシチュー煮込み込みなどの料理やパスタ鍋としてもおすすめ。コーラルピンク色はキッチンをかわいらしい印象に!</p>
              </div>
            </div>
          </a>
        </li>
        <li class="news__item">
          <a href="product.php?id=10">
            <div class="flex">
              <img src="img/interior/aroma-candle.jpg" alt="aroma-candle" class="scroll-fade-up">
              <div class="news__box">
                <span>NEW</span>
                <h3 class="news__title">アロマキャンドル</h3>
                <p class="news__text">ジャスミンフローラルの香りで癒しの時間をお届けします。天然性植物ワックスを使用しているため自然にも優しく安心してご使用いただきます。</p>
              </div>
            </div>
          </a>
        </li>
        <li class="news__item">
          <a href="product.php?id=13">
            <div class="flex">
              <img src="img/interior/glass-vase.jpg" alt="glass-vase" class="scroll-fade-up">
              <div class="news__box">
                <span>NEW</span>
                <h3 class="news__title">フラワーベース</h3>
                <p class="news__text">北欧らしいデザインのフラワーベース。季節やその時々により異なった雰囲気をお楽しみいただけます。お部屋やキッチンを彩る使いやすいサイズです。</p>
              </div>
            </div>
          </a>
        </li>
        <li class="news__item">
          <a href="product.php?id=18">
            <div class="flex">
              <img src="img/gift/body-hair-wash.jpg" alt="body-hair-wash" class="scroll-fade-up">
              <div class="news__box">
                <span>NEW</span>
                <h3 class="news__title">ボディヘアーウォッシュ2本セット</h3>
                <p class="news__text">頭からつま先まで洗える天然由来のヘア＆ボディシャンプーです。天然美肌成分ロバミルク配合。</p>
              </div>
            </div>
          </a>
        </li>
        <li class="news__item">
          <a href="product.php?id=17">
            <div class="flex">
              <img src="img/gift/tableware-gift.jpg" alt="tableware-gift" class="scroll-fade-up">
              <div class="news__box">
                <span>NEW</span>
                <h3 class="news__title">食器セット</h3>
                <p class="news__text">新生活祝い、結婚祝い、引っ越し祝い、内祝い、お誕生日プレゼントなどにオススメ。カップ＆ソーサー2客とプレート2枚のセットです。(※カトラリーはつきません)</p>
              </div>
            </div>
          </a>
        </li>
      </ul>
      <div class="readmore"><a href="list.php" class="btnarrow">詳しく見る</a></div>
    </section>

    <!-- ナチュレルについて -->
    <section class="about__naturel section container">
      <h2 class="section-heading">
        <img src="img/logomark.svg" alt="naturel" width="50" height="50">
        <span>ナチュレルについて</span>
      </h2>
      <div class="about-description">
        <div class="about__img">
          <img src="img/top1.jpg" alt="naturel-facade" class="scroll-fade-up">
        </div>
        <div class="about-right">
          <p class="about__text">naturel（ナチュレル）は天神新天町にある雑貨店です。<br>
            見ているだけで落ち着く店内では、「大切な人にプレゼントしたい雑貨」があなたを待っています。</p>
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
          <div class="readmore"><a href="about.php" class="btnarrow">詳しく見る</a></div>
        </div>
      </div>
    </section>

    <!-- category -->
    <section class="category container">
      <h3 class="category__title">カテゴリから探す</h3>
      <ul class="category__list">
        <li class="category__item"><a href="list.php#kitchen"><img src="img/kitchen.svg" alt="kitchen" class="kitchen-icon">キッチン</a></li>
        <li class="category__item"><a href="list.php#stationary"><img src="img/interior.svg" alt="interior" class="interior-icon">インテリア</a></li>
        <li class="category__item"><a href="list.php#gift"><img src="img/gift.svg" alt="gift" class="gift-icon">ギフト</a></li>
      </ul>
    </section>

    <!-- cart -->
    <div class="cart">
      <div class="cart">
        <a href="cart/cart.php"><i class="fa-solid fa-cart-shopping"></i></a>
      </div>
    </div>
  </main>

  <!-- footer -->
  <footer class="footer" id="footer">
    <?php require_once 'element/footer.php'; ?>
  </footer>
  <script>
    $(function() {
      const fade_bottom = 50; // 画面下からどの位置でフェードさせるか(px)
      const fade_move = 100; // どのぐらい要素を動かすか(px)
      const fade_time = 800; // フェードの時間(ms)
      // フェード前のcssを定義
      $(".scroll-fade-up").css({
        opacity: 0,
        transform: "translateY(" + fade_move + "px)",
        transition: fade_time + "ms",
      });
      // スクロールまたはロードするたびに実行
      $(window).on("scroll load", function() {
        const scroll_top = $(this).scrollTop();
        const scroll_bottom = scroll_top + $(this).height();
        const fade_position = scroll_bottom - fade_bottom;
        $(".scroll-fade-up").each(function() {
          const this_position = $(this).offset().top;
          if (fade_position > this_position) {
            $(this).css({
              opacity: 1,
              transform: "translateY(0)",
            });
          }
        });
      });
    });
  </script>

</body>

</html>