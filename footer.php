<footer class="bg-dark container">
  <div class="container">
  <?php
  wp_nav_menu(
    array(
    'theme_location' => 'footer-menu',
    'menu_class' => 'top-bar'
    )
  );
  ?>
</div>

<p>Copyright @2020</p>

</footer>

<?php wp_footer(); ?>
</body>
</html>
