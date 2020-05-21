<div class="container mt-5">
  <?php
  if (have_posts()) :
    while (have_posts()):
      the_post();
      ?>


      <div class="row">
        <div class="col-lg-8 col-sm-12">

          <a href="<?php the_permalink(); ?>">
            <!-- featured image -->
            <?php if(has_post_thumbnail()): ?>
              <!-- This has a featured image -->
              <img src="<?php the_post_thumbnail_url('blog-large'); ?>" alt="<?php the_title(); ?>" class="mb-3 img-fluid img-thumbnail">
            <?php endif; ?>
          </a>

          <p>
            <?php  echo get_the_date('h:i:s d/m/Y'); //check php date format ?>
          </p>

          <p class="mt-0">
            <?php
            the_content();
            ?>
          </p>


          <?php
          $tags = get_the_tags();
          if($tags):
            foreach($tags as $tag):?>
            <a class="ml-3" href="<?php echo get_tag_link($tag -> term_id);  ?>">
              <?php echo $tag -> name; ?>
            </a>

          <?php endforeach;
        else:
        endif; ?>

        <hr/>

        <?php
        $categories = get_the_category();
        foreach($categories as $cat):?>

        <a href="<?php echo get_category_link($cat->term_id); ?>">
          <?php echo $cat->name; //go and add single_cat_title() in archive ?>
        </a>
      <?php endforeach; ?>


      <?php comments_template();?>
      <!-- /to get multiple parts of a page add this in single.php -->

      <?php

    endwhile;
  else:
  endif;

  ?>
</div>
</div>
</div>
