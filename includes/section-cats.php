<div class="bg-light">
<?php
if (have_posts()) :
  while (have_posts()):
    the_post();
    ?>



<a href="<?php the_permalink(); ?>" class="">
<!-- featured image -->

<?php if(has_post_thumbnail()): ?>
    <!-- This has a featured image -->
    <div>
      <img src="<?php the_post_thumbnail_url('blog-large'); ?>" alt="<?php the_title(); ?>" class="mb-3 img-fluid img-thumbnail">
    </div>
<?php endif; ?>
</a>

<p class="">
<?php  echo get_the_date('h:i:s d/m/Y'); //check php date format ?>
</p>

<p class="mt-0">
<?php

    the_content();
    // the_author();
?>

</p>
<?php
  // $fname = get_the_author_meta('first_name');
  // $lname = get_the_author_meta('last_name');
  ?>
  <!-- <p class="text-dark"> <?php //echo 'Posted by ' . $fname . ' ' . $lname; ?> </p> -->

  <?php
    $tags = get_the_tags();
    if($tags):
    foreach($tags as $tag):?>
      <a class="" href="<?php echo get_tag_link($tag -> term_id);  ?>">
        <?php echo $tag -> name; ?>
      </a>

<?php endforeach;
else:
endif; ?>

<?php
  $categories = get_the_category();
  foreach($categories as $cat):?>

  <a class="" href="<?php echo get_category_link($cat->term_id); ?>">
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
