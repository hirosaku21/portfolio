<?php
$path = './';
?>
<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>商品の一覧 | naturel</title>
  <meta name="description" content="naturel（ナチュレル）では、キッチン用品、インテリア、ギフトなどを多数取り扱っています。古いものも新しいものも活かし、新たな価値を提供します。
">
  <meta name="format-detection" content="telephone=no">
  <link rel="canonical" href="https://portfolio-sakuma.com/naturel/list.php">
  <meta name="robots" content="noindex,nofollow">

  <!-- ogp -->
  <meta property="og:site_name" content="naturel">
  <meta property="og:url" content="https://portfolio-sakuma.com/naturel/list.php">
  <meta property="og:type" content="article">
  <meta property="og:title" content="naturel商品の一覧">
  <meta property="og:description" content="naturel（ナチュレル）では、キッチン用品、インテリア、ギフトなどを多数取り扱っています。古いものも新しいものも活かし、新たな価値を提供します。
">
  <meta property="og:image" content="https://portfolio-sakuma.com/naturel/img/ogp_photo.jpg">
  <meta property="og:locale" content="ja_JP">

  <?php require_once 'element/head.php'; ?>

</head>
<?php
require_once 'inc/inc_path.php';
require_once 'natural_config.php';
require_once 'func/function.php';
try {
  $dbh = getDB($dsn, $user, $pass);
  $sql_kitchen = 'select * from products where category = 0';
  $stmt = $dbh->prepare($sql_kitchen);
  $stmt->execute();
  $result_kitchen = $stmt->fetchAll(PDO::FETCH_ASSOC);

  $sql_interior = 'select * from products where category = 1';
  $stmt = $dbh->prepare($sql_interior);
  $stmt->execute();
  $result_interior = $stmt->fetchAll(PDO::FETCH_ASSOC);

  $sql_gift = 'select * from products where category = 2';
  $stmt = $dbh->prepare($sql_gift);
  $stmt->execute();
  $result_gift = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

  <body id="list">
    <!-- header -->
    <header class="header" id="header">
      <?php require_once 'element/header.php'; ?>
    </header>

    <div id="breadcrumb" class="w-container container">
      <ul>
        <li><a href="index.php">TOP</a></li>
        <li>商品一覧</li>
      </ul>
    </div>

    <main>
      <!-- kitchen -->
      <section class="kitchen section container" id="kitchen">
        <h2 class="section-heading">Kitchen<span>キッチンアイテム</span></h2>
        <div class="list__inner">
          <ul class="list__list">
            <?php foreach ($result_kitchen as $row) : ?>
              <li class="list__item">
                <a href="product.php?id=<?php echo $row['id']; ?>">
                  <?php if ($row['category'] == 0) : ?>
                    <img src="image.php?id=<?php echo $row['id']; ?>" alt="">
                  <?php endif; ?>
                  <?php if ($row['category'] == 0) : ?>
                    <p class="list__title"><?= $row['name'] ?></p>
                  <?php endif; ?>
                  <?php if ($row['category'] == 0) : ?>
                    <p class="list__price">&yen;<?= number_format($row['price']) ?>（税込）</p>
                  <?php endif; ?>
                </a>
              </li>
            <?php endforeach; ?>
          </ul>
        </div>
      </section>

      <!-- stationary -->
      <section class="stationary section container" id="stationary">
        <h2 class="section-heading">Interior<span>インテリア</span></h2>
        <div class="list__inner">
          <ul class="list__list">
            <?php foreach ($result_interior as $row) : ?>
              <li class="list__item">
                <a href="product.php?id=<?php echo $row['id']; ?>">
                  <?php if ($row['category'] == 1) : ?>
                    <img src="image.php?id=<?php echo $row['id']; ?>" alt="">
                  <?php endif; ?>
                  <?php if ($row['category'] == 1) : ?>
                    <p class="list__title"><?= $row['name'] ?></p>
                  <?php endif; ?>
                  <?php if ($row['category'] == 1) : ?>
                    <p class="list__price">&yen;<?= number_format($row['price']) ?>（税込）</p>
                  <?php endif; ?>
                </a>
              </li>
            <?php endforeach; ?>
          </ul>
        </div>
      </section>

      <!-- gift -->
      <section class="gift section container" id="gift">
        <h2 class="section-heading">Gift<span>ギフト</span></h2>
        <div class="list__inner">
          <ul class="list__list">
            <?php foreach ($result_gift as $row) : ?>
              <li class="list__item">
                <a href="product.php?id=<?php echo $row['id']; ?>">
                  <?php if ($row['category'] == 2) : ?>
                    <img src="image.php?id=<?php echo $row['id']; ?>" alt="">
                  <?php endif; ?>
                  <?php if ($row['category'] == 2) : ?>
                    <p class=" list__title"><?= $row['name'] ?></p>
                  <?php endif; ?>
                  <?php if ($row['category'] == 2) : ?>
                    <p class="list__price">&yen;<?= number_format($row['price']) ?>（税込）</p>
                  <?php endif; ?>
                </a>
              </li>
            <?php endforeach; ?>
          </ul>
        </div>
      </section>

    <?php
    $dbh = null;
  } catch (PDOException $e) {
    echo 'エラー発生：' . htmlspecialchars($e->getMessage(), ENT_QUOTES) . '<br>';
    exit;
  }
    ?>
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
      <a href="cart/cart.php"><i class="fa-solid fa-cart-shopping"></i></a>
    </div>
    </main>

    <!-- cart -->
    <!-- <div class="cart">
      <div class="cart__item">
        <img src="https://placehold.jp/75x75.png">
      </div>
    </div> -->


    <!-- footer -->
    <footer class="footer" id="footer">
      <?php require_once 'element/footer.php'; ?>
    </footer>

  </body>

</html>