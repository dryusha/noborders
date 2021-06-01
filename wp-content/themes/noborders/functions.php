<?php
function noborders_theme_support() {
    /*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
    add_theme_support( 'title-tag' );
}

function careerPosts() {
    $args = array( 'posts_per_page' => 10, 'category_name' => 'careers');
    $careers_posts = new WP_Query($args);
    $content = '<h3>Open positions</h3>';

    while($careers_posts->have_posts()) :
        $careers_posts->the_post();

        $content .= "<div>".get_the_title()."</div>";
        $content .= "<div><a href='".get_permalink()."'>Read More</a></div>";

    endwhile;

    return $content;
}

add_shortcode('careerPosts', 'careerPosts' );
add_action( 'after_setup_theme', 'noborders_theme_support' );