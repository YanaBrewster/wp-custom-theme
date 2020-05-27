<?php get_header(); ?>

<div class="container mt-4">
<div class="row">
  <div id="sidebar-primary" class="sidebar col-lg-3 col-sm-12">
      <?php if ( is_active_sidebar( 'primary' ) ) : ?>
          <?php dynamic_sidebar( 'primary' ); ?>
      <?php else : ?>
      <?php endif; ?>
  </div>

  <div class="col-lg-9 col-sm-12">
    <?php if(has_post_thumbnail()): ?>
        <!-- This has a featured image -->

  <?php endif; ?>

     <h1 class="myHeadings"> <?php the_title(); ?>  </h1>
      <?php get_template_part('includes/section','cats'); ?>
         <?php wp_link_pages(); ?>
         <?php  echo get_the_date('F j, Y g:i a'); //check php date format ?>
         <!-- wordpress custom field -->

         <ul>
           <li> Category: <?php echo get_post_meta($post->ID, 'category', true); ?> </li>
           <?php if (get_post_meta($post->ID, 'name', true)): ?>
              <li> Name: <?php echo get_post_meta($post->ID, 'name', true); ?> </li>
           <?php endif; ?>
         </ul>
  </div>

</div>
</div>

<?php get_footer(); ?>
