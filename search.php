<?php get_header(); ?>

<section class="page-wrap">
<div class="container">

  <section class="row">

    <div id="sidebar-secondary" class="sidebar">
        <?php if ( is_active_sidebar( 'secondary' ) ) : ?>
            <?php dynamic_sidebar( 'secondary' ); ?>
        <?php else : ?>
            <!-- Time to add some widgets! -->
        <?php endif; ?>
    </div>
    
   <h3> Search Results </h3><br>
    <div class="col-lg-8 mt-5">

      <h1> <?php echo single_cat_title(); ?> </h1>
      <?php get_template_part('includes/section','archive'); ?>

   <?php previous_posts_link();  ?>
   <?php next_posts_link();  ?>


   </div>
</section>
</div>
</section>
<?php get_footer(); ?>
