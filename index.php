<?php get_header(); ?>

	<section class="page-content layout-row-center wrap" role="main" >
		<?php
			if ( have_posts() ):

				while ( have_posts() ) : the_post();

					get_template_part( 'loop', get_post_format() );

				endwhile;

			else :

				get_template_part( 'loop', 'empty' );

			endif;
		?>
	
	</section>

<?php get_footer(); ?>