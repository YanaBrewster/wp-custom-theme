<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title><?php the_title(); ?></title>
    <?php wp_head(); ?>
  </head>
  <body>
    <header class="bg-yellow px-2 py-2 mb-5">
      <nav class="row navbar top-nav navbar-expand-lg px-2 py-2">
        <div class="col-4">
          <a class="navbar-brand" href="#">
          <?php  the_custom_logo();  ?>
          </a>
        </div>
        <div class="col-8">
          <button class="navbar-toggler navbar-dark float-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
         <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <div class="nav">
              <div class="nav-list">

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
    </nav>

    </header>
