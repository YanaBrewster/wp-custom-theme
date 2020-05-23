<footer class="bg-yellow myTheme px-3 py-3 mt-5">
  <div class="inline-block">
    <?php
    wp_nav_menu(
      array(
      'theme_location' => 'footer-menu',
      'menu_class' => 'top-bar'
      )
    );
    ?>
  </div>

<h5 class="text-white text-center"><?php echo get_theme_mod('Formative4_footerMessage'); ?></h5>

</footer>

<?php wp_footer(); ?>
</body>
</html>
