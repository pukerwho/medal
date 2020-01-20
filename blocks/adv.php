<section id="adv">
	<div class="adv mb-12 lg:mb-20">
		<div class="container mx-auto px-4 lg:px-0">
			<h2 class="adv_title roboto-bold text-center text-4xl uppercase cast-animate mb-12">
				<?php _e( 'Наши преимущества', 's-cast' ); ?>
			</h2>
			<div class="adv_blocks flex flex-wrap -mx-4">
				<?php $args_main_page = [
          'post_type' => 'page',
          'fields' => 'ids',
          'nopaging' => true,
          'meta_key' => '_wp_page_template',
          'meta_value' => 'tpl_main.php'
      	];
      	$main_pages = get_posts( $args_main_page );
      	foreach ( $main_pages as $main_page ): ?>
					<?php $advs = carbon_get_post_meta($main_page, 'crb_main_adv');
					foreach ($advs as $adv): ?>
					<div class="adv_item w-full cast-animate px-4 lg:w-1/4 mb-4">
						<div class="adv_item_bg rounded-lg p-4">
							<div class="adv_item_icon mb-4">
								<img src="<?php echo $adv['crb_main_adv_icon'] ?>" alt="">
							</div>
							<div class="adv_item_title my_yellow_color roboto-bold uppercase mb-4">
								<?php echo $adv['crb_main_adv_title'] ?>
							</div>
							<div class="adv_item_text roboto-light">
								<?php echo $adv['crb_main_adv_text'] ?>
							</div>
						</div>
					</div>
					<?php endforeach; ?>
				<?php endforeach; ?>
			</div>
		</div>
	</div>
</section>