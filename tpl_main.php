<?php
/*
Template Name: ГЛАВНАЯ
*/
?>

<?php get_header(); ?>

<section id="hero">
	<div class="hero">
		<div class="slider">
			<div class="swiper-container swiper-slider-container">
				<div class="swiper-wrapper">
					<?php $slider_items = carbon_get_the_post_meta('crb_hero_slide');
					foreach ( $slider_items as $slider_item ): ?>
						<div class="swiper-slide">
							<div class="slide">
								<div class="slide_img">
									<?php 
										$slider_src_medium = wp_get_attachment_image_src($slider_item['crb_hero_slide_img'], 'medium'); 
										$slider_src_large = wp_get_attachment_image_src($slider_item['crb_hero_slide_img'], 'large'); 
										$slider_src_full = wp_get_attachment_image_src($slider_item['crb_hero_slide_img'], 'full'); 
									?>
									<img srcset="<?php echo $slider_src_medium[0] ?> 767w, 
									<?php echo $slider_src_large[0] ?> 1280w,
									<?php echo $slider_src_full[0] ?> 1440w"
									sizes="(max-width: 767px) 767px,
			            (max-width: 1280px) 1280px,
			            1440px"
									src="<?php echo $slider_src_full[0] ?>" alt="" loading="lazy">
								</div>
								<div class="container mx-auto px-4 lg:px-0">
									<div class="slide_title large-font">
										<span class="relative z-10"><?php echo $slider_item['crb_hero_slide_title']; ?></span>
									</div>
								</div>
							</div>
						</div>
					<?php endforeach; ?>
				</div>
				<!-- <div class="container mx-auto px-4 lg:px-0">
					<div class="slider_pagination">
						<div class="swiper-pagination-hero swiper-pagination"></div>		
					</div>
				</div> -->
			</div>
		</div>
	</div>
</section>

<section id="products">
	<div class="products">
		<div class="slider">
			<div class="swiper-container swiper-product-container">
				<div class="container swiper-wrapper mx-auto">
					<?php $cats = get_terms( array( 'taxonomy' => 'cats', 'parent' => 0, 'hide_empty' => false ) );
					foreach ( $cats as $cat ): ?>
						<div class="swiper-slide">
							<div class="slide">
								<a href="<?php echo get_term_link($cat->term_id, 'cats') ?>">
									<div class="slide_img">
										<img src="<?php echo carbon_get_term_meta($cat->term_id, 'crb_term_photo') ?>" alt="<?php echo $cat->name ?>	" loading="lazy">
									</div>
									<div class="slide_info">
										<div class="slide_title uppercase">
											<?php echo $cat->name ?>	
										</div>
										<div class="slide_description">
											<?php echo carbon_get_term_meta($cat->term_id, 'crb_term_desc') ?>
										</div>	
										<div class="slide_more uppercase">
											<?php _e('Подробнее', 's-cast'); ?>
										</div>
									</div>	
								</a>
							</div>
						</div>
					<?php endforeach; ?>
				</div>
				<div class="swiper-product-prev"></div>
				<div class="swiper-product-next"></div>
			</div>
		</div>
	</div>
</section>

<section id="rules">
	<div class="rules">
		<div class="container mx-auto px-4 lg:px-0">
			<h2 class="with_line mb_90 sm_mb_45">
				<?php _e('Наши правила', 's-cast'); ?>
			</h2>
			<div class="flex flex-col lg:flex-row -mx-4">
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
						<div class="w-full lg:w-1/4 pb_90 sm_pb_45">
							<div class="rules_item px-4">
								<div class="rules_title">
									<?php echo $adv['crb_main_adv_title'] ?>	
								</div>
								<div class="rules_description">
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

<section id="about">
	<?php $args_about_page = [
    'post_type' => 'page',
    'fields' => 'ids',
    'nopaging' => true,
    'meta_key' => '_wp_page_template',
    'meta_value' => 'tpl_about.php'
  ];
  $about_pages = get_posts( $args_about_page );
  foreach ( $about_pages as $about_page ): ?>
	<div class="about">
		<div class="container mx-auto">
			<h2 class="with_line">
				<span class="hidden lg:block">
					<?php _e('Производственная компания S-Cast', 's-cast'); ?>	
				</span>
				<span class="block lg:hidden">
					<?php _e('О нас', 's-cast'); ?>	
				</span>
			</h2>
		</div>
		<div class="about_photo hidden lg:flex lg:pr-6">
			<img src="<?php echo get_the_post_thumbnail_url( $about_page ); ?>" alt="" loading="lazy" class="w-full h-full object-cover">
		</div>
		<div class="container mx-auto px-4 lg:px-0">
			<div class="about_content lg:pl-6">
				<div class="mb-0 lg:mb-8">
					<?php echo carbon_get_post_meta($about_page, 'crb_about_mainpage_content'); ?>
				</div>
				<div class="about_photo block lg:hidden mb-8">
					<img src="<?php echo get_the_post_thumbnail_url( $about_page ); ?>" alt="" loading="lazy" class="w-full h-full object-cover">
				</div>
				<a href="<?php echo get_page_url('tpl_about') ?>">
					<div class="about_more flex items-center justify-end">
						<span class="mr-4 mt-1"><?php _e('Подробнее', 's-cast'); ?> </span>
						<img src="<?php bloginfo('template_url'); ?>/img/secondary-arrow.svg" alt="" width="25px">
					</div>
				</a>
			</div>
		</div>
		<img src="<?php echo get_the_post_thumbnail_url( $about_page ); ?>" alt="" class="about_bg" loading="lazy">
	</div>
	<?php endforeach; ?>
</section>

<section id="clients">
	<div class="clients">
		<div class="container mx-auto">
			<h2 class="with_line">
				<?php _e( 'Наши клиенты', 's-cast' ); ?>
			</h2>
		</div>
		<div class="swiper-container swiper-container-clients">
			<div class="container swiper-wrapper mx-auto">
				<?php $clients_items = carbon_get_theme_option('crb_main_clients');
				foreach ( $clients_items as $clients_item ): ?>
				<?php $item_src = wp_get_attachment_image_src($clients_item, 'large'); ?>
					<div class="swiper-slide">
						<div>
							<img src="<?php echo $item_src[0]; ?>" alt="" class="mx-auto" loading="lazy">
						</div>
					</div>
				<?php endforeach; ?>
			</div>
			<div class="swiper-product-prev cursor-pointer"></div>
			<div class="swiper-product-next cursor-pointer"></div>
		</div>
	</div>
</section>

<?php get_footer(); ?>