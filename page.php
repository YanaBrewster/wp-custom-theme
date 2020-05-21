<?php get_header(); ?>


<div class="container mt-5">

  <section class="row">

    <div class="col-lg-9">

      <h1 class="myHeadings mb-5"> <?php the_title(); ?> </h1>

      <?php if(has_post_thumbnail()): ?>

          <div>
            <img src="<?php the_post_thumbnail_url('blog-large'); ?>" alt="<?php the_title(); ?>" class="mb-3 img-fluid img-thumbnail">
          </div>
    <?php endif; ?>

      <?php get_template_part('includes/section','content'); ?>
    </div>
</div>

<?php get_footer(); ?>
