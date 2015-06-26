<div id="sidebar">
  <h2>Menu</h2>
  <?php
    wp_nav_menu( array(
      'theme_location' => 'main_menu',
      'fallback_cb' => false,
      'menu_class' => 'jb-menu',
    ));
  ?>
  <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Right Sidebar') ) : ?>
  <?php endif; ?>
</div>