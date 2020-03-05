<div class="w-full lg:w-1/3 px-4 mb-8">
	<a href="<?php echo get_the_permalink(); ?>">
		<div class="product" style="background-image: url('<?php echo get_the_post_thumbnail_url(); ?>'); background-size: cover;">
			<div class="product_info">
				<div class="product_info_title">
					<?php the_title(); ?>	
				</div>	
				<div class="product_info_btn">
					<?php _e( 'Подробнее', 's-cast' ); ?>
				</div>
			</div>
		</div>
	</a>
</div>