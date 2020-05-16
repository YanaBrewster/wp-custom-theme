<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <title><?php the_title(); ?></title>
  <?php wp_head(); ?>
</head>
<body>

  <header class="bg-yellow px-2 py-2 mb-5">

    <!-- optional header section -->
    <?php if ( get_header_image() ) : ?>

      <div id="site-header">
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
          <img alt="" src="<?php header_image(); ?>" width="<?php echo absint( get_custom_header()->width ); ?>" height="<?php echo absint( get_custom_header()->height ); ?>">
        </a>
      </div>

    <?php endif; ?>

    <!-- main top naivation -->
    <nav class="top-nav navbar-expand-lg px-2 py-2">

      <div class="row">

        <!-- logo -->
        <div class="col-3 col-lg-3 col-sm-3">
          <a class="navbar-brand" href="#">
            <?php  the_custom_logo();  ?>
          </a>
        </div>

        <!-- menu -->
        <div class="col-9 col-lg-6 col-sm-9">

          <button class="navbar-toggler navbar-dark float-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <div class="nav">
              <div class="nav-list mt-4">

                <?php
                wp_nav_menu(
                  array(
                    'theme_location' => 'top-menu',
                    'menu_class' => 'top-bar'
                  )
                );
                ?>

              </div>
            </div>
          </div>

        </div>

        <!-- search -->
        <div class="col-lg-3 d-none d-sm-none d-md-block">
          <?php get_search_form(); ?>
        </div>

      </div>   <!-- end of row -->

      <div class="row">
        <!-- title tagline etc -->
        <div class="col-12 col-lg-12 col-sm-12">
          <h5 class="text-dark mt-3">
            <?php echo get_option('blogname'); // For Site Name?> |
            <?php echo get_option('blogdescription'); // For Tag line or description?>
          </h5>
        </div>

      </div>

    </nav>

  </header>
