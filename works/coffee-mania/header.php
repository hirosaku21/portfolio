<!DOCTYPE html>
<html lang="<?php language_attributes(); ?>">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php wp_head(); ?>
  <meta name="robots" content="noindex, nofollow">
</head>

<body <?php body_class(); ?>>
  <?php wp_body_open(); ?>
  <header class="header" id="js-header">
    <h1 class="logo header-logo"><a href="<?php echo esc_url(home_url()); ?>"><img src="<?php echo esc_url(get_theme_file_uri('/img/img_logo.svg')); ?>" alt="<?php bloginfo('name'); ?>"></a></h1>
    <nav class="nav" id="js-nav">
      <?php wp_nav_menu(
        array('theme_location' => 'header-menu')
      ); ?>
    </nav>
    <div class="btn btn-nav" id="js-nav-btn">
      <span></span>
      <span></span>
      <span></span>
    </div>
  </header>