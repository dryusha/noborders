<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="profile" href="https://gmpg.org/xfn/11" />
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<?php
    global $wp_query;
    $category = get_the_category($wp_query->get_queried_object_id());
?>

    <div class="wrapper-content <?php echo $category[0]->name?>">

        <header>
            <div class="logo"></div>

            <?php
                if ( has_nav_menu( 'expanded' ) ) {
            ?>
                <div class="menu toggle-wrapper nav-toggle-wrapper has-expanded-menu">
                    <button class="js_menu_btn"> Meet your digital team</button>

                    <div class="js_menu_toggle nav-toggle" style="display: none;">
                        <span class="toggle-inner">

                            <span class="js_menu_btn toggle-header">X</span>
                            <span class="toggle-text"><?php _e( 'Menu', 'noborders' ); ?></span>
                            <span class="toggle-icon">
                                <?php
                                    wp_nav_menu(
                                        array(
                                            'container'  => '',
                                            'items_wrap' => '%3$s',
                                            'theme_location' => 'expanded',
                                        )
                                    );

                                    echo do_shortcode('[wpforms id="113" title="false"]');
                                ?>

                            </span>
                        </span>
                    </div><!-- .nav-toggle -->

                </div><!-- .nav-toggle-wrapper -->
            <?php
                }
            ?>

            <div class="get-in-touch">
                <span>Get in touch</span>
            </div>

        </header>
        <div class="background-x">
            <div class="vector-x"></div>
        </div>
        <div class="container">
