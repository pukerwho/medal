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
		<div class="w-full">
			<div class="my_bg_dark rounded-lg p-8">
				<?php the_content(); ?>
			</div>
		</div>
	</div>
<?php endwhile; else: ?>
	<p><?php _e('Ничего не найдено'); ?></p>
<?php endif; ?>	

<?php get_footer(); ?>