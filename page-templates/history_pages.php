<?php
/*

 * Template Name: History Pages

 * Description: A Page Template with a custom menu at the bottom.

 */

get_header(); ?>

    <div id="primary" class="content-area">
      <div id="content" class="site-content" role="main">

        <?php while ( have_posts() ) : the_post(); ?>

          <?php get_template_part( 'content', 'history' ); ?>

          <?php comments_template( '', true ); ?>

        <?php endwhile; // end of the loop. ?>

      </div><!-- #content .site-content -->
    </div><!-- #primary .content-area -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
