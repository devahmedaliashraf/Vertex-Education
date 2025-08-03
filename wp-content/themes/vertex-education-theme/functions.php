<?php
/**
 * Vertex Education Theme setup.
 */
function vet_setup_theme() {
    // Core WP features
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
    register_nav_menus( [
      'primary' => __( 'Primary Menu', 'vertex-education-theme' ),
    ] );

    // Register Elementor Theme Builder locations
    add_action( 'elementor/theme/register_locations', function( $manager ) {
        // All core Elementor locations: header, footer, single, archive, 404, etc.
        $manager->register_all_core_location();
    } );
}
add_action( 'after_setup_theme', 'vet_setup_theme' );
