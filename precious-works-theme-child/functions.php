<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

// 🔧 Define theme version
$theme = wp_get_theme();
define( 'PW_THEME_CHILD_VERSION', $theme->get( 'Version' ) );

require_once get_stylesheet_directory() . '/includes/custom-post-types/menu-items.php';

add_image_size('square', 400, 400, true); 
add_image_size('landscape', 800, 600, true); 


function pw_enqueue_scripts() {
    wp_enqueue_style( 'parent-style', get_stylesheet_directory_uri() . '/assets/dist/css/style.min.css', [], PW_THEME_CHILD_VERSION );

    // Then enqueue child style, dependent on parent-style
    // wp_enqueue_style( 'pw-style', get_stylesheet_directory_uri() . '/assets/dist/css/style.min.css', ['parent-style'], PW_THEME_CHILD_VERSION );
    
    // JS if needed
    wp_enqueue_script( 'pw-main', get_stylesheet_directory_uri()  . '/assets/js/main.js', [], PW_THEME_CHILD_VERSION, true );

      // Font Awesome 6 CDN (replace with your preferred version if needed)
    wp_enqueue_style(
        'font-awesome',
        'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.0/css/all.min.css',
        [],
        '6.5.0'
    );
}

function pw_enqueue_glightbox_assets() {
    wp_enqueue_style('glightbox', 'https://cdn.jsdelivr.net/npm/glightbox/dist/css/glightbox.min.css');
    wp_enqueue_script('glightbox', 'https://cdn.jsdelivr.net/npm/glightbox/dist/js/glightbox.min.js', array(), null, true);

    // Optionally initialize after DOM loads
    wp_add_inline_script('glightbox', 'document.addEventListener("DOMContentLoaded", function() { GLightbox({ selector: ".glightbox" }); });');
}

add_action('wp_enqueue_scripts', 'pw_enqueue_glightbox_assets');
add_action( 'wp_enqueue_scripts', 'pw_enqueue_scripts', 20 );
add_action( 'enqueue_block_editor_assets', 'pw_enqueue_scripts' );


function moshava_enqueue_fonts() {
    wp_enqueue_style(
        'mytheme-google-fonts',
        'https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@300;400;600;700&family=Playfair+Display:wght@400;500;600;700&display=swap',
        array(),
        null
    );
}
add_action('wp_enqueue_scripts', 'moshava_enqueue_fonts');

function pw_disable_menu_gutenberg( $use_block_editor, $post ) {

    // Example: Disable Gutenberg for a specific page template
    if ( $post && get_post_type( $post->ID ) === 'menu_items' ) {

        // Also remove the classic editor support to fully hide the editor
        remove_post_type_support( 'page', 'editor' );

        // Return false to disable Gutenberg
        return false;
    }

    // Otherwise, use the default editor
    return $use_block_editor;
}

// Apply the filter for Gutenberg editor usage
add_filter( 'use_block_editor_for_post', 'pw_disable_menu_gutenberg', 10, 2 );

function theme_enqueue_glide_styles() {
      // Glide CSS
    wp_enqueue_style(
        'glide-core',
        'https://cdnjs.cloudflare.com/ajax/libs/Glide.js/3.6.0/css/glide.core.min.css',
        array(),
        '3.6.0'
    );

    wp_enqueue_style(
        'glide-theme',
        'https://cdnjs.cloudflare.com/ajax/libs/Glide.js/3.6.0/css/glide.theme.min.css',
        array('glide-core'),
        '3.6.0'
    );

    // Glide JS
    wp_enqueue_script(
        'glide-js',
        'https://cdnjs.cloudflare.com/ajax/libs/Glide.js/3.6.0/glide.min.js',
        array(),
        '3.6.0',
        true
    );
}

add_action('wp_enqueue_scripts', 'theme_enqueue_glide_styles');