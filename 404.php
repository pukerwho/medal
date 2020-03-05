<?php get_header(); ?>
<div class="ups px-4 lg:px-0">
	<div>
		<div class="title">
			<b><?php _e('Ой!', 's-cast'); ?></b> <?php _e('Страница не найдена', 's-cast'); ?>
		</div>
		<li>
			<?php _e('Мы не можем найти нужную вам страницу', 's-cast'); ?>.
		</li>
		<li>
			<?php _e('Возможно она была удалена или перемещена', 's-cast'); ?>.
		</li>
		<div>
			<?php _e('Вы можете начать заново с ', 's-cast'); ?> <a href="<?php echo home_url(); ?>"><?php _e('главной страницы', 's-cast'); ?></a>
		</div>
	</div>
</div>
<?php wp_footer(); ?>
</body>
</html>