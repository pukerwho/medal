<?php get_header(); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	<div class="container mx-auto px-4 lg:px-0 py-12">
		<!-- Хлебные крошки -->
		<div class="breadcrumbs mb-6">
			<span typeof="v:Breadcrumb"> 
				<a href="<?php echo home_url(); ?>" rel="v:url" property="v:title" class="my_yellow_color">
					<?php _e( 'Главная', 's-cast' ); ?>
				</a> 
				› 
			</span>
			<span typeof="v:Breadcrumb"> <?php the_title(); ?>  </span>
		</div>
		<h1 class="title roboto-bold text-4xl uppercase mb-6">
			<?php the_title(); ?>	
		</h1>
		<div class="w-full mb-12">
			<div class="single_photo w-full float-left lg:w-1/3 p-8 pb-4">
				<img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="" class="w-full">
			</div>
			<div class="my_bg_dark rounded-lg p-8">
				<?php the_content(); ?>
			</div>
		</div>
		<div class="w-full">
			<h2 class="roboto-bold text-center text-3xl uppercase mb-6">Другие новости</h2>
			<?php 
				$current_term = get_the_category();
				foreach ($current_term as $myterm); {
					$current_term_slug = $myterm->cat_ID;
				}
			?>
			<?php 
				$current_id = get_the_ID();
				$custom_query = new WP_Query( array( 
				'post_type' => 'post', 
				'posts_per_page' => 3,
				'post__not_in' => array($current_id),
				'cat' => $current_term_slug
			) );
			if ($custom_query->have_posts()) : while ($custom_query->have_posts()) : $custom_query->the_post(); ?>
				<?php get_template_part('blocks/product-item', 's-cast') ?>
			<?php endwhile; endif; wp_reset_postdata(); ?>
			</div>
		</div>
	</div>
<?php endwhile; else: ?>
	<p><?php _e('Ничего не найдено'); ?></p>
<?php endif; ?>	

<?php get_footer(); ?>