<?php get_header(); ?>

<main class="archive-main container">
  <?php
  if ( ! function_exists( 'elementor_theme_do_location' )
    || ! elementor_theme_do_location( 'archive' ) ) :
    if ( have_posts() ) {
      while ( have_posts() ) {
        the_post();
        get_template_part( 'template-parts/content', get_post_format() );
      }
      the_posts_pagination();
    } else {
      echo '<p>No posts found.</p>';
    }
  endif;
  ?>
</main>

<?php get_footer(); ?>
