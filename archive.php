<?php get_header(); ?>

<div class="container">

  <div class="row mt-5">

    <div id="sidebar-secondary" class="sidebar col-lg-3 col-sm-12">
        <?php if ( is_active_sidebar( 'primary' ) ) : ?>
            <?php dynamic_sidebar( 'primary' ); ?>
        <?php else : ?>
        <?php endif; ?>
    </div>

    <div class="col-lg-8 col-sm-12">

      <h1 class="myHeadings"> <?php echo single_cat_title(); ?> </h1>
      <?php get_template_part('includes/section','archive'); ?>

   <?php previous_posts_link();  ?>
   <?php next_posts_link();  ?>

   </div>

 </div>

</div>

<?php get_footer(); ?>
