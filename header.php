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
<body <?php echo body_class('roboto-regular my_bg_darkblue text-white'); ?>>
  <!-- <div class="preloader"></div> -->
  
  <header id="header" class="header" role="banner">
    <div class="header_top my_bg_gray py-4">
      <div class="container flex justify-between items-center mx-auto">
        <div class="logo flex items-center mx-4">
          <div class="logo_left my_bg_gray">
            <a href="<?php echo home_url() ?>">
              <span class="logo_site my_yellow_color">S-cast</span>
            </a>
            <span class="logo_sep"> | </span>  
          </div>
          <div class="logo_right animate_this">
            <span class="logo_text"><?php _e( 'Закажи шедевр', 's-cast' ); ?></span>  
          </div>
        </div>
        <div class="hidden lg:flex items-center">
          <?php wp_nav_menu([
            'theme_location' => 'head_top_menu',
            'menu_id' => 'head_menu',
            'menu_class' => 'flex mr-8'
          ]); ?>
          <?php $args_contact_page = [
            'post_type' => 'page',
            'fields' => 'ids',
            'nopaging' => true,
            'meta_key' => '_wp_page_template',
            'meta_value' => 'tpl_contact.php'
          ];
          $contact_pages = get_posts( $args_contact_page );
          foreach ( $contact_pages as $contact_page ): ?>
            <div class="flex flex-col items-center mr-8">
              <div class="header_phones">
                <?php $header_phones = carbon_get_post_meta($contact_page, 'crb_contact_phones');
                foreach (array_slice($header_phones, 0, 1) as $header_phone): ?>
                  <a href="tel:<?php echo $footer_phone['crb_contact_phone'] ?>">
                    <?php echo $header_phone['crb_contact_phone'] ?>
                  </a>
                <?php endforeach; ?>
                <div class="header_phones_block">
                  <?php foreach ($header_phones as $header_phone): ?>
                    <a href="tel:<?php echo $footer_phone['crb_contact_phone'] ?>">
                      <?php echo $header_phone['crb_contact_phone'] ?>
                    </a>
                  <?php endforeach; ?>
                </div>
              </div>
            </div>
            <div class="flex mr-8">
              <?php if (carbon_get_post_meta($contact_page, 'crb_contact_instagram')): ?>
                <li class="list-none">
                  <a href="<?php echo carbon_get_post_meta($contact_page, 'crb_contact_instagram'); ?>" target="_blank">
                    <img src="<?php bloginfo('template_url'); ?>/img/instagram.svg" alt="" width="32px" height="32px" class="social_icon" loading="lazy">
                  </a>
                </li>
              <?php endif; ?>
              <?php if (carbon_get_post_meta($contact_page, 'crb_contact_pinterest')): ?>
                <li class="list-none">
                  <a href="<?php echo carbon_get_post_meta($contact_page, 'crb_contact_pinterest'); ?>" target="_blank">
                    <img src="<?php bloginfo('template_url'); ?>/img/pinterest.svg" alt="" width="32px" height="32px" class="social_icon" loading="lazy">
                  </a>
                </li>
              <?php endif; ?>
              <?php if (carbon_get_post_meta($contact_page, 'crb_contact_facebook')): ?>
                <li class="list-none">
                  <a href="<?php echo carbon_get_post_meta($contact_page, 'crb_contact_facebook'); ?>" target="_blank">
                    <img src="<?php bloginfo('template_url'); ?>/img/facebook.svg" alt="" width="32px" height="32px" class="social_icon" loading="lazy">
                  </a>
                </li>
              <?php endif; ?>
            </div>
          <?php endforeach; ?>  
            <!-- <div class="order_btn modal_click_js text-sm uppercase mr-8" data-modal-id="modal_order">
              <?php _e( 'Заказать просчет', 's-cast' ); ?>
            </div> -->
            
            <div class="flex">
              <?php pll_the_languages(array(
                'show_flags' => 1,
                'show_names' => 0
              )); ?>  
            </div>
          </div>
        </div>
        <div class="block lg:hidden">
          <div class="mobile_menu">
            <span></span>
            <span></span>
            <span></span>
          </div>
        </div>
      </div>
    </div>
    <div class="hidden lg:block header_bottom my_bg_dark py-2">
      <div class="container mx-auto">
        <?php wp_nav_menu([
          'theme_location' => 'head_bottom_menu',
          'menu_id' => 'head_menu',
          'menu_class' => 'flex justify-center'
        ]); ?>
      </div>
    </div>
  </header>
  <div class="mobile_cover p-4">
    <?php wp_nav_menu([
      'theme_location' => 'mobile_menu',
      'menu_id' => 'mobile_nav',
      'menu_class' => 'mb-6'
    ]); ?>
    <div>
      <h3 class="roboto-bold text-xl mb-4"><?php _e('Телефоны', 's-cast') ?></h3>
      <?php $args_contact_page = [
        'post_type' => 'page',
        'fields' => 'ids',
        'nopaging' => true,
        'meta_key' => '_wp_page_template',
        'meta_value' => 'tpl_contact.php'
      ];
      $contact_pages = get_posts( $args_contact_page );
      foreach ( $contact_pages as $contact_page ): ?>
        <div class="mb-6">
          <?php $header_phones = carbon_get_post_meta($contact_page, 'crb_contact_phones');
          foreach ($header_phones as $header_phone): ?>
            <div><a href="tel:<?php echo $footer_phone['crb_contact_phone'] ?>"><?php echo $header_phone['crb_contact_phone'] ?></a></div>
          <?php endforeach; ?>
        </div>
        <h3 class="roboto-bold text-xl mb-4"><?php _e('Email', 's-cast') ?></h3>
        <div class="mb-6">
          <?php $footer_emails = carbon_get_post_meta($contact_page, 'crb_contact_emails');
          foreach ($footer_emails as $footer_email): ?>
            <div>
              <a href="mailto:<?php echo $footer_email['crb_contact_email'] ?>"><?php echo $footer_email['crb_contact_email'] ?></a>
            </div>
          <?php endforeach; ?>
        </div>
      <?php endforeach; ?>
      <div class="text-center">
        <div class="order_btn inline-block text-sm uppercase mb-6 modal_click_js" data-modal-id="modal_order">
          <?php _e( 'Заказать просчет  ', 's-cast' ); ?>
        </div>
        <div class="flex justify-center">
          <?php pll_the_languages(array(
            'show_flags' => 1,
            'show_names' => 0
          )); ?>
        </div>
      </div>
    </div>
  </div>
  <section id="content" role="main" class="lg:pt-24">