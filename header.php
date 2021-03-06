<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
  <title><?php wp_title(); ?></title>
  <?php wp_head(); ?>
</head>
<body>

  <header class="myTheme bg-yellow px-2 py-2">

    <!-- main top navigation -->
    <nav class="top-nav navbar-expand-lg px-2 py-2">

      <div class="row">

        <!-- logo -->
        <div class="col-3 col-lg-3 col-sm-3">
          <a class="navbar-brand" href="#">
            <?php  the_custom_logo();  ?>
            <?php ?>
            <h1 class="hide text-light siteTitle myTheme d-inline ml-3 h3"> <?php echo get_theme_mod('Formative4_siteTitleText'); ?></h1>
          </a>
        </div>

        <!-- menu -->
        <div class="col-9 col-lg-6 col-sm-9">

          <nav class="navbar navbar-expand-md center mt-3">

              <button class="navbar-toggler navbar-dark mt-5" type="button" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>

              <?php
              wp_nav_menu( array(
                'theme_location'    => 'top-menu',
                'depth'             => 2,
                'container'         => 'div',
                'container_class'   => 'collapse navbar-collapse',
                'container_id'      => 'bs-example-navbar-collapse-1',
                'menu_class'        => 'nav navbar-nav',
                'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
                'walker'            => new WP_Bootstrap_Navwalker(),
              ) );
              ?>

          </nav>
          <!-- </div> -->

        </div>

        <!-- search -->
        <div class="col-lg-3 d-none d-sm-none d-md-block mt-4">
          <?php get_search_form(); ?>
        </div>

      </div>   <!-- end of row -->


    </nav>

  </header>
