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

    <header>
        <?php
            if(has_custom_logo()) {
        ?>
            <div><?php

                $logo = get_theme_mod( 'custom_logo' );
                $image = wp_get_attachment_image_src( $logo , 'full' );
                $image_url = $image[0];
                $image_width = $image[1];
                $image_height = $image[2];
                ?>

                <img src="<?php echo $image_url;?>" alt="">
            </div>
        <?php
            }
        ?>


        <?php
		    if ( has_nav_menu( 'expanded' ) ) {
		?>
            <div class="toggle-wrapper nav-toggle-wrapper has-expanded-menu">

                <button class="toggle nav-toggle desktop-nav-toggle" data-toggle-target=".menu-modal" data-toggle-body-class="showing-menu-modal" aria-expanded="false" data-set-focus=".close-nav-toggle">
                    <span class="toggle-inner">
                        <span class="toggle-text"><?php _e( 'Menu', 'noborders' ); ?></span>
                        <span class="toggle-icon">
                            <?php
                                /*twentytwenty_the_theme_svg( 'ellipsis' );*/
                                wp_nav_menu(
                                    array(
                                        'container'  => '',
                                        'items_wrap' => '%3$s',
                                        'theme_location' => 'expanded',
                                    )
                                );
                            ?>

                        </span>
                    </span>
                </button><!-- .nav-toggle -->

            </div><!-- .nav-toggle-wrapper -->
        <?php
            }
        ?>
    </header>
