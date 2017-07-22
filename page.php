<?php
/**
 * alive8 template for displaying Pages
 *
 * @package WordPress
 * @subpackage alive8
 * @since alive8 1.0
 */

get_header(); ?>

	<section class="page-content primary" role="main">
		<?php
			if ( have_posts() ) : the_post();

				get_template_part( 'loop' ); ?>
		<?php
			else :

				get_template_part( 'loop', 'empty' );

			endif;
		?>

	</section>

<?php get_footer(); ?>