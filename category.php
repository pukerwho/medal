<?php get_header(); ?>

<div class="container mx-auto px-4 lg:px-0 py-8">
	<!-- Хлебные крошки -->
	<div class="breadcrumbs mb-6">
		<?php 
			$current_term_id = get_queried_object()->term_id; 
			if ( function_exists('pll_get_term') ) {
				$getCurrentTermId = pll_get_term($current_term_id);
			} else {
				$getCurrentTermId = $current_term_id;
			}
		?>
		<!-- Проверяем parent term или child term -->
		<?php 
			$term = get_term_by('slug', get_query_var('term'), 'cats');
			if((int)$term->parent)
			  $current_term_is = 'child';
			else
				$current_term_is = 'parent';
		?>

		<span typeof="v:Breadcrumb"> 
			<a href="<?php echo home_url(); ?>" rel="v:url" property="v:title" class="my_yellow_color">
				<?php _e( 'Главная', 's-cast' ); ?>
			</a> 
			› 
		</span>
		<?php if($current_term_is == 'child'): ?>
			<span typeof="v:Breadcrumb">
				<?php 
					$ancestors = get_ancestors( $getCurrentTermId, 'cats' );
					foreach($ancestors as $ancestor); {
						$parent_term_data = get_term($ancestor, 'cats');
						$parent_name = $parent_term_data->name;
						$parent_link = get_term_link($parent_term_data);
						echo '<a href="' . $parent_link .'" rel="v:url" property="v:title" class="my_yellow_color">' . $parent_name . '</a> › ';
					}
				?>
			</span>
		<?php endif; ?>
		<span typeof="v:Breadcrumb"> <?php single_term_title(); ?>  </span>
	</div>
	<h1 class="title text-4xl uppercase roboto-bold mb-4">
		<?php single_term_title(); ?>
	</h1>
	
	<!-- Выводим для child всех child -->
	<?php if($current_term_is == 'child'): ?>
		<?php $get_parent_terms_data = get_terms('cats', array( 'parent' => $ancestor, 'hide_empty' => false )); ?>
		<div class="lg:flex -mx-4 mb-6">
			<?php foreach($get_parent_terms_data as $get_parent_term_data): ?>
				<div class="px-4">
					<a href="<?php echo get_term_link( $get_parent_term_data) ?>" class="term_child_link">
						<?php echo $get_parent_term_data->name; ?>
					</a>
				</div>
			<?php endforeach; ?>
		</div>
	<?php endif; ?>

	<!-- Список продуктов -->
	<div class="flex flex-wrap flex-col lg:flex-row -mx-4">
		<?php $current_term = get_queried_object_id(); ?>
		<?php 
		global $wp_query, $wp_rewrite;  
		// $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
		$wp_query->query_vars['paged'] > 1 ? $current = $wp_query->query_vars['paged'] : $current = 1;
		$custom_query = new WP_Query( array( 
			'post_type' => 'post', 
			'posts_per_page' => 15,
			'paged' => $current,
			'orderby' => 'date',
			'order' => 'DESC',
			'tax_query' => array(
		    array(
	        'taxonomy' => 'category',
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

<?php get_footer(); ?>