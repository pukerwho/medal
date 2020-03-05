<?php
/*
Template Name: О НАС
*/
?>

<?php get_header(); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	<div class="p_about">
		<div class="container mx-auto px-4 lg:px-0 py-8">
			<h1 class="with_line">
				<?php the_title(); ?>	
			</h1>
			<div class="flex justify-center flex-col lg:flex-row lg:items-center">
				<div class="w-full lg:w-2/3">
					<div>
						<?php the_content(); ?>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php endwhile; else: ?>
	<p><?php _e('Ничего не найдено'); ?></p>
<?php endif; ?>	

<?php get_footer(); ?>