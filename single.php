<?php get_header(); ?>

<?php if ( have_posts() ) : the_post();
	get_template_part( 'loop', 'overview' ); ?>
	
<?php else : get_template_part( 'loop', 'empty' ); endif;	?>

<?php get_footer(); ?>