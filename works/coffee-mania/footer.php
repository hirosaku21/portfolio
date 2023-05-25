<footer class="footer">
  <div class="contents">
    <div class="footer-logo-wrap">
      <h1 class="logo footer-logo"><a href="<?php echo esc_url(home_url()); ?>"><img src="<?php echo esc_url(get_theme_file_uri('/img/img_logo.svg')); ?>" alt="<?php bloginfo('name'); ?>"></a></h1>
      <p class="copy footer-copy"><?php echo bloginfo('description'); ?></p>
    </div>
    <?php wp_nav_menu(
      array(
        'theme_location' => 'footer-menu',
        'menu_class' => 'footer-menu-wrapper',
      )
    ); ?>
    <ul class="sns footer-sns">
      <li><a href="#" class="sns-twitter"></a></li>
      <li><a href="#" class="sns-instagram"></a></li>
      <li><a href="#" class="sns-youtube"></a></li>
    </ul>
    <small class="copyright">Copyright &copy; <?php bloginfo('name'); ?></small>
  </div>
</footer>
<?php wp_footer(); ?>
</body>

</html>