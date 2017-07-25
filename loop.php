<?php
/**
 * sense template for displaying the standard Loop
 *
 * @package WordPress
 * @subpackage sense
 * @since sense 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php if ( is_singular() ) :?>
	<header>
		<h2><?php the_title(); ?> <?php the_field('bold-title'); ?></h2>
	</header>
	<?php else : ?>	
	<h1 class="post-title">

			<a href="<?php echo esc_url( get_permalink() ); ?>" rel="bookmark"><?php
				the_title(); ?><span><?php the_field('bold-title'); ?></span>
			</a>

	</h1>

	<div class="post-meta"><?php
		sense_post_meta(); ?>
	</div>

	<div class="post-content"><?php

		if ( '' != get_the_post_thumbnail() ) : ?>
			<?php the_post_thumbnail(); ?><?php
		endif; ?>

		<!-- THE EXERPT -->
		<!-- <?php if ( is_front_page() || is_category() || is_archive() || is_search() ) : ?>

			<?php the_excerpt(); ?>
			<a href="<?php the_permalink(); ?>"><?php _e( 'Read more &raquo;', 'sense' ); ?></a>

		<?php else : ?> 

			<?php the_content( __( 'Continue reading &raquo', 'sense' ) ); ?>

		<?php endif; ?>
		
		<?php
			wp_link_pages(
				array(
					'before'           => '<div class="linked-page-nav"><p>'. __( 'This article has more parts: ', 'sense' ),
					'after'            => '</p></div>',
					'next_or_number'   => 'number',
					'separator'        => ' ',
					'pagelink'         => __( '&lt;%&gt;', 'sense' ),
				)
			);
		?>
		
		-->

		
	<?php the_content(); ?>
	</div>
<?php endif; ?>
</article>