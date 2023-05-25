<?php
session_start();
if (!isset($_SESSION['login'])) {
    header('location:./login.php');
}
$path = '../';
?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>管理：メニュー</title>
    <?php require_once $path . 'element/head.php'; ?>
</head>

<body id="admin-menu">
    <!-- header -->
    <header class="header" id="header">
        <?php require_once $path . 'element/header.php'; ?>
    </header>
    <div class="container">
        <h2 class="section-heading">管理：メニュー</h2>
        <ul class="admin-list">
            <li><a href="contacts/">管理：お問い合わせ</a></li>
            <li><a href="products/">管理：商品</a></li>
            <li><a href="orders/">管理：注文</a></li>
            <li><a href="logout.php">ログアウト</a></li>
        </ul>
    </div>

    <!-- footer -->
    <footer class="footer" id="footer">
        <?php require_once $path . 'element/footer.php'; ?>
    </footer>
</body>

</html>