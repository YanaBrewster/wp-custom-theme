<?php get_header(); ?>

<section>
<div class="container">
<div class="row">

  <div id="sidebar-secondary" class="sidebar col-lg-3 col-sm-12">
      <?php if ( is_active_sidebar( 'secondary' ) ) : ?>
          <?php dynamic_sidebar( 'secondary' ); ?>
      <?php else : ?>
          <!-- Time to add some widgets! -->
      <?php endif; ?>
  </div>


  <div class="col-lg-8">
      <?php get_template_part('includes/section','archive'); ?>
   <?php previous_posts_link();  ?>
   <?php next_posts_link();  ?>
 </div>

</div>
</div>
</section>
<?php get_footer(); ?>
