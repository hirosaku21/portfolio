<?php
session_start();
if (!isset($_SESSION['msg'])) {
    $_SESSION['msg'] = '';
}
$path = '../';
?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>管理：お問い合わせ</title>


    <?php require_once $path . 'element/head.php'; ?>

</head>

<body>
    <!-- header -->
    <header class="header" id="header">
        <?php require_once $path . 'element/header.php'; ?>
    </header>
    <!-- breadcrumb -->
    <div id="breadcrumb" class="container">
        <ul>
            <li><a href="<?= $path ?>">Home</a></li>
            <li>ログインページ</li>
        </ul>
    </div>
    <article class="container">
        <h2 class="section-heading">ログイン</h2>
        <p class="msg">
            <?php
            echo $_SESSION['msg'];
            $_SESSION['msg'] = '';
            ?>
        </p>
        <form action="check_user.php" method="post">
            <p>
                <label>
                    メールアドレス：<br>
                    <input type="email" name="email" required>
                </label>
            </p>
            <p>
                <label>
                    パスワード：<br>
                    <input type="password" name="password" required>
                </label>
            </p>
            <p>
                <input type="submit" value="ログイン">
                <input type="reset" value="リセット">
            </p>
        </form>
    </article>




    <!-- footer -->
    <footer class="footer" id="footer">
        <?php require_once $path . 'element/footer.php'; ?>
    </footer>

    <!-- js -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
    <script src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script src="<?= $path; ?>js/main.js"></script>

</body>

</html>