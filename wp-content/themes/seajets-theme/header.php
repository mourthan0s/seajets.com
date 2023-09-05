<!doctype html>
<html <?php language_attributes(); ?>>
<head >
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Seajets</title>
  <?php wp_head(); ?>
</head>
<body <?php body_class( $bodyClass . ' view ' . $user_browser ); ?>>

<div class="header">
  <div class="left">
    <div class="logo1"> 
      <a href="https://projects.wildwildweb.gr/seajets/"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/seajets.png" alt="Left Logo"></a>
    </div>
    <?php
      wp_nav_menu( 
        array(
          'theme_location' => 'main', 
          'menu_class' => 'main-menu-wrapper',
        )
      );
    ?> 
  </div>  

  <div class="logo2 grid-x align-middle">
    <a class="js-seaclub" href="https://www.seajets.com/el/travel-with-us/seajets-sea-club"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/seaclub.png" alt="Right Logo"></a>
    <?php echo do_shortcode( '[language-switcher]' ); ?>
    <div class="burger-menu js-open-menu">
      <span></span>
      <span></span>
      <span></span>
    </div>   
  </div>
</div>