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
  <title>編集：お問い合わせ</title>

  <?php require_once $path . 'element/head.php'; ?>

</head>

<body id="contacts-edit">
  <!-- header -->
  <header class="header" id="header">
    <?php require_once $path . 'element/header.php'; ?>
  </header>
  <!-- breadcrumb -->
  <div id="breadcrumb" class="container">
    <ul>
      <li><a href="../">管理メニュー</a></li>
      <li><a href="index.php">管理：お問い合わせ一覧</a></li>
      <li>編集：お問い合わせ</li>
    </ul>
  </div>
  <div class="container">
    <h2 class="section-heading">編集：お問い合わせ</h2>
    <?php
    require_once $path . 'inc/inc_path.php';
    require_once 'natural_config.php';
    require_once $path . 'func/function.php';
    require_once $path . 'list/list.php';
    try {
      if (empty($_POST['id'])) {
        echo 'IDを正しく入力してください。';
        exit;
      }
      $id = (int)$_POST['id'];
      $dbh = getDB($dsn, $user, $pass);
      $sql = 'select * from contacts where id = :id';
      $stmt = $dbh->prepare($sql);
      $stmt->bindValue(':id', $id, PDO::PARAM_INT);
      $stmt->execute();
      $result = $stmt->fetch(PDO::FETCH_ASSOC);
    ?>
      <form action="edit_done.php" method="post">
        <table class="contacts-edit__table">
          <tr>
            <th>ID</th>
            <td><?= $result['id']; ?>
              <input type="hidden" name="id" value="<?= $result['id']; ?>">
            </td>
          </tr>
          <tr>
            <th><label for="name">お名前</label></th>
            <td><input type="text" name="name" id="name" value="<?= $result['name']; ?>"></td>
          </tr>
          <tr>
            <th><label for="mail">メールアドレス</label></th>
            <td><input type="email" name="mail" id="mail" value="<?= $result['mail']; ?>"></td>
          </tr>
          <tr>
            <th>問い合わせの種類</th>
            <td>
              <?php foreach ($kind_list as $key => $list) : ?>
                <label>
                  <input type="radio" name="kind" value="<?= $key; ?>" <?= ($key == $result['kind']) ? 'checked' : ''; ?>>
                  <?= $list; ?>
                </label>
              <?php endforeach; ?>
            </td>
          </tr>
          <tr>
            <th><label for="comment">内容</label></th>
            <td><textarea name="comment" id="comment"><?= $result['comment']; ?></textarea></td>
          </tr>
        </table>
        <p class="admin-back">
          <input type="submit" value="確定">
          <input type="button" value="戻る" onclick="history.back()">
        </p>
      </form>

    <?php
      $dbh = null;
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