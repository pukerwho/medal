<?php
/*
Template Name: ТЕХНОЛОГИИ
*/
?>

<?php get_header(); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	<div class="tech pt-12 lg:pt-16">
		<div class="container mx-auto mb-20 px-4 lg:px-0">
			<div class="w-full">
				<h1 class="with_line mb-8">
					<?php the_title(); ?>
				</h1>
			</div>
			<div class="w-full lg:w-1/2">
				<?php the_content(); ?>
			</div>
		</div>
		<div class="tech_blocks">
			<?php $tech_blocks = carbon_get_the_post_meta('crb_tech_blocks');
			foreach($tech_blocks as $tech_block): ?>
				<div class="tech_block px-4 lg:px-0 mb-16 lg:mb-24">
					<div class="container mx-auto px-4 lg:px-0 mb-12">
						<h2 class="with_line">
							<?php echo $tech_block['crb_tech_block_name']; ?>
						</h2>
					</div>
					<div class="tech_block_wrap">
						<div class="container mx-auto px-4 lg:px-0">
							<div class="tech_block_content py-8">
								<?php echo $tech_block['crb_tech_block_text']; ?>
							</div>
						</div>
						<div class="tech_block_photo">
							<img src="<?php echo $tech_block['crb_tech_block_photo']; ?>" alt="">
						</div>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
<?php endwhile; else: ?>
	<p><?php _e('Ничего не найдено'); ?></p>
<?php endif; ?>	

<?php get_footer(); ?>