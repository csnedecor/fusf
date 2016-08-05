<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package adamos
 * @since adamos 2.0
 */
?>

<!DOCTYPE html>
<!--[if IE 8]>
<html id="ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 8) ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />

<?php if(get_theme_mod('adamos_global_favicon')) : ?>
    <link rel="shortcut icon" href="<?php echo esc_url(get_theme_mod('adamos_global_favicon')); ?>" />
<?php endif; ?>

<?php if(get_theme_mod('adamos_global_apple_icon')) : ?>
    <link rel="apple-touch-icon" href="<?php echo esc_url(get_theme_mod('adamos_global_apple_icon')); ?>">
<?php endif; ?>

<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="wrap">
<div id="page" class="hfeed site">

  <?php do_action( 'before' ); ?>

    <div id="masthead-wrap">

        <?php if( get_theme_mod('adamos_show_topbar')): ?>
            <div class="topbar">
                <div class="topbar-wrap">
                    <div class="contact-info">
                        <?php get_template_part( 'inc/contact-details' ); ?>
                    </div>
                    <div class="social-media">
                        <?php get_template_part( 'inc/socmed' ); ?>
                    </div>
                </div>
            </div>
        <?php endif; ?>


        <header id="masthead" class="site-header header_container" role="banner">

            <?php if ( get_theme_mod( 'adamos_logo' ) ) : ?>

                <div class="site-logo">

                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><img src="<?php echo get_theme_mod( 'adamos_logo' ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>"></a>

                </div>

            <?php else : ?>

                <div class="site-introduction">

                    <h1 class="site-title"><a href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                    <p class="site-description"><?php bloginfo( 'description' ); ?></p>

                </div>

            <?php endif; ?>

            <nav role="navigation" class="site-navigation main-navigation">

                <h1 class="assistive-text"><?php _e( 'Menu', 'adamos' ); ?></h1>

                <div class="assistive-text skip-link">
                    <a href="#content" title="<?php esc_attr_e( 'Skip to content', 'adamos' ); ?>"><?php _e( 'Skip to content', 'adamos' ); ?></a>
                </div>

                <?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>

            </nav><!-- .site-navigation .main-navigation -->

        </header><!-- #masthead .site-header -->


  </div><!-- #masthead-wrap -->

    <?php
        $header_image = get_header_image();
        if ( !is_front_page() && ! empty( $header_image ) || is_front_page() && get_theme_mod('homepage_slider_hide') ) : ?>

            <div class="header-image">
          <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
            <img src="<?php header_image(); ?>"/>
          </a>
          </div>

    <?php
        endif;
    ?>


    <?php if(is_front_page()):?>

        <?php if(! get_theme_mod('homepage_slider_hide')): ?>

            <?php
              $slide_1_id = get_theme_mod('homepage_slider_image_1');
              if ($slide_1_id != 0){
                $slide_1_url = wp_get_attachment_url($slide_1_id);
              }
              $slide_2_id = get_theme_mod('homepage_slider_image_2');
              if ($slide_2_id != 0){
                $slide_2_url = wp_get_attachment_url($slide_2_id);
              }
              $slide_3_id = get_theme_mod('homepage_slider_image_3');
              if ($slide_3_id != 0){
                $slide_3_url = wp_get_attachment_url($slide_3_id);
              }

              $slide_1_title = get_theme_mod('slide_1_title');
              $slide_2_title = get_theme_mod('slide_2_title');
              $slide_3_title = get_theme_mod('slide_3_title');
              $slide_1_caption = get_theme_mod('slide_1_caption');
              $slide_2_caption = get_theme_mod('slide_2_caption');
              $slide_3_caption = get_theme_mod('slide_3_caption');
              $slide_1_link = get_theme_mod('slide_1_link');
              $slide_2_link = get_theme_mod('slide_2_link');
              $slide_3_link = get_theme_mod('slide_3_link');
            ?>

            <div class="flex-container">
              <div class="flexslider">
                <ul class="slides">
                  <?php if (!empty($slide_1_url)){ ?>
                    <li>
                      <?php if (!empty($slide_1_link)) { ?>
                        <a href="<?php echo $slide_1_link ?>">
                      <?php } ?>
                      <img src=<?php echo $slide_1_url ?>>
                      <?php if (!empty($slide_1_title)|| (!empty($slide_1_caption))) { ?>
                        <div class="caption_wrap">
                          <div class="flex-caption">
                            <?php if (!empty($slide_1_title)) { ?>
                              <div class="flex-caption-title">
                                <?php echo $slide_1_title?>
                              </div>
                            <?php } ?>
                            <?php if (!empty($slide_1_caption)) { ?>
                              <p>
                                <?php echo $slide_1_caption ?>
                                </p>
                            <?php } ?>
                          </div>
                        </div>
                      <?php if (!empty($slide_1_link)) { ?>
                        </a>
                      <?php } ?>
                      <?php }?>
                    </li>
                  <?php } ?>
                  <?php if (!empty($slide_2_url)){ ?>
                    <li>
                      <?php if (!empty($slide_2_link)) { ?>
                        <a href="<?php echo $slide_2_link ?>">
                      <?php } ?>
                      <img src=<?php echo $slide_2_url ?>>
                      <?php if (!empty($slide_2_title)|| (!empty($slide_2_caption))) { ?>
                        <div class="caption_wrap">
                          <div class="flex-caption">
                            <?php if (!empty($slide_2_title)) { ?>
                              <div class="flex-caption-title">
                                <?php echo $slide_2_title?>
                              </div>
                            <?php } ?>
                            <?php if (!empty($slide_2_caption)) { ?>
                              <p>
                                <?php echo $slide_2_caption ?>
                                </p>
                            <?php } ?>
                          </div>
                        </div>
                        <?php if (!empty($slide_2_link)) { ?>
                          </a>
                        <?php } ?>
                      <?php } ?>
                    </li>
                  <?php } ?>
                  <?php if (!empty($slide_3_url)){ ?>
                    <li>
                      <?php if (!empty($slide_3_link)) { ?>
                        <a href="<?php echo $slide_3_link ?>">
                      <?php } ?>
                      <img src=<?php echo $slide_3_url ?>>
                      <?php if (!empty($slide_3_title) || (!empty($slide_3_caption))) { ?>
                        <div class="caption_wrap">
                          <div class="flex-caption">
                            <?php if (!empty($slide_3_title)) { ?>
                              <div class="flex-caption-title">
                                <?php echo $slide_3_title?>
                              </div>
                            <?php } ?>
                            <?php if (!empty($slide_3_caption)) { ?>
                              <p>
                                <?php echo $slide_3_caption ?>
                              </p>
                            <?php } ?>
                          </div>
                        </div>
                        <?php if (!empty($slide_3_link)) { ?>
                          </a>
                        <?php } ?>
                      <?php } ?>
                    </li>
                  <?php } ?>
                </ul>
              </div>
            </div>

        <?php endif; ?><!-- End Flexslider -->
      <?php endif; ?><!-- End is_front_page -->

      <?php
        $icon_1 = get_theme_mod('icon_1');
        $icon_2 = get_theme_mod('icon_2');
        $icon_3 = get_theme_mod('icon_3');
        $icon_1_title = get_theme_mod('icon_1_title');
        $icon_2_title = get_theme_mod('icon_2_title');
        $icon_3_title = get_theme_mod('icon_3_title');
        $icon_1_link = get_theme_mod('icon_1_link');
        $icon_2_link = get_theme_mod('icon_2_link');
        $icon_3_link = get_theme_mod('icon_3_link');
      ?>

      <div class="info-bar">
        <div class="site-main padding-5 text-right">

        <?php if (!empty($icon_1) || !empty($icon_1_title)){ ?>
          <div class="icons">
            <a href="<?php echo $icon_1_link ?>">
              <i class="fa <?php echo $icon_1 ?> fa-lg">
                <br/><span><?php echo $icon_1_title ?></span>
              </i>
            </a>
          </div><!-- /.icons -->
        <?php } ?>

        <?php if (!empty($icon_2) || !empty($icon_2_title)){ ?>
          <div class="icons">
            <a href="<?php echo $icon_2_link ?>">
              <i class="fa <?php echo $icon_2 ?> fa-lg">
                <br/><span><?php echo $icon_2_title ?></span>
              </i>
            </a>
          </div><!-- /.icons -->
        <?php } ?>

        <?php if (!empty($icon_3) || !empty($icon_3_title)){ ?>
          <div class="icons">
            <a href="<?php echo $icon_3_link ?>">
              <i class="fa <?php echo $icon_3 ?> fa-lg">
                <br/><span><?php echo $icon_3_title ?></span>
              </i>
            </a>
          </div><!-- /.icons -->
        <?php } ?>

        <?php if (have_rows('alerts', 229)) :

          // vars
          $alert_count = count(get_field('alerts', 229));

        endif;
        if ($alert_count >= 1) { ?>
          <div class="icons">
            <a href="/alerts">
              <i class="fa fa-exclamation-triangle fa-lg">
                <div class="alert-number"><?php echo $alert_count ?></div>
                <br/><span>Alerts</span>
              </i>
            </a>
          </div><!-- /.icons -->
        <?php } ?>

        </div><!-- /.header_container -->
      </div>

      <?php if(is_front_page()):?>

        <?php if(! get_theme_mod('homepage_promotional_bool')): ?>

            <div class="featuretext_top">

                <h3><?php if( get_theme_mod( 'featured_textbox' ) ){ echo esc_html(get_theme_mod( 'featured_textbox' ) ); } else { _e( 'Promotional Bar', 'adamos' ); } ?></h3>

                <?php if( get_theme_mod( 'featured_blurb' ) ){ ?>
                  <p class="blurb"><?php echo esc_html(get_theme_mod( 'featured_blurb' ) ); ?></p>
                <?php } ?>

                <?php if ( get_theme_mod( 'featured_button_url' ) ) : ?>
                  <p><a href="<?php echo esc_url( get_theme_mod( 'featured_button_url' ) ); ?>" ><?php echo esc_attr(get_theme_mod( 'featured_button_txt' )); ?></a></p>
                <?php endif; ?>

            </div>

        <?php endif; ?><!-- End Promo Bar -->

    <?php endif; ?>


  <div id="main" class="site-main">
