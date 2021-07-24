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
    $id = get_queried_object_id() ? get_queried_object_id() : get_the_ID();
    $background = get_post_meta($id, 'background', true);
?>

    <div class="wrapper-content <?php echo (is_front_page()) ? "main-page" : ""; ?><?php if($background) {echo $background;}?>">

        <header>
            <div class="logo"></div>

            <?php
                if ( has_nav_menu( 'expanded' ) ) {
            ?>
                <div class="menu toggle-wrapper has-expanded-menu">
                    <button class="js_menu_btn">Meet your digital team</button>

                    <div id="nav-toggle" class="js_menu_toggle fade out">
                        <div class="nav-toggle-wrapper">
                            <span class="toggle-inner">
                                <div class="toggle-header">
                                    <div class="title">
                                        <span>Meet your digital team</span>
                                    </div>
                                    <div class="js_menu_btn close">Close</div>
                                </div>

                                <div class="toggle-icon">
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

                                </div>
                            </span>
                        </div><!-- .nav-toggle-wrapper -->

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
        <div class="background-x-left">
            <div class="vector-x"></div>
        </div>
        <div class="container">
