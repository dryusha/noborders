<?php
function noborders_theme_setup() {

    // Custom logo.
    $logo_width  = 120;
    $logo_height = 90;

    // If the retina setting is active, double the recommended width and height.
    if ( get_theme_mod( 'retina_logo', false ) ) {
        $logo_width  = floor( $logo_width * 2 );
        $logo_height = floor( $logo_height * 2 );
    }

    add_theme_support(
        'custom-logo',
        array(
            'height'      => $logo_height,
            'width'       => $logo_width,
            'flex-height' => true,
            'flex-width'  => true,
        )
    );

    /*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
    add_theme_support( 'title-tag' );

    /*
     * Enable support for Post Thumbnails on posts and pages.
     *
     * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
     */
    add_theme_support( 'post-thumbnails' );

    add_shortcode('portfolioPosts', 'portfolioPosts' );
    add_shortcode('careerPosts', 'careerPosts' );
}

/**
 * Register navigation menus uses wp_nav_menu in five places.
 */
function noborders_theme_menus() {

    $locations = array(
        'primary'  => __( 'Desktop Horizontal Menu', 'twentytwenty' ),
        'expanded' => __( 'Desktop Expanded Menu', 'twentytwenty' ),
        'mobile'   => __( 'Mobile Menu', 'twentytwenty' ),
        'footer'   => __( 'Footer Menu', 'twentytwenty' ),
        'social'   => __( 'Social Menu', 'twentytwenty' ),
    );

    register_nav_menus( $locations );
}

add_action( 'init', 'noborders_theme_menus' );

function careerPosts() {
    $args = array( 'posts_per_page' => 10, 'category_name' => 'careers');
    $careers_posts = new WP_Query($args);
    $content = "<h3>Open positions</h3>";

    while($careers_posts->have_posts()) :
        $careers_posts->the_post();

        $content .= "<div>".get_the_title()."</div>";
        $content .= "<div><a href='".get_permalink()."'>Read More</a></div>";

    endwhile;

    return $content;
}

function portfolioPosts($atts) {
    $args = array( 'posts_per_page' => $atts["limit"], 'category_name' => 'portfolio');
    $careers_posts = new WP_Query($args);
    $content = '';

    while($careers_posts->have_posts()) :
        $careers_posts->the_post();

        $content .= "<div><a href='".get_permalink()."'>".get_the_post_thumbnail()."</a></div>";
        $content .= "<div>".get_the_title()."</div>";

    endwhile;

    return $content;
}

add_action( 'after_setup_theme', 'noborders_theme_setup' );