<!doctype html>
<html <?php language_attributes(); ?> class="no-js no-svg">

<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">

  <!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"><![endif]-->
  <link rel="profile" href="http://gmpg.org/xfn/11">
  <base href="/">
  <link rel="alternate" hreflang="x-default" href="<?php echo home_url(); ?>">
  <link rel="alternate" hreflang="en" href="<?php echo home_url(); ?>/en">
  <link rel="alternate" hreflang="ru" href="<?php echo home_url(); ?>/ru">
  <link rel="alternate" hreflang="ua" href="<?php echo home_url(); ?>/ua">
  
  <?php
  // ENQUEUE your css and js in inc/enqueues.php

    wp_head();
	?>
</head>
<body <?php echo body_class('text-white'); ?>>
  <!-- <div class="preloader"></div> -->
  <header id="header" class="header" role="banner">
    <div class="container mx-auto p-4 lg:p-0">
      <div class="header_top">
        <div class="flex justify-between items-center">
          <div class="left_side">
            <div class="menu">
              <?php wp_nav_menu([
                'theme_location' => 'head_top_menu',
                'menu_id' => 'head_menu',
                'menu_class' => 'flex mr-8'
              ]); ?>
            </div>  
          </div>
          <div class="right_side flex">
            <?php $args_contact_page = [
              'post_type' => 'page',
              'fields' => 'ids',
              'nopaging' => true,
              'meta_key' => '_wp_page_template',
              'meta_value' => 'tpl_contact.php'
            ];
            $contact_pages = get_posts( $args_contact_page );
            foreach ( $contact_pages as $contact_page ): ?>
              <div class="contacts flex">
                <div class="phones">
                  <?php $header_phones = carbon_get_post_meta($contact_page, 'crb_contact_phones');
                    foreach ($header_phones as $header_phone): ?>
                    <a href="tel:<?php echo $footer_phone['crb_contact_phone'] ?>">
                      <?php echo $header_phone['crb_contact_phone'] ?>
                    </a>
                  <?php endforeach; ?>
                </div>
                <div class="emails">
                  <?php $header_emails = carbon_get_post_meta($contact_page, 'crb_contact_emails');
                  foreach ($header_emails as $header_email): ?>
                    <a href="mailto:<?php echo $header_email['crb_contact_email'] ?>"><?php echo $header_email['crb_contact_email'] ?></a>
                  <?php endforeach; ?>
                </div>
                <div class="social flex">
                  <?php if (carbon_get_post_meta($contact_page, 'crb_contact_facebook')): ?>
                    <a href="<?php echo carbon_get_post_meta($contact_page, 'crb_contact_facebook'); ?>" target="_blank"><img src="<?php bloginfo('template_url'); ?>/img/ico-fb.png" alt=""></a>
                  <?php endif; ?>
                  <?php if (carbon_get_post_meta($contact_page, 'crb_contact_instagram')): ?>
                    <a href="<?php echo carbon_get_post_meta($contact_page, 'crb_contact_instagram'); ?>" target="_blank"><img src="<?php bloginfo('template_url'); ?>/img/ico-insta.png" alt=""></a>
                  <?php endif; ?>
                </div>
              </div>
            <?php endforeach; ?>   
            <div class="switcher-lang flex">
              <?php pll_the_languages(array(
                'show_flags' => 0,
                'show_names' => 1,
              )); ?> 
            </div>
          </div>
        </div>
      </div>
      <div class="header_bottom">
        <div class="flex items-center justify-between lg:justify-start">
          <div class="logo">
            <a href="<?php echo home_url(); ?>">
              <img src="<?php bloginfo('template_url'); ?>/img/logo.png" alt="Логотип">
            </a>
          </div>
          <div class="menu">
            <?php wp_nav_menu([
              'theme_location' => 'head_bottom_menu',
              'menu_id' => 'head_menu',
              'menu_class' => 'flex justify-center'
            ]); ?>
          </div>
          <div class="menu-humburger">
            <span></span>
            <span></span>
            <span></span>
          </div>
        </div>
        <div class="order-btn secondary-bg">
          Заказать просчет
        </div>
      </div>
    </div>
  </header>
  <div class="mobile_cover">
    <?php $args_contact_page = [
      'post_type' => 'page',
      'fields' => 'ids',
      'nopaging' => true,
      'meta_key' => '_wp_page_template',
      'meta_value' => 'tpl_contact.php'
    ];
    $contact_pages = get_posts( $args_contact_page );
    foreach ( $contact_pages as $contact_page ): ?>
      <div class="container mx-auto px-4">
        <div class="mobile_cover_top flex justify-between">
          <div class="social flex">
            <?php if (carbon_get_post_meta($contact_page, 'crb_contact_facebook')): ?>
              <a href="<?php echo carbon_get_post_meta($contact_page, 'crb_contact_facebook'); ?>" target="_blank"><img src="<?php bloginfo('template_url'); ?>/img/ico-fb.png" alt=""></a>
            <?php endif; ?>
            <?php if (carbon_get_post_meta($contact_page, 'crb_contact_instagram')): ?>
              <a href="<?php echo carbon_get_post_meta($contact_page, 'crb_contact_instagram'); ?>" target="_blank"><img src="<?php bloginfo('template_url'); ?>/img/ico-insta.png" alt=""></a>
            <?php endif; ?>
          </div>
          <div class="switcher-lang flex">
            <?php pll_the_languages(array(
              'show_flags' => 0,
              'show_names' => 1,
            )); ?> 
          </div>
        </div>
        <div class="mobile_cover_center">
          <?php wp_nav_menu([
            'theme_location' => 'head_bottom_menu',
            'menu_id' => 'mobile_center_nav',
            'menu_class' => 'mb-6'
          ]); ?>
        </div>
        <div class="mobile_cover_bottom">
          <?php wp_nav_menu([
            'theme_location' => 'head_top_menu',
            'menu_id' => 'mobile_bottom_nav',
          ]); ?>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
  <div class="mobile_phone_icon">
    <img src="<?php bloginfo('template_url'); ?>/img/phone.svg" alt="" width="20px">
  </div>
  <section id="content" role="main">