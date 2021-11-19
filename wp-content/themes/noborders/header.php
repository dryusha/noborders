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

    if(is_404()) {
        $background = "dark";
    }
?>

    <div class="wrapper-content <?php echo (is_front_page()) ? "main-page" : ""; ?><?php if($background) {echo $background;}?>">

        <?php if(!is_404()) { ?>
            <header>
                <a href="<?php echo home_url(); ?>" class="logo"></a>

                <?php
                    if ( has_nav_menu( 'expanded' ) ) {
                ?>
                    <div class="menu toggle-wrapper has-expanded-menu">
                        <button class="js_menu_btn desktop" data-item="menu">Your Digital Team</button>
                        <button class="js_menu_btn mobile" data-item="menu">
                            <span></span>
                            <span></span>
                        </button>

                        <div class="js_menu_toggle nav-toggle fade out" data-item="menu">
                            <div class="nav-toggle-wrapper">
                                <span class="toggle-inner">
                                    <div class="toggle-header">
                                        <div class="title">
                                            <span>Your Digital Team</span>
                                        </div>
                                        <div class="js_menu_btn close desktop" data-item="menu">Close</div>
                                        <div class="js_menu_btn close mobile" data-item="menu"></div>
                                    </div>

                                    <div class="toggle-icon">
                                        <?php
                                        wp_nav_menu(
                                            array(
                                                'container'  => '',
                                                'items_wrap' => '%3$s',
                                                'theme_location' => 'expanded',
                                            )
                                        );?>
                                        <li>
                                            <a href="javascript:void()" class="js_menu_btn" data-item="quote">
                                                Get In Touch
                                            </a>
                                        </li>

                                    </div>
                                </span>
                            </div><!-- .nav-toggle-wrapper -->
                        </div><!-- #nav-toggle -->
                    </div><!-- .nav-toggle-wrapper -->
                <?php
                    }
                ?>

                <div class="get-in-touch">
                    <span class="js_menu_btn" data-item="quote">Get in touch</span>

                    <div class="js_menu_toggle nav-toggle fade out" data-item="quote">
                        <div class="nav-toggle-wrapper">
                                <span class="toggle-inner">
                                    <div class="toggle-header">
                                        <div class="js_menu_btn close desktop" data-item="quote">Close</div>
                                        <div class="js_menu_btn close mobile" data-item="quote"></div>
                                    </div>

                                    <div class="toggle-icon">
                                        <span class="title">Get In Touch</span>
                                        <?php echo do_shortcode('[wpforms id="113" title="false"]'); ?>
                                    </div>
                                </span>
                        </div>
                    </div>
                </div>

            </header>

            <div class="background-x">
                <div class="vector-x"></div>
            </div>
            <div class="background-x-left">
                <div class="vector-x"></div>
            </div>
        <?php } ?>
        <div class="container">
