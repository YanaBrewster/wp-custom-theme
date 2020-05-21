<?php get_header(); ?>

<div class="container mt-5">

  <section class="row">
    <div id="sidebar-secondary" class="sidebar col-lg-3 col-sm-12">
      <?php if ( is_active_sidebar( 'secondary' ) ) : ?>
        <?php dynamic_sidebar( 'secondary' ); ?>
      <?php else : ?>
      <?php endif; ?>
    </div>
    <div class="col-lg-9 col-sm-12">
      <?php if(has_post_thumbnail()): ?>

        <div>
          <img src="<?php the_post_thumbnail_url('blog-large'); ?>" alt="<?php the_title(); ?>" class="mb-3 img-fluid img-thumbnail">
        </div>
      <?php endif; ?>

      <h1 class="myHeadings"> <?php the_title(); ?>   </h1>
      <?php get_template_part('includes/section','blogcontent'); ?>
      <?php wp_link_pages(); ?>

    </div>

  </section>
</div>
<?php get_footer(); ?>
