<!doctype html>
<html <?php language_attributes(); ?>>
  <head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <title><?php bloginfo('name'); ?> <?php wp_title('|'); ?></title>
    <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>">
    <?php wp_head(); ?>
  </head>
  <body <?php body_class(); ?>>
    <div id="container">
      <div id="header">
        <h1>
          <a href="<?php echo home_url(); ?>">
            <?php bloginfo('name'); ?>
          </a>
        </h1>
        <p><?php bloginfo('description'); ?></p>
      </div>