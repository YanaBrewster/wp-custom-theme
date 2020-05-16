<!-- header -->
<div class="my-5">
<?php get_header(); ?>
</div>
<div id="primary" class="content-area row  container m-auto my-5">

       <div id="content" class="site-content col-lg-9" role="main">

           <header class="page-header bg-white">
               <h3 class="page-title  text-dark">Whoops, this page does not exist!</h3>
           </header>

           <div class="page-wrapper ">
               <div class="page-content">

                   <h4 class="text-info my-5"> Try searching instead?</h4>
                   <?php get_search_form(); ?>
               </div>
           </div>
        </div>

         <!-- Sidebar -->
         <div class="col-lg-3 widget">

           <?php if(is_active_sidebar('blog-sidebar')) :?>
             <?php dynamic_sidebar('blog-sidebar'); ?>

           <?php endif; ?>
         </div>
       </div>

<!-- footer -->
<div class="mt-5">
<?php get_footer(); ?>
</div>
