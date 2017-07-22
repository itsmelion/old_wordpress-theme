<?php
/**
 * alive8 template for displaying the standard Loop
 *
 * @package WordPress
 * @subpackage alive8
 * @since alive8 1.0
 */
?>

<!--
	the_permalink(); == get the post link
-->
<?php $fields = get_fields(get_the_ID()); ?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="post-content">
		<?php if ( '' != get_the_post_thumbnail() ) : ?>
			<?php the_post_thumbnail(); ?>
		<?php endif; ?>
		<h1></h1>
		<img src="<?= $fields['bigPicture']; ?>" width="80%" height="auto"/>

		<?php the_content( __( 'Continue reading &raquo', 'alive8' ) ); ?>

	</div>

</article>