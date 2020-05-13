<?php get_header(); ?>

<section>
<div class="row">

  <div class="col-lg-2 pl-5">
    <?php if(is_active_sidebar('page-sidebar')) :?>
      <?php dynamic_sidebar('page-sidebar'); ?>

    <?php endif; ?>
  </div>
  <div class="col-lg-10">
      <?php get_template_part('includes/section','cats'); ?>
   <?php previous_posts_link();  ?>
   <?php next_posts_link();  ?>
 </div>

</div>
</section>
<?php get_footer(); ?>
