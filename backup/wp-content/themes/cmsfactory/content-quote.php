<?php get_header(); ?>
<div id="main">
  <div id="content">
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
      <div class="jb-post-single jb-format-quote">
        <h2>
          <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
        </h2>
        <?php the_content(); ?>
        <?php comments_template(); ?> 
      </div>
    <?php endwhile; else: ?>
      <h2>Sorry!</h2>
    <?php endif; ?>
  </div>
  <?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>