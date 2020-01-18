<?php
/*
Template Name: ГЛАВНАЯ
*/
?>

<?php get_header(); ?>

<section id="hero">
	<div class="hero py-12 lg:py-20">
		<div class="container mx-auto px-4 lg:px-0">
			<div class="slider flex flex-col lg:flex-row items-center">
				<div class="w-full lg:w-1/2 mb-8 lg:pr-12 lg:mb-0">
					<div class="slider_subtitle text-xl opacity-75 mb-4">
						<?php _e( 'Индивидуальный дизайн', 's-cast' ); ?>
					</div>
					<h1 class="slider_title roboto-bold text-2xl lg:text-4xl uppercase mb-6">
						<?php echo carbon_get_the_post_meta('crb_main_title') ?>
					</h1>
					<div class="slider_text mb-6 pl-4">
						<?php echo carbon_get_the_post_meta('crb_main_description') ?>
					</div>
					<div class="slider_btn text-xl inline-block">
						<i class="icofont-arrow-right"></i>
						<span><?php _e( 'Заказать звонок', 's-cast' ); ?></span>
					</div>
				</div>
				<div class="w-full lg:w-1/2 lg:pl-12">
					<div class="swiper-container swiper-slider-container">
						<div class="slider_photo swiper-wrapper">
							<?php $slider_items = carbon_get_the_post_meta('crb_main_slider');
								foreach ( $slider_items as $slider_item ): ?>
								<?php $item_src = wp_get_attachment_image_src($slider_item, 'large'); ?>
								<div class="swiper-slide">
									<img src="<?php echo $item_src[0]; ?>" alt="" loading="lazy">	
								</div>
							<?php endforeach; ?>
						</div>	
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<?php get_template_part('blocks/adv', 's-cast') ?>

<section id="products">
	<div class="products mb-12 lg:mb-20">
		<div class="container mx-auto px-4 lg:px-0">
			<div class="title_bg_2 mb-12">
				<h2 class="roboto-bold text-4xl uppercase mb-2">
					<?php _e( 'Продукция', 's-cast' ); ?>
				</h2>
				<div class="roboto-light text-2xl">
					<?php _e( 'Производство изделий по индивидуальному дизайну', 's-cast' ); ?>
				</div>
			</div>
			<div class="products_blocks">
				<?php $cats = get_terms( array( 'taxonomy' => 'cats', 'parent' => 0, 'hide_empty' => false ) );
					foreach ( $cats as $cat ): ?>
					<div class="products_item mb-6">
						<div class="products_item_bg flex flex-col-reverse lg:flex-row">
							<div class="products_item_info w-full lg:w-2/3 flex flex-col justify-center rounded-b-lg lg:rounded-lg p-6">
								<div class="logo flex items-center mx-0 mb-6">
				          <div class="logo_left my_bg_gray">
				            <span class="logo_site my_yellow_color">S-cast</span>
				            <span class="logo_sep"> | </span>  
				          </div>
				          <div class="logo_right animate_this">
				            <span class="logo_text"><?php _e( 'Закажи шедевр', 's-cast' ); ?></span>  
				          </div>
				        </div>
								<div class="products_item_title my_yellow_color roboto-bold text-3xl uppercase mb-6 catalog_animate_btn-js">
									<a href="<?php echo get_term_link($cat->term_id, 'cats') ?>" data-catalog-btn-animate="<?php echo $cat->term_id ?>">
										<?php echo $cat->name ?>		
									</a>
								</div>
								<div class="products_item_text roboto-light text-xl lg:pr-32 mb-6">
									<?php echo carbon_get_term_meta($cat->term_id, 'crb_term_desc') ?>
								</div>
								<div class="slider_btn text-xl inline-block catalog_animate_btn-js">
									<a href="<?php echo get_term_link($cat->term_id, 'cats') ?>" data-catalog-btn-animate="<?php echo $cat->term_id ?>">
										<i class="icofont-arrow-right"></i>
										<span><?php _e( 'Смотреть каталог', 's-cast' ); ?></span>
									</a>
								</div>
							</div>
							<div class="products_item_photo w-full lg:w-1/3" data-catalog-photo-animate="<?php echo $cat->term_id ?>">
								<img src="<?php echo carbon_get_term_meta($cat->term_id, 'crb_term_photo') ?>" alt="" class="rounded-t-lg lg:rounded-lg w-full h-48 lg:h-full object-cover" loading="lazy">
							</div>
						</div>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
	</div>
</section>

<section id="about">
	<div class="about mb-12 lg:mb-20">
		<?php $args_about_page = [
      'post_type' => 'page',
      'fields' => 'ids',
      'nopaging' => true,
      'meta_key' => '_wp_page_template',
      'meta_value' => 'tpl_about.php'
    ];
    $about_pages = get_posts( $args_about_page );
    foreach ( $about_pages as $about_page ): ?>
			<div class="about_photo lg:pr-6">
				<img src="<?php echo get_the_post_thumbnail_url( $about_page ); ?>" alt="" loading="lazy" class="w-full h-full object-cover">
			</div>
			<div class="container mx-auto px-4 lg:px-0">
				<div class="about_content lg:pl-6">
					<h2 class="about_title roboto-bold text-4xl uppercase mb-6">
						<?php _e( 'О компании', 's-cast' ); ?>
					</h2>
					<div>
						<?php echo carbon_get_post_meta($about_page, 'crb_about_mainpage_content'); ?>
					</div>
				</div>
			</div>
		<?php endforeach; ?>
	</div>
</section>

<section id="clients">
	<div class="clients mb-20">
		<div class="container mx-auto px-4 lg:px-0">
			<h2 class="roboto-bold text-4xl text-center uppercase mb-6">
				<?php _e( 'Наши клиенты', 's-cast' ); ?>
			</h2>
			<div class="swiper-container swiper-container-clients">
				<div class="swiper-wrapper">
					<?php $clients_items = carbon_get_theme_option('crb_main_clients');
					foreach ( $clients_items as $clients_item ): ?>
					<?php $item_src = wp_get_attachment_image_src($clients_item, 'large'); ?>
						<div class="swiper-slide">
							<div class="bg-white rounded-lg shadow-lg p-6">
								<img src="<?php echo $item_src[0]; ?>" alt="" class="mx-auto" loading="lazy">
							</div>
						</div>
					<?php endforeach; ?>
				</div>
			</div>
			<div class="swiper-pagination swiper-pagination-clients"></div>
		</div>
	</div>
</section>

<?php get_footer(); ?>