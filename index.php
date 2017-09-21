<?php get_header(); ?>

<section class="page-content layout-row-center wrap" role="main" >
<?php $query = new WP_Query( 'cat=-11' ); ?>
	<?php if ( $query->have_posts() ):
			while ( $query->have_posts() ) : $query->	the_post();
				get_template_part( 'loop', get_post_format() );
			endwhile;
		else :
			get_template_part( 'loop', 'empty' );
	endif;?>
</section>

<?php get_footer(); ?>