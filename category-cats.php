<?php get_header(); ?>

<section>
<div class="row">

  <div class="col-lg-3 col-sm-12 widget">
        <?php if(is_active_sidebar('page-sidebar')) :?>
          <?php dynamic_sidebar('page-sidebar'); ?>

        <?php endif; ?>
  </div>

  <div class="col-lg-9 col-sm-12 mx-auto">
      <?php get_template_part('includes/section','cats'); ?>
   <?php previous_posts_link();  ?>
   <?php next_posts_link();  ?>
 </div>

</div>
</section>
<?php get_footer(); ?>
