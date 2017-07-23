<?php get_header(); ?>

<?php if ( '' != get_custom_header()->url ) : ?>
<style>
	.get_custom_header{
		background-size: cover;
		background-image: url('<?php header_image(); ?>');
		background-repeat: no-repeat;
		background-position: center;
	}
</style>
<?php endif; ?>

<header class="layout-column-center get_custom_header">

	<div class="flex-initial">
		<a title="<?php bloginfo( 'name' );?>">
		<img src="<?php echo get_bloginfo('template_url') ?>/dist/images/logo.svg" alt="<?php bloginfo( 'name' );?>" />
		</a>

		<a href="<?php echo home_url(); ?>" title="<?php bloginfo( 'name' ); ?>">
		<h1 class="blog-name"><?php bloginfo( 'name' ); ?></h1>
		<h3 class="blog-description"><?php bloginfo( 'description' ); ?></h3>
		</a>
	</div>

</header>

<section class="page-content primary" role="main">
	<?php
		if ( have_posts() ) :
			while ( have_posts() ) : the_post();
				get_template_part( 'loop', get_post_format() );
			endwhile;
		else :
			get_template_part( 'loop', 'empty' );
		endif;
	?>
	<div class="pagination">
		<?php get_template_part( 'template-part', 'pagination' ); ?>
	</div>
</section>

<?php get_footer(); ?>