<?php
/*
Template Name: О НАС
*/
?>

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
		<div class="flex flex-col lg:flex-row lg:items-center my_bg_dark rounded-lg">
			<div class="w-full lg:w-1/2">
				<img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>" class="h-full object-cover" loading="lazy">
			</div>
			<div class="w-full lg:w-1/2 p-6 lg:px-12 lg:py-8">
				<h1 class="title roboto-bold text-4xl uppercase mb-6">
					<?php the_title(); ?>	
				</h1>
				<div>
					<?php the_content(); ?>
				</div>
			</div>
		</div>
	</div>
<?php endwhile; else: ?>
	<p><?php _e('Ничего не найдено'); ?></p>
<?php endif; ?>	

<?php get_footer(); ?>