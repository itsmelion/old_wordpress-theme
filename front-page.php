<?php get_header(); ?>
<header class="home text-center">
	<a class="logo" title="<?php bloginfo( 'name' );?>">
		<img src="<?php echo get_bloginfo('template_url') ?>/images/logo.svg" alt="<?php bloginfo( 'name' );?>" width="125px" height="auto" />
	</a>
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