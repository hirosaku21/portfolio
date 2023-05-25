<?php
$path = '../';
session_start();
?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>カート | naturel</title>
  <meta name="description" content="naturel（ナチュレル）の「カート」ページです。naturelでは「大切な人にプレゼントしたい雑貨」をテーマに、多数の商品を取り扱っています。">
  <meta name="format-detection" content="telephone=no">
  <link rel="canonical" href="https://portfolio-sakuma.com/cart/cart.php">
  <meta name="robots" content="noindex,nofollow">

  <!-- ogp -->
  <meta property="og:site_name" content="naturel">
  <meta property="og:url" content="https://portfolio-sakuma.com/cart/cart.php">
  <meta property="og:type" content="article">
  <meta property="og:title" content="naturelのカート">
  <meta property="og:description" content="naturel（ナチュレル）の「カート」ページです。naturelでは「大切な人にプレゼントしたい雑貨」をテーマに、多数の商品を取り扱っています。">
  <meta property="og:image" content="https://portfolio-sakuma.com/img/ogp_photo.jpg">
  <meta property="og:locale" content="ja_JP">

  <?php require_once $path . 'element/head.php'; ?>
</head>

<body id="add" class="cart-page">
  <header class="header" id="header">
    <?php require_once $path . 'element/header.php'; ?>
  </header>

  <main>
    <div class="cart-nav w-container">
      <ul class="step">
        <li class="is-current"><span class="flow-current">STEP1</span><br>カートの確認</li>
        <li><span class="flow-bar">STEP2</span><br>ご注文方法指定</li>
        <li><span class="flow-bar">STEP3</span><br>ご注文完了</li>
      </ul>
    </div>

    <div class="basket container">
      <div class="basket__inner">
        <?php
        if (empty($_SESSION['cart'])) {
          echo '<p class="noitem__text">現在、買い物かごには商品は入っておりません。お買い物を続けるには下の「お買い物を続ける」をクリックしてください。</p>';
        } else {
          foreach ($_SESSION['cart'] as $key => $cart) : ?>
            <div class="basket-inner__item">
              <div class="basket__image">
                <img src="../image.php?id=<?php echo $cart['id']; ?>" alt="<?php echo $key; ?>">
              </div>
              <div class="basket__text">
                <span class="basket__name"><?php echo $key; ?></span>
                <p class="basket__price">小計<?php echo number_format($cart['subtotal']); ?>円</p>
                <div class="field">
                  <div class="field__inner">
                    <p class="quantity">数量:<?php echo $cart['quantity']; ?>個</p>
                    <input class="quantity inputtext" type="hidden" value="<?php echo (int)$cart['quantity']; ?>" id="textbox">
                  </div>
                </div>
                <form action="cart_delete.php" method="post">
                  <p>
                    <input type="hidden" name="product_name" value="<?php echo $key; ?>">
                    <input type="submit" value="削除">
                  </p>
                </form>
              </div>
            </div>
        <?php endforeach;
        } ?>
      </div>
      <?php if (!empty($_SESSION['cart'])) : ?>
        <div class="basket__total">
          <p class="basket__total-price"><span>合計(税込み)</span>
            &emsp;
            <?php
            $total = 0;
            foreach ($_SESSION['cart'] as $key => $cart) {
              $total = $total + $cart['subtotal'];
            }
            echo number_format($total); ?>
            円
          </p>
        </div>
        <div class="procedure">
          <form action="../cart/user_address.php" class="btn__next">
            <p class="btn-cent"><button type="submit"><i class="fa-solid fa-cart-shopping"></i>ご購入手続きに進む</button></p>
          </form>
        </div>
      <?php endif; ?>
      <div class="btn__back"><a href="../list.php">元の画面に戻ってお買い物を続ける</a></div>
      <?php if (empty($_SESSION['cart'])) : ?>
        <div class="basket__empty"></div>
      <?php endif; ?>
    </div>
  </main>

  <!-- footer -->
  <footer class="footer" id="footer">
    <?php require_once $path . 'element/footer.php'; ?>
  </footer>
</body>

</html>