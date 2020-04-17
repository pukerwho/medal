<?php get_header(); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	<?php 
		$current_term = wp_get_post_terms(  get_the_ID() , 'cats', array('orderby' => 'parent', 'order' => 'ASC') );
		$current_term_parent = $current_term[0];
		$current_term_slug = $current_term_parent->slug;
		$current_term_name = $current_term_parent->name;
		$current_term_link = get_term_link($current_term_parent);	
	?>
<div class="container mx-auto">
	<div class="back inline-flex cursor-pointer px-4 lg:px-0 mb-10 lg:mb-8">
		<a href="<?php echo $current_term_link; ?>" class="flex items-center">
			<img src="<?php bloginfo('template_url'); ?>/img/arrow-left.svg" alt="" width="25px" class="rotate-180 -mt-1 mr-4" style="transform: rotate(-180deg);">
			<span><?php _e('Назад', 's-cast'); ?></span>
		</a>
	</div>
	<div class="title">
		<?php the_title(); ?>
	</div>
	<div class="flex flex-col lg:flex-row relative mb-4 lg:mb-24">
		<div class="slider px-4 lg:px-0">
			<div class="swiper-container swiper-single_product-container">
				<div class="swiper-wrapper">
					<?php 
						$post_photos = carbon_get_the_post_meta('crb_product_gallery');
						foreach ( $post_photos as $post_photo ): ?>
						<div class="swiper-slide">
							<?php $photo_src = wp_get_attachment_image_src($post_photo, 'large'); ?>
							<li data-thumb="<?php echo $photo_src[0]; ?>">
						    <img src="<?php echo $photo_src[0]; ?>" loading="lazy">
						  </li>
						</div>
					<?php endforeach; ?>
				</div>
				<div class="swiper-product-prev"></div>
				<div class="swiper-product-next"></div>
				<div class="slider_pagination">
					<div class="swiper-pagination-hero swiper-pagination"></div>		
				</div>
			</div>
		</div>
		<div class="content">
			<div class="content_bg mb-8">
				<div class="content_item">
					<span><?php _e('Способ производства', 's-cast'); ?>:</span><span><?php echo carbon_get_the_post_meta('crb_product_sposob'); ?></span>
				</div>
				<div class="content_item">
					<span><?php _e('Материал', 's-cast'); ?>:</span><span><?php echo carbon_get_the_post_meta('crb_product_material'); ?></span>
				</div>
				<div class="content_item">
					<span><?php _e('Покрытие', 's-cast'); ?>:</span><span><?php echo carbon_get_the_post_meta('crb_product_pokritie'); ?></span>
				</div>
				<div class="content_item">
					<span><?php _e('Эмаль', 's-cast'); ?>:</span><span><?php echo carbon_get_the_post_meta('crb_product_emal'); ?></span>
				</div>
				<div class="content_item">
					<span><?php _e('Размер', 's-cast'); ?>:</span><span><?php echo carbon_get_the_post_meta('crb_product_razmer'); ?></span>
				</div>
				<div class="content_item">
					<span><?php _e('Толщина металла', 's-cast'); ?>:</span><span><?php echo carbon_get_the_post_meta('crb_product_tolshina'); ?></span>
				</div>
				<div class="content_item">
					<span><?php _e('Крепление', 's-cast'); ?>:</span><span><?php echo carbon_get_the_post_meta('crb_product_kreplenie'); ?></span>
				</div>
			</div>
			<div class="w-full inline-flex justify-end px-4 lg:px-0">
				<div class="content_btn btn_send flex justify-center items-center modal_click_js cursor-pointer mb-8" data-modal-id="modal_innerorder">
					<span class="mr-4"><?php _e('Рассчитать заказ', 's-cast'); ?></span>
					<img src="<?php bloginfo('template_url'); ?>/img/order-arrow.svg" alt="" width="25px" class="-mt-1">
				</div>
			</div>
		</div>
	</div>
</div>

<div class="container mx-auto">
	<h2 class="with_line mb-16">
		<?php _e( 'Другие', 's-cast' ); ?> <span class="ml-2"><?php echo $current_term_name; ?></span>
	</h2>
</div>
<div class="mb-24">
	<div class="swiper-container swiper-other_products-container other_products">
		<div class="container swiper-wrapper mx-auto">
			<?php
				$current_id = get_the_ID();
				$custom_query = new WP_Query( array( 
				'post_type' => 'products',
				'post__not_in' => array($current_id),
				'orderby' => 'date',
				'order' => 'DESC',
				'tax_query' => array(
			    array(
		        'taxonomy' => 'cats',
				    'terms' => $current_term_slug,
				    'post__not_in' => array($current_id),
		        'field' => 'slug',
		        'include_children' => true,
		        'operator' => 'IN'
			    )
				),
			));
			if ($custom_query->have_posts()) : while ($custom_query->have_posts()) : $custom_query->the_post(); ?>
				<div class="swiper-slide">
					<a href="<?php the_permalink(); ?>">
						<div class="other_products_item" style="background-image: url('<?php echo get_the_post_thumbnail_url(); ?>'); background-size: cover;">
							<div class="other_products_item_info">
								<div class="other_products_item_title">
									<?php the_title(); ?>	
								</div>	
								<div class="other_products_item_btn">
									<?php _e( 'Подробнее', 's-cast' ); ?>
								</div>
							</div>
						</div>
					</a>
				</div>
			<?php endwhile; endif; wp_reset_postdata(); ?>
		</div>
		<div class="swiper-product-prev"></div>
		<div class="swiper-product-next"></div>
	</div>
</div>

<?php endwhile; else: ?>
	<p><?php _e('Ничего не найдено'); ?></p>
<?php endif; ?>	

<?php get_footer(); ?>