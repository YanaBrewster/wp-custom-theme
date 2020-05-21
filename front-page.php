<?php get_header(); ?>

<?php if(has_header_image()): ?>
    <div class="px-0 py-0 mt-0 mb-5">
        <div class="headerImage" style="background-image:url(<?php echo get_header_image(); ?>);">
        </div>
    </div>
<?php endif; ?>


<div class="container">
      <h1 class="myHeadings mb-5"> <?php the_title(); ?></h1>
      <?php get_template_part('includes/section','content'); ?>
  <div class="row">
    <div class="col-sm-12 col-lg-12">

    </div>
  </div>
</div>

<?php get_footer(); ?>
