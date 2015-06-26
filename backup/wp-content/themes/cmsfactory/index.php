<?php get_header(); ?>
<div id="main">
  <div id="content">
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
      <div class="jb-post-list">
        <h2>
          <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
        </h2>
        <p>
          <?php echo get_the_date(); ?> <?php echo get_the_time(); ?>
          | Category : <?php the_category(', '); ?>
        </p>
        <?php
          if ( has_post_thumbnail() ) {
            the_post_thumbnail( array(100,100), array(
              'class' => 'jb-thumbnail',
            ) );
          }
        ?>
        <?php the_excerpt(); ?>
      </div>
    <?php endwhile; else: ?>
      <h2>Sorry!</h2>
    <?php endif; ?>
    <?php
      global $wp_query;
      $big = 999999999;
      echo paginate_links( array(
        'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
        'format' => '?paged=%#%',
        'current' => max( 1, get_query_var('paged') ),
        'total' => $wp_query->max_num_pages,
      ) );
    ?>
  </div>
  <?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>