<?php
/**
 * sense template for displaying Search-Results-Pages
 *
 * @package WordPress
 * @subpackage sense
 * @since sense 1.0
 */

get_header(); ?>

<section class="search-title tecnologia-h1">
	<h1><?php printf( __( 'Search Results for: %s', 'sense' ), get_search_query() ); ?></h1>

	<div class="second-search">
		<p>
			<?php _e( 'Not what you searched for? Try again with some different keywords.', 'sense' ); ?>
		</p>

		<?php get_search_form(); ?>
	</div>
</section>

<section class="page-content primary" role="main">
	<?php if ( have_posts() ) : ?>
	<?php

		while ( have_posts() ) : the_post();

			get_template_part( 'loop', get_post_format() );

			wp_link_pages(
				array(
					'before'           => '<div class="linked-page-nav"><p>' . sprintf( __( '<em>%s</em> is separated in multiple parts:', 'sense' ), get_the_title() ) . '<br />',
					'after'            => '</p></div>',
					'next_or_number'   => 'number',
					'separator'        => ' ',
					'pagelink'         => __( '&raquo; Part %', 'sense' ),
				)
			);
		endwhile;
		else :
			get_template_part( 'loop', 'empty' );
		endif;
	?>

</section>

<?php get_footer(); ?>