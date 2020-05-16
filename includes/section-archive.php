<div>
<?php
if (have_posts()) :
  while (have_posts()):
    the_post();
  ?>
    <div class="card mb-3">
      <div class="card-body">

        <?php if(has_post_thumbnail()): ?>
            <!-- This has a featured image -->
            <div>
              <img src="<?php the_post_thumbnail_url('blog-large'); ?>" alt="<?php the_title(); ?>" class="center mb-3 img-fluid img-thumbnail">
            </div>
      <?php endif; ?>

    <h1> <?php the_title(); ?>   </h1>

    <?php
    the_excerpt();//cut of some portion of text
    ?>
    <div class="text-center">
      <a href="<?php the_permalink(); ?>" class="text-light btn btn-dark text-center btn-font"> Read More </a>
    </div>

  </div>
</div>
  <?php endwhile;
 else:
endif;

?>
</div>
