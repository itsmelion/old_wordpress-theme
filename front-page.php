<?php get_header(); ?>

<header class="layout-column-center">

	<?php if ( '' != get_custom_header()->url ) : ?>
		<img src="<?php header_image(); ?>" class="custom-header" height="<?php echo get_custom_header()->height; ?>" width="<?php echo get_custom_header()->width; ?>" alt="" />
	<?php endif; ?>

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