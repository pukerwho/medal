<div class="w-full lg:w-5/6 item mb-8">
	<a href="<?php the_permalink(); ?>" class="flex flex-col lg:flex-row">
		<div class="item_img w-full lg:w-1/4">
			<img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="">
		</div>
		<div class="item_content w-full lg:w-3/4">
			<div class="item_title">
				<?php the_title(); ?>
			</div>
			<div class="item_description">
				<?php echo wp_trim_words( get_the_content(), 55, '...' ); ?>
			</div>
			<div class="item_more">
				<?php _e('Подробнее', 's-cast'); ?>
			</div>
		</div>
	</a>
</div>