<?php get_header(); ?>

<main class="page-main container">
  <?php
  if ( ! function_exists( 'elementor_theme_do_location' )
    || ! elementor_theme_do_location( 'single' ) ) :
    while ( have_posts() ) : the_post();
      the_title( '<h1>', '</h1>' );
      the_content();
    endwhile;
  endif;
  ?>
</main>

<?php get_footer(); ?>
