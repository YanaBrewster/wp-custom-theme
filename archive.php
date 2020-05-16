<?php get_header(); ?>

<section class="page-wrap">
<div class="container">

  <section class="row">

    <div id="sidebar-secondary" class="sidebar col-lg-3 col-sm-12">
        <?php if ( is_active_sidebar( 'primary' ) ) : ?>
            <?php dynamic_sidebar( 'primary' ); ?>
        <?php else : ?>
        <?php endif; ?>
    </div>

    <div class="col-lg-8 col-sm-12">

      <h1> <?php echo single_cat_title(); ?> </h1>
      <?php get_template_part('includes/section','archive'); ?>

   <?php previous_posts_link();  ?>
   <?php next_posts_link();  ?>



   </div>
</section>
</div>
</section>
<?php get_footer(); ?>
