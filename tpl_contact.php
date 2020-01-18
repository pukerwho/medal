<?php
/*
Template Name: КОНТАКТЫ
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
		<h1 class="title roboto-bold text-4xl uppercase mb-6">
			<?php the_title(); ?>	
		</h1>
		<div class="flex flex-col lg:flex-row ">
			<div class="w-full lg:w-1/2 lg:pr-6">
				<div class="mb-6">
					<?php the_content(); ?>
				</div>
				<div class="flex items-start mb-6">
					<div class="w-1/4 my_yellow_color roboto-medium text-2xl lg:pr-3">
						<?php _e('Адрес', 's-cast') ?>
					</div>
					<div class="w-3/4 text-xl pt-1 lg:pl-3">
						<?php echo carbon_get_the_post_meta('crb_contact_address'); ?>
					</div>
				</div>
				<div class="flex mb-6">
					<div class="w-1/4 my_yellow_color roboto-medium text-2xl lg:pr-3">
						<?php _e('Телефоны', 's-cast') ?>
					</div>
					<div class="w-3/4 text-xl pt-1 lg:pl-3">
						<?php $footer_phones = carbon_get_the_post_meta('crb_contact_phones');
            foreach ($footer_phones as $footer_phone): ?>
    					<div><a href="tel:<?php echo $footer_phone['crb_contact_phone'] ?>"><?php echo $footer_phone['crb_contact_phone'] ?></a></div>
            <?php endforeach; ?>
					</div>
				</div>
				<div class="flex mb-6">
					<div class="w-1/4 my_yellow_color roboto-medium text-2xl lg:pr-3">
						<?php _e('Email', 's-cast') ?>
					</div>
					<div class="w-3/4 text-xl pt-1 lg:pl-3">
						<?php $footer_emails = carbon_get_the_post_meta('crb_contact_emails');
            foreach ($footer_emails as $footer_email): ?>
              <div>
                <a href="mailto:<?php echo $footer_email['crb_contact_email'] ?>"><?php echo $footer_email['crb_contact_email'] ?></a>
              </div>
            <?php endforeach; ?>
					</div>
				</div>
				<div class="flex">
					<div class="w-full">
						<?php echo carbon_get_the_post_meta('crb_contact_map'); ?>
					</div>
				</div>
			</div>
			<div class="w-full lg:w-1/2 lg:pl-6">
				<div class="my_bg_dark rounded-lg p-8">
					<?php 
						$form_contact = carbon_get_theme_option(
					'crb_form_contact'); 
						echo do_shortcode(''. $form_contact .'');
					?>
				</div>
			</div>
		</div>
	</div>
<?php endwhile; else: ?>
	<p><?php _e('Ничего не найдено'); ?></p>
<?php endif; ?>	

<?php get_footer(); ?>