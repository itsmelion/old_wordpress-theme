<?php get_header(); ?>

<div class="layout-row-nowrap" style="margin-top: 48pt">
	<section class="page-content primary wrap" role="main" >
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
</div>

<?php get_footer(); ?>