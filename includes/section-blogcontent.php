<div class="bg-info">
<?php
if (have_posts()) :
  while (have_posts()):
    the_post();
?>

<p class="text-light">
<?php  echo get_the_date('l, h:i:s d/m/Y'); //check php date format ?>
</p>


<?php
    the_content();
    // the_author();
?>
<?php
  $fname = get_the_author_meta('first_name');
  $lname = get_the_author_meta('last_name');
  ?>
  <p class="text-light"> <?php echo 'Posted by ' . $fname . ' ' . $lname; ?> </p>
  <?php
    $tags = get_the_tags();
    foreach($tags as $tag):?>
      <a class="text-light" href="<?php echo get_tag_link($tag -> term_id);  ?>">
        <?php echo $tag -> name; ?>
      </a>

<?php endforeach; ?>

<?php
  $categories = get_the_category();
  foreach($categories as $cat):?>

  <a class="text-light" href="<?php echo get_category_link($cat->term_id); ?>">
    <?php echo $cat->name; //go and add single_cat_title() in archive ?>
  </a>
<?php endforeach; ?>

<?php// comments_template();?>
<!-- /to get multiple parts of a page add this in single.php -->

<?php

  endwhile;
 else:
endif;

?>
</div>
