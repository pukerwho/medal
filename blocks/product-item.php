<div class="w-full lg:w-1/3 px-4 mb-4">
	<a href="<?php echo get_the_permalink(); ?>">
		<div class="product">
			<div class="product_img rounded-t-lg mb-2">
				<img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="" class="h-56 w-full object-cover rounded-t-lg">
			</div>
			<div class="product_info">
				<div class="product_title text-xl mb-2">
					<?php the_title(); ?>	
				</div>	
				<div class="line-btn inline-block">
					<a href="<?php echo get_the_permalink(); ?>">
						<i class="icofont-arrow-right"></i>
						<span><?php _e( 'Подробнее', 's-cast' ); ?></span>
					</a>
				</div>
			</div>
		</div>
	</a>
</div>