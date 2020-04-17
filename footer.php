    </section>
    <?php if( !is_page_template( 'tpl_contact.php' )): ?>
      <footer id="footer" class="footer">
        <div class="container mx-auto px-4 lg:px-0">
          <h2 class="with_line"><?php _e('Ответим на все вопросы', 's-cast'); ?></h2>
          <div class="flex justify-center">
            <div class="flex w-full lg:w-5/6 flex-col lg:flex-row">
              <div class="w-full lg:w-1/2 footer_form mb-16 pr-0 lg:pr-20 lg:mb-0">
                <?php 
                  $form_contact = carbon_get_theme_option(
                'crb_form_contact'); 
                  echo do_shortcode(''. $form_contact .'');
                ?>
              </div>
              <div class="w-full lg:w-1/2 text-center lg:text-left footer_contacts pl-0 lg:pl-20">
                <?php get_template_part('blocks/footer-contact'); ?>
              </div>
            </div>
          </div>
        </div>
      </footer>
    <?php endif; ?>
    <div class="copyright">
      <div class="container mx-auto text-center lg:text-left">
        <?php echo get_theme_mod( 'copyright_text' ); ?>
      </div>
    </div>
    
    <div class="modal modal_order" data-modal-id="modal_order">
    	<div class="modal_block rounded-lg shadow-lg">
        <div class="px-4 py-8 lg:px-12">
          <h3 class="secondary-font text-black text-3xl text-center uppercase mb-6">
            <?php _e( 'Заказать просчет', 's-cast' ); ?>
          </h3>
          <div class="flex flex-col lg:flex-row">
            <div class="w-full lg:w-1/2 pr-0 lg:pr-10">
              <div>
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
            <div class="hidden lg:block w-full lg:w-1/2 pl-0 lg:pl-10">
              <?php get_template_part('blocks/footer-contact'); ?>
            </div>
          </div>
        </div>
    	</div>
    </div>
    <div class="modal modal_innerorder" data-modal-id="modal_innerorder">
      <div class="modal_block rounded-lg shadow-lg">
        <div class="px-4 py-8 lg:px-12">
          <h3 class="secondary-font text-black text-3xl text-center uppercase mb-6">
            <?php _e( 'Заказать просчет', 's-cast' ); ?>
          </h3>
          <div class="flex flex-col lg:flex-row">
            <div class="w-full lg:w-1/2 pr-0 lg:pr-10">
              <div>
                <?php 
                  $form_innerpage = carbon_get_theme_option(
                'crb_form_inner'); 
                  echo do_shortcode(''. $form_innerpage .'');
                ?>
                <div class="close_btn"><?php _e('Закрыть', 's-cast'); ?></div>
              </div>
            </div>
            <div class="hidden lg:block w-full lg:w-1/2 pl-0 lg:pl-10">
              <?php get_template_part('blocks/footer-contact'); ?>
            </div>
          </div>  
        </div>
      </div>
    </div>
    <div class="modal modal_callback" data-modal-id="modal_callback">
      <div class="modal_block rounded-lg shadow-lg">
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