<?php get_header(); ?>

<section>
<div class="container">
<div class="row">

  <div class="col-lg-4 widget pl-5">
    <?php if(is_active_sidebar('blog-sidebar')) :?>
      <?php dynamic_sidebar('blog-sidebar'); ?>

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
