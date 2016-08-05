<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content after
 *
 * @package adamos
 * @since adamos 1.0
 */
?>

  </div><!-- #main .site-main -->

  <footer id="colophon" class="site-footer" role="contentinfo">

    <?php if(! get_theme_mod('hide_footer_widgets')): ?>

      <div class="footer_container">
        <div class="section group">

          <div class="col span_2_of_3">
            <?php if ( is_active_sidebar( 'left_column' ) && dynamic_sidebar('left_column') ) : else : ?>
              <div class="widget">
                <?php echo '<h4>' . __('Widget Ready', 'adamos') . '</h4>'; ?>
                <?php echo '<p>' . __('This left column is widget ready! Add one in the admin panel.', 'adamos') . '</p>'; ?>
              </div>
            <?php endif; ?>
          </div>

          <div class="col span_1_of_3">
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
          </div>

        </div>
      </div><!-- footer container -->

    <?php endif; ?>

    <?php if(! get_theme_mod('hide_copyright')): ?>

          <div class="site-info">

            <?php if(get_theme_mod('copyright_text')):

              $allowedTags = array(
                      'a' => array(
                          'href' => array(),
                          'title' => array()
                      ),
                      'em' => array(),
                      'strong' => array(),
                  );

                  $copyright = wp_kses(get_theme_mod('copyright_text'), $allowedTags);

              ?>

               <?php echo $copyright; ?>

            <?php else: ?>

          <a href="<?php $my_theme = wp_get_theme(); echo $my_theme->get( 'ThemeURI' ); ?>">
                <?php _e('Cori Snedecor WordPress Child Theme','adamos'); ?></a>
                <?php echo __( 'Powered By WordPress ', 'adamos' ); ?>

            <?php endif; ?>

      </div><!-- .site-info -->

    <?php endif; ?>


  </footer><!-- #colophon .site-footer -->


    <a href="#top" id="smoothup"></a>
</div><!-- #page .hfeed .site -->
</div><!-- end of wrapper -->
<?php wp_footer(); ?>

</body>
</html>
