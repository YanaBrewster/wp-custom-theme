<?php get_header(); ?>

<section class="page-wrap">
<div class="container">

  <div id="sidebar-primary" class="sidebar col-lg-3 col-sm-12">
      <?php if ( is_active_sidebar( 'primary' ) ) : ?>
          <?php dynamic_sidebar( 'primary' ); ?>
      <?php else : ?>
      <?php endif; ?>
  </div>

    <?php if(has_post_thumbnail()): ?>
        <!-- This has a featured image -->

  <?php endif; ?>

     <h1> <?php the_title(); ?>  </h1>
      <?php get_template_part('includes/section','cats'); ?>
         <?php wp_link_pages(); ?>

         <!-- wordpress custom field -->

         <ul>
           <li> Category: <?php echo get_post_meta($post->ID, 'category', true); ?> </li>
           <?php if (get_post_meta($post->ID, 'name', true)): ?>
              <li> Name: <?php echo get_post_meta($post->ID, 'name', true); ?> </li>
           <?php endif; ?>
         </ul>



</div>
</section>
<?php get_footer(); ?>
