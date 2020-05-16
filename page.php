<?php get_header(); ?>

<section class="page-wrap">
<div class="container">

  <section class="row">

    <div class="col-lg-9">

      <h1> <?php the_title(); ?>   </h1>

      <?php if(has_post_thumbnail()): ?>

          <div>
            <img src="<?php the_post_thumbnail_url('blog-large'); ?>" alt="<?php the_title(); ?>" class="mb-3 img-fluid img-thumbnail">
          </div>
    <?php endif; ?>

      <?php get_template_part('includes/section','content'); ?>
    </div>
</div>
</section>
<?php get_footer(); ?>
