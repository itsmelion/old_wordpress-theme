<?php get_header(); ?>

<?php if ( '' != get_custom_header()->url ) : ?>
<style>
	.get_custom_header{
		background-size: cover;
		background-image: url('<?php header_image(); ?>');
		background-repeat: no-repeat;
		background-position: center;
		background-attachment: fixed;
	}
</style>
<?php endif; ?>

<header class="layout-row-around-center get_custom_header">

	<div class="flex text-center">
		<img src="<?php echo get_bloginfo('template_url') ?>/dist/images/linha2018.svg" alt="Linha 2018"/>
	</div>
	<div class="flex"></div>

</header>


<div class="container">
	<section class="layout-row-nowrap video-section">
	<div class="rec flex-nogrow">
		<div class="layout-row-nowrap-start smcenter">
			<div class="flex-none rec-pulse-container">
				<div class="rec-pulse">
					<span></span>
					<span></span>
					<span></span>
				</div>
			</div>
			<div class="rec-title flex-nogrow"><h2>REC<span>ORDS</span></h2></div>
		</div>
		<p>Acompanhe a jornada INSANA do nosso campeão descendo uma rampa radical na Serra do Cipó, em Minas Gerais</p>
	</div>
	<div class="flex-grow">

		<div class="videoWrapper">
			<iframe src="https://www.youtube.com/embed/Uvf392E5Y70?&theme=dark&autohide=1&modestbranding=0&showinfo=0&rel=0&iv_load_policy=3?ecver=1"frameborder="0"></iframe>
		</div>

	</div>
	</section>
</div>

<!-- <section class="page-content primary" role="main">
	<?php
		if ( have_posts() ) :
			while ( have_posts() ) : the_post();
				get_template_part( 'loop', get_post_format() );
			endwhile;
		else :
			get_template_part( 'loop', 'empty' );
		endif;
	?>
	
</section> -->

<?php get_footer(); ?>