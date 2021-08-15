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
    add_shortcode('mainPageCases', 'mainPageCases' );
}

/**
 * Register navigation menus uses wp_nav_menu in five places.
 */
function noborders_theme_menus() {

    $locations = array(
        'primary'  => __( 'Desktop Horizontal Menu', 'noborders' ),
        'expanded' => __( 'Desktop Expanded Menu', 'noborders' ),
        'mobile'   => __( 'Mobile Menu', 'noborders' ),
        'footer'   => __( 'Footer Menu', 'noborders' ),
        'social'   => __( 'Social Menu', 'noborders' ),
    );

    register_nav_menus( $locations );
}

add_action( 'init', 'noborders_theme_menus' );

function careerPosts() {
    $args = array( 'posts_per_page' => 10, 'category_name' => 'careers');
    $careers_posts = new WP_Query($args);
    $content = "<div class='career-posts'>";
    $content .= "<h3>Open positions</h3>";

    $content .= "<div class='items'>";

    while($careers_posts->have_posts()) :
        $careers_posts->the_post();

        $content .= "<div class='item'>".get_the_title()."
            <a href='".get_permalink()."'>Read More</a>
        </div>";

    endwhile;

    $content .= "</div>";
    $content .= "</div>";

    return $content;
}

function portfolioPosts($atts) {
    $content = '';

    if ($atts["page"] == "current") {
        global $post;
        $post_id = $post->ID; // current post ID
        $cat = get_the_category();
        $current_cat_id = $cat[0]->cat_ID; // current category ID

        $args = array(
            'category' => $current_cat_id,
            'orderby'  => 'post_date',
            'order'    => 'ASC'
        );
        $posts = get_posts( $args );
// get IDs of posts retrieved from get_posts
        $ids = array();
        foreach ( $posts as $thepost ) {
            $ids[] = $thepost->ID;
        }
        $thisindex = array_search( $post_id, $ids );

        $nextIds = array();
        $flag = 0;
        for ($i = 1; $i < 3; $i++) {
            $nextId = isset($ids[ $thisindex + $i ]) ? $ids[ $thisindex + $i ] : false;

            if ($nextId == false) {
                $nextId = isset($ids[ $flag ]) ? $ids[ $flag ] : false;
                $flag++;
            }

            array_push($nextIds, $nextId);
        }

        $content .= "<div class='noborders-content cases-block'>";
        $content .= "<h3>Other projects</h3>";
        $content .= "<a class=\"discover show-all\" href=\"/cases\"><span>Show all cases</span> <i class=\"icon-arrow\"></i></a>";

        $content .= "<div class='items'>";

        for ($i = 0; $i < count($nextIds); $i++) {
            $post_id = $nextIds[$i];
            $postType = get_post_meta($post_id, 'type', true);

            $content .= "<div class='item'>
                <a href='".get_permalink($post_id)."'>
                    <img src='".wp_get_attachment_image_src(get_post_thumbnail_id($post_id), 'full')[0]."' />
                </a>
                <div class='title'>
                    ".get_the_title($post_id)."
                    <span>".$postType."</span>
                </div>
            </div>";
        }



        $content .= "</div>";
        $content .= "</div>";



    } else if ($atts["page"] === "home") {
        $atts_ids = json_decode(str_replace("'", '"', $atts['ids']));

        foreach ($atts_ids as $key=>$value) {
            $atts_ids->{$key} = (object) [
                "link" => get_permalink( $value ),
                "img" => wp_get_attachment_image_src(get_post_thumbnail_id($value), 'full')[0]
            ];
        }

        $content .= "<div class='items mobile'>";

        foreach ($atts_ids as $key=>$value) {
            $content .= "<div class='item'>
                <a href=\"".$value->link."\" style=\"
                    background: url( ".$value->img.");
                    background-position: center;
                    background-size: cover;
                \"></a>
            </div>";
        }

        $content .= "<div class='item'><a class='discover' href='cases'><span>Discover more</span> <i class='icon-arrow'></i></a></div>";
        $content .= "</div>";
        $content .= "<div class='items desktop'>";

        for ($i = 0; $i < 7; $i++) {

            if ($i == 0 || $i == 2 || $i == 5) {
                $content .= "<div class='block'>";
            }

            if (!empty($atts_ids->{$i})) {
                $content .= "<div class='item'><a href=\"".$atts_ids->{$i}->link."\" style=\"
                        background: url( ".$atts_ids->{$i}->img.");
                        background-position: center;
                        background-size: cover;
                    \"></a></div>";
            } else if ($i == 4) {
                $content .= "<div class='item'><a class='discover' href='cases'><span>Discover more</span> <i class='icon-arrow'></i></a></div>";
            } else {
                $content .= "<div class='item'></div>";
            }


            if ($i == 1 || $i == 4 || $i == 6) {
                $content .= "</div>";
            }

        }

        $content .= "</div>";
    } else {
        $args = array( 'posts_per_page' => $atts["limit"], 'category_name' => 'cases');
        $careers_posts = new WP_Query($args);

        $content .= "<div class='noborders-content cases'>";
        $content .= "<div class='items'>";

        while($careers_posts->have_posts()) :
            $careers_posts->the_post();
            $postType = get_post_meta(get_the_ID(), 'type', true);

            $content .= "<div class='item'>
                <a href='".get_permalink()."'>
                    <img src='".wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'full')[0]."' />
                </a>
                <div class='title'>
                    ".get_the_title()."
                    <span>".$postType."</span>
                </div>
            </div>";


        endwhile;

        $content .= "</div>";
        $content .= "</div>";
    }

    return $content;
}

add_action( 'after_setup_theme', 'noborders_theme_setup' );

/**
 * Enqueue scripts and styles.
 */
function noborders_scripts() {
    wp_enqueue_style( 'noborders-style', get_template_directory_uri() . '/style.css', array(), wp_get_theme()->get( 'Version' ) );

    wp_enqueue_script('noborders-functions', get_stylesheet_directory_uri().'/js/functions.js');
}
add_action( 'wp_enqueue_scripts', 'noborders_scripts' );