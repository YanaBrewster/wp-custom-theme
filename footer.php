<footer class="bg-yellow px-3 py-3 mt-5">
  <?php
  wp_nav_menu(
    array(
    'theme_location' => 'footer-menu',
    'menu_class' => 'top-bar'
    )
  );
  ?>
<h5 class="text-white text-center">Copyright @2020</h5>

</footer>

<?php wp_footer(); ?>
</body>
</html>
