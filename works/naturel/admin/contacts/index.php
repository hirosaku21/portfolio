<?php
session_start();
if (!isset($_SESSION['login'])) {
  header('location:../login.php');
}
$path = '../../';
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

<body id="contacts-index">
  <!-- header -->
  <header class="header" id="header">
    <?php require_once $path . 'element/header.php'; ?>
  </header>
  <!-- breadcrumb -->
  <div id="breadcrumb" class="container">
    <ul>
      <li><a href="../">管理メニュー</a></li>
      <li>管理：お問い合わせ一覧</li>
    </ul>
  </div>
  <div class="container">
    <h2 class="section-heading">管理：お問い合わせ</h2>
    <?php
    require_once $path . 'inc/inc_path.php';
    require_once 'natural_config.php';
    require_once $path . 'func/function.php';
    try {
      $dbh = getDB($dsn, $user, $pass);
      $sql = 'select * from contacts';
      $stmt = $dbh->prepare($sql);
      $stmt->execute();
      $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    ?>
      <table class="admin-table">
        <tr>
          <th>ID</th>
          <th>お名前</th>
          <th>操作</th>
        </tr>
        <?php foreach ($result as $row) : ?>
          <tr>
            <td><?= $row['id']; ?></td>
            <td><?= $row['name']; ?></td>
            <td>
              <div class="admin-control">
                <form action="show.php" method="post">
                  <input type="submit" value="詳細">
                  <input type="hidden" name="id" value="<?= $row['id']; ?>">
                </form>
                <form action="edit.php" method="post">
                  <input type="submit" value="編集">
                  <input type="hidden" name="id" value="<?= $row['id']; ?>">
                </form>
                <form action="delete.php" method="post">
                  <input type="submit" value="削除">
                  <input type="hidden" name="id" value="<?= $row['id']; ?>">
                </form>
              </div>
            </td>
          </tr>
        <?php endforeach; ?>

      </table>
      <p class="admin-back">
        <input type="button" value="戻る" onclick="history.back()">
      </p>
    <?php
    } catch (PDOException $e) {
      echo 'エラー発生:' . htmlspecialchars($e->getMessage(), ENT_QUOTES) . '<br>';
      exit;
    }
    ?>
  </div>

  <!-- footer -->
  <footer class="footer" id="footer">
    <?php require_once $path . 'element/footer.php'; ?>
  </footer>
</body>

</html>