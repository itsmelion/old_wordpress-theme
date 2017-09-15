<?php get_header(); ?>

<section class="page-content primary" role="main">
		
	<?php if ( have_posts() ) : the_post();	get_template_part( 'loop' ); ?>

	<aside class="post-aside">
		<?php	wp_link_pages(
			array(
				'before'           => '<div class="linked-page-nav"><p>' . sprintf( __( '<em>%s</em> is separated in multiple parts:', 'sense' ), get_the_title() ) . '<br />',
				'after'            => '</p></div>',
				'next_or_number'   => 'number',
				'separator'        => ' ',
				'pagelink'         => __( '&raquo; Part %', 'sense' ),
			)
		); ?>
	</aside>
	<?php	else : get_template_part( 'loop', 'empty' ); endif; ?>

</section>

<?php get_footer(); ?>