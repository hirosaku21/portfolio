  <?php
  session_start();
	if(!isset($_SESSION['login'])){
		header('location:../login.php');
	}
$path = '../../';
  require_once $path.'inc/inc_path.php';
  require_once 'natural_config.php';
  require_once $path.'func/function.php';
  try {
    if (empty($_POST['id'])) {
      echo 'idを正しく入力してください。';
      exit;
    }
    $id = (int)$_POST['id'];
    $dbh = getDB($dsn, $user, $pass);
    $sql = 'delete from products where id = :id';
    $stmt = $dbh->prepare($sql);
    $stmt->bindValue(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $dbh = null;
    header('location:./');
  } catch (PDOException $e) {
    echo 'エラー発生：' . htmlspecialchars($e->getMessage(), ENT_QUOTES) . '<br>';
    exit;
  }
