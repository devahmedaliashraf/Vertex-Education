<?php
if ( ! function_exists( 'elementor_theme_do_location' )
  || ! elementor_theme_do_location( 'footer' ) ) :
?>
  <footer class="site-footer">
    <div class="container">
      <p>&copy; <?php echo date( 'Y' ); ?> Vertex Education. All rights reserved.</p>
    </div>
  </footer>
<?php endif; ?>

<?php wp_footer(); ?>
</body>
</html>
