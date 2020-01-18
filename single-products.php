<?php get_header(); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<div class="container mx-auto px-4 lg:px-0 py-8">
	<!-- Хлебные крошки -->
	<div class="breadcrumbs mb-6">
		<?php 
			$current_term = wp_get_post_terms(  get_the_ID() , 'cats' );
			foreach (array_slice($current_term, 0, 1) as $myterm); {
				$current_term_slug = $myterm->slug;
				$current_term_name = $myterm->name;
			} 
			if ( function_exists('pll_get_term') ) {
				$getCurrentTermId = pll_get_term($myterm->term_id);
			} else {
				$getCurrentTermId = $myterm->term_id;
			}
		?>

		<span typeof="v:Breadcrumb"> 
			<a href="<?php echo home_url(); ?>" rel="v:url" property="v:title" class="my_yellow_color">
				<?php _e( 'Главная', 's-cast' ); ?>
			</a> 
			› 
		</span>
		<span typeof="v:Breadcrumb"> 
			<a href="<?php echo get_term_link($getCurrentTermId, 'cats') ?>" rel="v:url" property="v:title" class="my_yellow_color"> 
				<?php echo $current_term_name ?> 
			</a> › 
		</span>
		<span typeof="v:Breadcrumb"> <?php the_title(); ?>  </span>
	</div>
	<div class="flex flex-col lg:flex-row mb-12">
		<div class="w-full lg:w-1/2 lg:pr-6 mb-6 lg:mb-0">
			<?php if (carbon_get_the_post_meta('crb_product_gallery')): ?>
				<ul id="lightSlider">
					<?php 
						$post_photos = carbon_get_the_post_meta('crb_product_gallery');
						foreach ( $post_photos as $post_photo ): ?>
						<?php $photo_src = wp_get_attachment_image_src($post_photo, 'large'); ?>
						<li data-thumb="<?php echo $photo_src[0]; ?>">
					    <img src="<?php echo $photo_src[0]; ?>" loading="lazy">
					  </li>
					<?php endforeach; ?>
				</ul>
			<?php else: ?>
				<img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>" class="w-full" loading="lazy">
			<?php endif; ?>
		</div>
		<div class="w-full lg:w-1/2 lg:pl-6">
			<h1 class="title text-4xl uppercase roboto-bold mb-4">
				<?php the_title(); ?>
			</h1>
			<div class="mb-4">
				<?php the_content(); ?>
			</div>
			<div>
				<div class="slider_btn inline-block">
					<div class="text-xl cursor-pointer modal_click_js" data-modal-id="modal_innerorder">
						<i class="icofont-arrow-right"></i>
						<span><?php _e( 'Заказать просчет', 's-cast' ); ?></span>
					</div>
				</div>
			</div>
		</div>
	</div>
	<h2 class="roboto-bold text-2xl uppercase text-center mb-4">
		<?php _e( 'Похожая продукция', 's-cast' ); ?>
	</h2>
	<div class="flex flex-col lg:flex-row flex-wrap px-6 lg:px-0 lg:-mx-3">
		<?php
			$current_term = wp_get_post_terms(  get_the_ID() , 'cats', array() );
			foreach ($current_term as $myterm); {
				$current_term_slug = $myterm->slug;
			}
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
			<?php get_template_part('blocks/product-item', 's-cast') ?>
		<?php endwhile; endif; wp_reset_postdata(); ?>
	</div>
</div>
<?php endwhile; else: ?>
	<p><?php _e('Ничего не найдено'); ?></p>
<?php endif; ?>	

<?php get_template_part('blocks/adv', 's-cast') ?>

<?php get_footer(); ?>