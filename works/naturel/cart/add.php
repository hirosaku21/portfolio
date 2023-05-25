<?php
$path = '../';
session_start();

// $_POST['name']が空欄以外の時に、sessionに挿入する(画面更新時に空の配列ができないように)
if ($_POST['name'] !== null) {

  // 同じ商品を選択したときに、上書きせずに数量を追加する
  if (isset($_SESSION['cart'][$_POST['name']]['quantity'])) {
    $_SESSION['cart'][$_POST['name']]['quantity'] += (int)$_POST['quantity'];
  } else {
    $_SESSION['cart'][$_POST['name']]['quantity'] = (int)$_POST['quantity'];
  }
  $_SESSION['cart'][$_POST['name']]['price'] = (int)$_POST['price'];
  $_SESSION['cart'][$_POST['name']]['id'] = $_POST['id'];
  if (isset($_POST['subtotal'])) {
    $_SESSION['cart'][$_POST['name']]['subtotal'] = $_POST['subtotal'];
  }
  $_SESSION['cart'][$_POST['name']]['subtotal'] = (int)$_POST['quantity'] * (int)$_POST['price'];
}
?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>カート | naturel</title>
  <meta name="description" content="naturel（ナチュレル）の「カート」ページです。naturelでは「大切な人にプレゼントしたい雑貨」をテーマに、多数の商品を取り扱っています。">
  <meta name="format-detection" content="telephone=no">
  <link rel="canonical" href="https://portfolio-sakuma.com/naturel/cart/add.php">
  <meta name="robots" content="noindex,nofollow">

  <!-- ogp -->
  <meta property="og:site_name" content="naturel">
  <meta property="og:url" content="https://portfolio-sakuma.com/naturel/cart/add.php">
  <meta property="og:type" content="article">
  <meta property="og:title" content="naturelのカート">
  <meta property="og:description" content="naturel（ナチュレル）の「カート」ページです。naturelでは「大切な人にプレゼントしたい雑貨」をテーマに、多数の商品を取り扱っています。">
  <meta property="og:image" content="https://portfolio-sakuma.com/naturel/img/ogp_photo.jpg">
  <meta property="og:locale" content="ja_JP">
  <?php require_once $path . 'element/head.php'; ?>
</head>

<body id="add">
  <header class="header" id="header">
    <?php require_once $path . 'element/header.php'; ?>
  </header>
  <main>
    <div class="cart-nav w-container">
      <ul class="step">
        <li class="is-current"><span class="flow-current">STEP1</span><br>
          カートの確認</li>
        <li><span class="flow-bar">STEP2</span><br>
          ご注文方法指定</li>
        <li><span class="flow-bar">STEP3</span><br>
          ご注文完了</li>
      </ul>
    </div>
    <div class="basket container">
      <div class="basket__inner">
        <?php foreach ($_SESSION['cart'] as $key => $cart) : ?>
          <div class="basket-inner__item">
            <div class="basket__image"> <img src="../image.php?id=<?php echo $cart['id']; ?>" alt="<?php echo $key; ?>"> </div>
            <div class="basket__text"> <span class="basket__name"><?php echo $key; ?></span>
              <p class="basket__price">小計<span class="subtotal<?php echo $cart['id']; ?>" title="<?php echo $cart["subtotal"]; ?>"><?php echo number_format($cart['subtotal']); ?></span>円</p>
              <div class="field">
                <div class="field__inner">
                  <p class="quantity">数量:<?php echo $cart['quantity']; ?>個</p>
                  <input class="quantity inputtext" type="hidden" value="<?php echo (int)$cart['quantity']; ?>" id="textbox">
                </div>
              </div>
              <form action="cart_delete.php" method="post">
                <p class="btn__delete">
                  <input type="hidden" name="product_name" value="<?php echo $key; ?>">
                  <input type="submit" value="削除">
                </p>
              </form>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
      <div class="basket__total">
        <p class="basket__total-price"><span>合計(税込み)</span> &emsp;
          <?php
          $total = 0;
          foreach ($_SESSION['cart'] as $key => $cart) {
            $total = $total + $cart['subtotal'];
          }
          echo number_format($total); ?>
          円 </p>
      </div>
      <div class="procedure">
        <form action="../cart/user_address.php" class="btn__next">
          <p class="btn-cent">
            <button type="submit"><i class="fa-solid fa-cart-shopping"></i>ご購入手続きに進む</button>
          </p>
        </form>
      </div>
      <div class="btn__back"><a href="../list.php">元の画面に戻ってお買い物を続ける</a></div>
    </div>

    <!-- recommend -->
    <section class="recommend section container">
      <h3 class="recommend__title">おススメアイテム</h3>
      <ul class="recommend__list">
        <li class="recommend__item"> <a href="../product.php?id=5"><img src="../img/kitchen/wooden-cutlery.jpg"></a> </li>
        <li class="recommend__item"> <a href="../product.php?id=9"><img src="../img/kitchen/pot.jpg"></a> </li>
        <li class="recommend__item"> <a href="../product.php?id=10"><img src="../img/interior/aroma-candle.jpg"></a> </li>
        <li class="recommend__item"> <a href="../product.php?id=13"><img src="../img/interior/glass-vase.jpg"></a> </li>
      </ul>
    </section>
  </main>

  <!-- footer -->
  <footer class="footer" id="footer">
    <?php require_once $path . 'element/footer.php'; ?>
  </footer>

</body>

</html>