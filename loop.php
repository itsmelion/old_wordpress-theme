<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<form action="<?php echo esc_url( get_permalink() ); ?>" rel="bookmark">
		<button>
		<?php if ( '' != get_the_post_thumbnail() ) : ?>
			<?php the_post_thumbnail(); ?>
		<?php endif; ?>
		<h1 class="post-title"><?php the_title(); ?><span><?php the_field('bold-title'); ?></span></h1>
	</button>
	</form>
	<div class="post-meta">
		<?php sense_post_meta(); ?>
	</div>
</article>