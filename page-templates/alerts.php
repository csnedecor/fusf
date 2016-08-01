<?php
/*
 * Template Name: Alert Page
 * Description: A page where FUSF can display custom alerts.
 */

get_header(); ?>

    <div id="primary" class="content-area">
      <div id="content" class="site-content" role="main">

        <?php while ( have_posts() ) : the_post(); ?>

          <?php get_template_part( 'content', 'page' ); ?>

          <?php if( have_rows('alerts') ): ?>
            <?php while(have_rows('alerts')) : the_row();

              // vars
              $title = get_sub_field('alert_title');
              $description = get_sub_field('alert_description');
              $link = get_sub_field('alert_link');
              $level = get_sub_field('alert_level');
              ?>

              <div class="alert">
                <?php if($level == 'high') { ?>
                  <h2 class="alert-title red"><i class="fa fa-exclamation-circle"></i>
                <?php } elseif($level == 'medium') { ?>
                  <h2 class="alert-title orange"><i class="fa fa-exclamation-triangle"></i>
                <?php } else { ?>
                  <h2 class="alert-title green"><i class="fa fa-info"></i>
                <?php } ?>
                <?php echo $title ?>
                  </h2><!-- /.alert-title-->
                <div class="alert-caption"><?php echo $description ?></div><!-- /.alert-caption -->
                <?php if(!empty($link)) { ?>
                  <div class="read-more"><a href="<?php echo $link ?>">More info...</a></div><!-- /.read-more -->
                <?php } ?>
              </div>
            <?php endwhile; ?>
          <?php endif; ?>

          <?php comments_template( '', true ); ?>

        <?php endwhile; // end of the loop. ?>


      </div><!-- #content .site-content -->
    </div><!-- #primary .content-area -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
