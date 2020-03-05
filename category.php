<?php get_header(); ?>

<div class="container mx-auto px-4 lg:px-0 py-8">
	
	<h1 class="with_line">
		<?php single_term_title(); ?>
	</h1>

	<!-- Список продуктов -->
	<div class="flex flex-wrap flex-col lg:flex-row justify-center -mx-0 lg:-mx-4">
		<?php $current_term = get_queried_object_id(); ?>
		<?php 
		$current_page = !empty( $_GET['page'] ) ? $_GET['page'] : 1;
		$custom_query = new WP_Query( array( 
			'post_type' => 'post', 
			'posts_per_page' => 5,
			'paged' => $current_page,
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
			<?php get_template_part('blocks/archive-item', 's-cast') ?>
		<?php endwhile; endif; wp_reset_postdata(); ?>
	</div>
	<div class="flex">
		<div class="pagination">
			<?php 
				$big = 9999999991; // уникальное число
				echo paginate_links( array(
					'format' => '?page=%#%',
					'total' => $custom_query->max_num_pages,
					'current' => $current_page,
					'prev_next' => true,
					'next_text' => (''),
					'prev_text' => (''),
				)); 
			?>
		</div>
	</div>
</div>

<?php get_footer(); ?>