    </section>
    <footer id="footer" class="footer">
    	<div class="container mx-auto px-4 mb-6 lg:px-0 lg:mb-12">
    		<div class="flex flex-col lg:flex-row">
    			<div class="w-full lg:w-2/4 lg:pr-6 mb-6 lg:mb-0">
    				<div class="logo flex items-center mx-0 mb-4">
		          <div class="logo_left my_bg_darkblue">
		            <span class="logo_site my_yellow_color">S-cast</span>
		            <span class="logo_sep"> | </span>  
		          </div>
		          <div class="logo_right animate_this">
		            <span class="logo_text"><?php _e( 'О производителе', 's-cast' ); ?></span>  
		          </div>
		        </div>
		        <div class="roboto-light mb-0 lg:mb-6">
              <?php $args_main_page = [
                'post_type' => 'page',
                'fields' => 'ids',
                'nopaging' => true,
                'meta_key' => '_wp_page_template',
                'meta_value' => 'tpl_main.php'
              ];
              $main_pages = get_posts( $args_main_page );
              foreach ( $main_pages as $main_page ): ?>
  		        	<?php echo carbon_get_post_meta($main_page, 'crb_main_proizvoditel'); ?>
              <?php endforeach; ?>
		        </div>
            <?php $args_contact_page = [
              'post_type' => 'page',
              'fields' => 'ids',
              'nopaging' => true,
              'meta_key' => '_wp_page_template',
              'meta_value' => 'tpl_contact.php'
            ];
            $contact_pages = get_posts( $args_contact_page );
            foreach ( $contact_pages as $contact_page ): ?>
  		        <div class="hidden lg:flex">
                <?php if (carbon_get_post_meta($contact_page, 'crb_contact_instagram')): ?>
    		        	<div class="mr-4">
    		        		<a href="<?php echo carbon_get_post_meta($contact_page, 'crb_contact_instagram'); ?>" target="_blank">
    			        		<img src="<?php bloginfo('template_url'); ?>/img/instagram.svg" alt="" width="50px" height="50px" class="social_icon" loading="lazy">
    		        		</a>
    		        	</div>
                <?php endif; ?>
                <?php if (carbon_get_post_meta($contact_page, 'crb_contact_pinterest')): ?>
    		        	<div class="mr-4">
    		        		<a href="<?php echo carbon_get_post_meta($contact_page, 'crb_contact_pinterest'); ?>" target="_blank">
    			        		<img src="<?php bloginfo('template_url'); ?>/img/pinterest.svg" alt="" width="50px" height="50px" class="social_icon" loading="lazy">
    			        	</a>
    		        	</div>
                <?php endif; ?>
                <?php if (carbon_get_post_meta($contact_page, 'crb_contact_facebook')): ?>
    		        	<div class="mr-4">
    		        		<a href="<?php echo carbon_get_post_meta($contact_page, 'crb_contact_facebook'); ?>" target="_blank">
    			        		<img src="<?php bloginfo('template_url'); ?>/img/facebook.svg" alt="" width="50px" height="50px" class="social_icon" loading="lazy">
    			        	</a>
    		        	</div>
                <?php endif; ?>
  		        </div>
            <?php endforeach; ?>
    			</div>
    			<div class="w-full lg:w-1/4 lg:px-6 mb-6 lg:mb-0">
    				<div class="roboto-bold my_yellow_color text-2xl uppercase mb-2">
    					<?php _e( 'Навигация', 's-cast' ); ?>
    				</div>
    				<?php wp_nav_menu([
	            'theme_location' => 'head_top_menu',
	            'menu_id' => 'footer_menu',
	            'menu_class' => 'flex flex-col'
	          ]); ?>
    			</div>
          <?php $args_contact_page = [
            'post_type' => 'page',
            'fields' => 'ids',
            'nopaging' => true,
            'meta_key' => '_wp_page_template',
            'meta_value' => 'tpl_contact.php'
          ];
          $contact_pages = get_posts( $args_contact_page );
          foreach ( $contact_pages as $contact_page ): ?>
      			<div class="w-full lg:w-1/4 lg:pl-6 mb-6 lg:mb-0">
      				<div class="roboto-bold text-xl my_yellow_color mb-2">
      					<?php _e( 'Адрес', 's-cast' ); ?>:
      				</div>
      				<div class="roboto-light mb-4">
      					<?php echo carbon_get_post_meta($contact_page, 'crb_contact_address'); ?>
      				</div>
      				<div class="roboto-bold text-xl my_yellow_color mb-2">
      					<?php _e( 'Телефоны', 's-cast' ); ?>:
      				</div>
      				<div class="roboto-light mb-4">
                <?php $footer_phones = carbon_get_post_meta($contact_page, 'crb_contact_phones');
                foreach ($footer_phones as $footer_phone): ?>
        					<div><a href="tel:<?php echo $footer_phone['crb_contact_phone'] ?>"><?php echo $footer_phone['crb_contact_phone'] ?></a></div>
                <?php endforeach; ?>
      				</div>
      				<div class="roboto-bold text-xl my_yellow_color mb-2">
      					Email:
      				</div>
      				<div class="roboto-light mb-6 lg:mb-0">
                <?php $footer_emails = carbon_get_post_meta($contact_page, 'crb_contact_emails');
                foreach ($footer_emails as $footer_email): ?>
                  <div>
                    <a href="mailto:<?php echo $footer_email['crb_contact_email'] ?>"><?php echo $footer_email['crb_contact_email'] ?></a>
                  </div>
                <?php endforeach; ?>
      				</div>
              <div class="flex lg:hidden">
                <?php if (carbon_get_post_meta($contact_page, 'crb_contact_instagram')): ?>
                  <div class="mr-4">
                    <a href="<?php echo carbon_get_post_meta($contact_page, 'crb_contact_instagram'); ?>" target="_blank">
                      <img src="<?php bloginfo('template_url'); ?>/img/instagram.svg" alt="" width="50px" height="50px" class="social_icon">
                    </a>
                  </div>
                <?php endif; ?>
                <?php if (carbon_get_post_meta($contact_page, 'crb_contact_pinterest')): ?>
                  <div class="mr-4">
                    <a href="<?php echo carbon_get_post_meta($contact_page, 'crb_contact_pinterest'); ?>" target="_blank">
                      <img src="<?php bloginfo('template_url'); ?>/img/pinterest.svg" alt="" width="50px" height="50px" class="social_icon">
                    </a>
                  </div>
                <?php endif; ?>
                <?php if (carbon_get_post_meta($contact_page, 'crb_contact_facebook')): ?>
                  <div class="mr-4">
                    <a href="<?php echo carbon_get_post_meta($contact_page, 'crb_contact_facebook'); ?>" target="_blank">
                      <img src="<?php bloginfo('template_url'); ?>/img/facebook.svg" alt="" width="50px" height="50px" class="social_icon">
                    </a>
                  </div>
                <?php endif; ?>
              </div>
      			</div>
          <?php endforeach; ?>
    		</div>
    	</div>
    	<div class="copyright my_bg_gray text-center py-2">
  			<span class="my_yellow_color"><?php _e( 'Разработка сайта', 's-cast' ); ?>:</span>
  			<a href="https://timeto.top" target="_blank">TimeToTop</a>
  		</div>
    </footer>
    <div class="modal modal_order" data-modal-id="modal_order">
    	<div class="modal_block">
    		<div class="my_bg_gray rounded-lg py-8 px-12">
    			<h3 class="roboto-bold text-xl text-center uppercase mb-6"><?php _e( 'Заказать просчет', 's-cast' ); ?></h3>
    			<div>
    				<?php 
              $form_header = carbon_get_theme_option(
            'crb_form_header'); 
              echo do_shortcode(''. $form_header .'');
            ?>
    			</div>
    		</div>
    	</div>
    </div>
    <div class="modal modal_innerorder" data-modal-id="modal_innerorder">
      <div class="modal_block">
        <div class="my_bg_gray rounded-lg py-8 px-12">
          <h3 class="roboto-bold text-xl text-center uppercase mb-6"><?php _e( 'Заказать просчет', 's-cast' ); ?></h3>
          <div>
            <?php 
              $form_innerpage = carbon_get_theme_option(
            'crb_form_inner'); 
              echo do_shortcode(''. $form_innerpage .'');
            ?>
          </div>
        </div>
      </div>
    </div>
    <div class="modal_bg"></div>
    <?php wp_footer(); ?>
</body>
</html>