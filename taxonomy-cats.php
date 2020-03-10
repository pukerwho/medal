<?php get_header(); ?>

<div class="cats">
	<div class="container mx-auto px-4 mb-8 lg:px-0 py-8">
		<h1 class="cats_title">
			<?php echo carbon_get_term_meta( get_queried_object_id(), 'crb_term_title' ); ?>
		</h1>
		<div class="order-string flex items-center modal_click_js cursor-pointer mb-8" data-modal-id="modal_order"> 
			<span class="mr-4 mt-1"><?php _e('Заказать просчет', 's-cast'); ?> </span>
			<img src="<?php bloginfo('template_url'); ?>/img/secondary-arrow.svg" alt="" width="25px">
		</div>

		<!-- Список продуктов -->
		<div class="flex flex-wrap flex-col lg:flex-row -mx-4">
			<?php $current_term = get_queried_object_id(); ?>
			<?php 
			global $wp_query, $wp_rewrite;  
			// $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
			$wp_query->query_vars['paged'] > 1 ? $current = $wp_query->query_vars['paged'] : $current = 1;
			$custom_query = new WP_Query( array( 
				'post_type' => 'products', 
				'posts_per_page' => -1,
				'paged' => $current,
				'orderby' => 'date',
				'order' => 'DESC',
				'tax_query' => array(
			    array(
		        'taxonomy' => 'cats',
				    'terms' => $current_term,
		        'field' => 'term_id',
		        'include_children' => true,
		        'operator' => 'IN'
			    )
				),
			));
			if ($custom_query->have_posts()) : while ($custom_query->have_posts()) : $custom_query->the_post(); ?>
				<?php get_template_part('blocks/product-item', 's-cast') ?>
			<?php endwhile; endif; wp_reset_postdata(); ?>
		</div>
	</div>
	<!-- Второй экран -->
	<div class="about">
		<div class="container mx-auto px-4">
			<h2 class="with_line">
				<span>
					<?php echo carbon_get_term_meta( get_queried_object_id(), 'crb_term_titletext' ); ?>
				</span>
			</h2>
		</div>
		<div class="about_photo hidden lg:flex lg:pr-6">
			<img src="<?php echo carbon_get_term_meta( get_queried_object_id(), 'crb_term_photo' ); ?>" alt="" loading="lazy" class="w-full h-full object-cover">
		</div>
		
		<div class="container mx-auto px-4 lg:px-0">
			<div class="about_content lg:pl-6">
				<div class="about_photo block lg:hidden mb-8">
					<img src="<?php echo carbon_get_term_meta( get_queried_object_id(), 'crb_term_photo' ); ?>" alt="" loading="lazy" class="w-full h-full object-cover">
				</div>
				<div class="mb-8">
					<?php echo apply_filters( 'the_content', carbon_get_term_meta( get_queried_object_id(), 'crb_term_seotext' ) ); ?>
				</div>				
				<div class="about_more flex justify-center lg:justify-end items-center modal_click_js cursor-pointer" data-modal-id="modal_order">
					<span class="mr-4 mt-1"><?php _e('Заказать просчет', 's-cast'); ?> </span>
					<img src="<?php bloginfo('template_url'); ?>/img/secondary-arrow.svg" alt="" width="25px">
				</div>
			</div>
		</div>
		<img src="<?php echo carbon_get_term_meta( get_queried_object_id(), 'crb_term_photo' ); ?>" alt="" class="about_bg">
	</div>
</div>
<?php get_footer(); ?>