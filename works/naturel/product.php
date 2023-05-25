<?php
require_once 'inc/inc_path.php';
require_once 'natural_config.php';
require_once 'func/function.php';
$path = './';

try {
  if (empty($_GET['id'])) {
    echo 'idを正しく入力してください。';
    exit;
  }
  $id = (int)$_GET['id'];
  $dbh = getDB($dsn, $user, $pass);
  $sql = 'select * from products where id = :id';
  $stmt = $dbh->prepare($sql);
  $stmt->bindValue(':id', $id, PDO::PARAM_INT);
  $stmt->execute();
  $result = $stmt->fetch(PDO::FETCH_ASSOC);
?>
  <!DOCTYPE html>
  <html lang="ja">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title><?php echo $result['name']; ?> | naturel</title>
    <meta name="description" content="<?php echo $result['detail']; ?>">
    <meta name="format-detection" content="telephone=no">
    <link rel="canonical" href="https://portfolio-sakuma.com/naturel/product.php?id=<?php echo $result['id']; ?>">
    <meta name="robots" content="noindex,nofollow">

    <!-- ogp -->
    <meta property="og:site_name" content="naturel">
    <meta property="og:url" content="https://portfolio-sakuma.com/naturel/product.php?id=<?php echo $result['id']; ?>">
    <meta property="og:type" content="article">
    <meta property="og:title" content="<?php echo $result['name']; ?>">
    <meta property="og:description" content="<?php echo $result['detail']; ?>">
    <meta property="og:image" content="https://portfolio-sakuma.com/naturel/img/ogp_photo.jpg">
    <meta property="og:locale" content="ja_JP">

    <?php require_once 'element/head.php'; ?>

  </head>

  <body id="product">
    <!-- header -->
    <header class="header" id="header">
      <?php require_once 'element/header.php'; ?>
    </header>

    <!-- page -->
    <section class="page section container">
      <div id="breadcrumb">
        <ul class="breadcrumb__list">
          <li class="breadcrumb__item"><a href="index.php">TOP</a></li>
          <li class="breadcrumb__item"><a href="list.php">商品一覧</a></li>
          <li class="breadcrumb__item"><?php echo $result['name']; ?></li>
        </ul>
      </div>
      <h2 class="page__heading">Product<span>商品詳細</span></h2>
    </section>

    <main>
      <!-- product -->
      <section class="product section container">
        <div class="product__wrap">
          <div class="product__img">
            <img src="image.php?id=<?php echo $result['id']; ?>" alt="<?php echo $result['name']; ?>">
          </div>
          <div class="product__wrap__right">
            <div class="product__info">
              <h3 class=" product__name"><?php echo $result['name']; ?>
              </h3>
              <p class="product__price">&yen;<?php echo number_format($result['price']); ?>（税込）</p>
              <p class="product__detail"><?php echo $result['detail']; ?></p>
            </div>
            <div class="product__quantity">
              <form action="cart/add.php" method="post">
                <label class="product__quantity__text">
                  数量
                  <select name="quantity" id="quantity">
                    <option value="1">1個</option>
                    <option value="2">2個</option>
                    <option value="3">3個</option>
                    <option value="4">4個</option>
                    <option value="5">5個</option>
                  </select>
                  <input type="hidden" name="id" value="<?php echo $result['id']; ?>">
                  <input type="hidden" name="name" value="<?php echo $result['name']; ?>">
                  <input type="hidden" name="price" value="<?php echo $result['price']; ?>">
                </label>
                <input class="product__cart" type="submit" value="カートに入れる">
              </form>
            </div>
          </div>
        </div>
        <dl>
          <dt class="product__title">商品情報</dt>
          <dd class="product__text"><?php echo $result['more_detail']; ?></dd>
          <dt class="product__title">サイズ</dt>
          <dd class="product__text"><?php echo $result['size']; ?></dd>
          <dt class="product__title">素材</dt>
          <dd class="product__text"><?php echo $result['material']; ?></dd>
          <dt class="product__title">備考</dt>
          <dd class="product__text"><?php echo $result['note']; ?></dd>
        </dl>
      </section>
    <?php
    $dbh = null;
  } catch (PDOException $e) {
    echo 'エラー発生：' . htmlspecialchars($e->getMessage(), ENT_QUOTES) . '<br>';
    exit;
  }
    ?>
    <!-- recommend -->
    <section class="recommend section container">
      <h3 class="recommend__title">おススメアイテム</h3>
      <ul class="recommend__list">
        <li class="recommend__item">
          <a href="product.php?id=5"><img src="img/kitchen/wooden-cutlery.jpg" alt=""></a>
        </li>
        <li class="recommend__item">
          <a href="product.php?id=9"><img src="img/kitchen/pot.jpg" alt=""></a>
        </li>
        <li class="recommend__item">
          <a href="product.php?id=10"><img src="img/interior/aroma-candle.jpg" alt=""></a>
        </li>
        <li class="recommend__item">
          <a href="product.php?id=13"><img src="img/interior/glass-vase.jpg" alt=""></a>
        </li>
      </ul>
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
    </main>

    <!-- cart -->
    <div class="cart">
      <a href="cart/cart.php"><i class="fa-solid fa-cart-shopping"></i></a>
    </div>

    <!-- footer -->
    <footer class="footer" id="footer">
      <?php require_once 'element/footer.php'; ?>
    </footer>

  </body>

  </html>