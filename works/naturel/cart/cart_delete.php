  <?php

  session_start();

  require_once '../inc/inc_path.php';
  require_once 'natural_config.php';
  require_once '../func/function.php';
  echo '<pre>';
  print_r($_POST['product_name']);
  echo '</pre>';

  unset($_SESSION['cart'][$_POST['product_name']]);

  header('location:cart.php');
