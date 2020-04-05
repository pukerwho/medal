    </section>
    <?php if( !is_page_template( 'tpl_contact.php' )): ?>
      <footer id="footer" class="footer">
        <div class="container mx-auto px-4 lg:px-0">
          <h2 class="with_line"><?php _e('Ответим на все вопросы'); ?></h2>
          <div class="flex justify-center">
            <div class="flex w-full lg:w-5/6 flex-col lg:flex-row">
              <div class="w-full lg:w-1/2 footer_form mb-16 pr-0 lg:pr-20 lg:mb-0">
                <?php 
                  $form_contact = carbon_get_theme_option(
                'crb_form_contact'); 
                  echo do_shortcode(''. $form_contact .'');
                ?>
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
                <div class="w-full lg:w-1/2 text-center lg:text-left footer_contacts pl-0 lg:pl-20">
                  <div class="footer_phones">
                    <?php $footer_vibers = carbon_get_post_meta($contact_page, 'crb_contact_vibers');
                    foreach ($footer_vibers as $footer_viber): ?>
                      <div class="mb-2">
                        <a href="tel:<?php echo $footer_viber['crb_contact_viber'] ?>"><?php echo $footer_viber['crb_contact_viber'] ?> <span class="ml-2">(Viber)</span></a>
                      </div>
                    <?php endforeach; ?>
                    <?php $footer_phones = carbon_get_post_meta($contact_page, 'crb_contact_phones');
                    foreach ($footer_phones as $footer_phone): ?>
                      <div class="mb-2">
                        <a href="tel:<?php echo $footer_phone['crb_contact_phone'] ?>"><?php echo $footer_phone['crb_contact_phone'] ?></a>
                      </div>
                    <?php endforeach; ?>
                  </div>
                  <div class="footer_emails">
                    <?php $footer_emails = carbon_get_post_meta($contact_page, 'crb_contact_emails');
                    foreach ($footer_emails as $footer_email): ?>
                      <div>
                        <a href="mailto:<?php echo $footer_email['crb_contact_email'] ?>"><?php echo $footer_email['crb_contact_email'] ?></a>
                      </div>
                    <?php endforeach; ?>
                  </div>
                  <div class="footer_address">
                    <?php echo carbon_get_post_meta($contact_page, 'crb_contact_address'); ?>
                  </div>
                </div>
              <?php endforeach; ?>
            </div>
          </div>
        </div>
      </footer>
    <?php endif; ?>
    <div class="copyright">
      <div class="container mx-auto text-center lg:text-left">
        © 2020. S-CAST.COM.UA  
      </div>
    </div>
    
    <div class="modal modal_order" data-modal-id="modal_order">
    	<div class="modal_block rounded-lg shadow-lg pb-0 lg:pb-12">
    		<div class="px-4 py-8 lg:px-12">
    			<h3 class="secondary-font text-black text-3xl text-center uppercase mb-6"><?php _e( 'Заказать просчет', 's-cast' ); ?></h3>
    			<div>
    				<?php 
              $form_header = carbon_get_theme_option(
            'crb_form_header'); 
              echo do_shortcode(''. $form_header .'');
            ?>
            <div class="close_btn"><?php _e('Закрыть', 's-cast'); ?></div>
    			</div>
    		</div>
    	</div>
    </div>
    <div class="modal modal_innerorder" data-modal-id="modal_innerorder">
      <div class="modal_block rounded-lg shadow-lg pb-0 lg:pb-12">
        <div class="px-4 py-8 lg:px-12">
          <h3 class="secondary-font text-black text-3xl text-center uppercase mb-6">
            <?php _e( 'Рассчитать заказ', 's-cast' ); ?></h3>
          <div>
            <?php 
              $form_innerpage = carbon_get_theme_option(
            'crb_form_inner'); 
              echo do_shortcode(''. $form_innerpage .'');
            ?>
            <div class="close_btn"><?php _e('Закрыть', 's-cast'); ?></div>
          </div>
        </div>
      </div>
    </div>
    <div class="modal modal_callback" data-modal-id="modal_callback">
      <div class="modal_block rounded-lg shadow-lg pb-0 lg:pb-12">
        <div class="px-4 py-8 lg:px-12">
          <h3 class="secondary-font text-black text-3xl text-center uppercase mb-6"><?php _e( 'Обратный звонок', 's-cast' ); ?></h3>
          <div>
            <?php 
              $form_callback = carbon_get_theme_option(
            'crb_form_callback'); 
              echo do_shortcode(''. $form_callback .'');
            ?>
            <div class="close_btn"><?php _e('Закрыть', 's-cast'); ?></div>
          </div>
        </div>
      </div>
    </div>
    <div class="modal_bg"></div>
    <?php wp_footer(); ?>
</body>
</html>