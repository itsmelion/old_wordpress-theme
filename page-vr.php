<?php /* Template Name: VirtualReality  */ ?>
<?php 
 /** 
 *
 * @package WordPress
 * @subpackage alive8
 * @since alive8 1.0
 */
?>
<?php get_header(); ?>
<?php
	$fields = get_fields(get_the_ID());
	the_post();
?>
<?php $applecard = get_fields('video'); ?>
<?php $background = get_field('bg'); if( $background ): ?>
<style>
#headerVR2{
	background-image: url('<?php echo $bg; ?>') !important;
	@media screen and (max-width: 720px){
		background-image: url('<?php echo $bg_mobile; ?>') !important;
	};
}
</style>
<header id="headerVR2" class="d-flex flex-column align-items-start justify-content-center">
 	<div class="lead">
		<h1 class="display"><?= get_the_title() ?></h1>
		<h3><?= $fields['subtitulo']; ?></h3>
		<p><?= $fields['paragrafo_cabeçalho']; ?></p>
	</div>
 </header>
<?php endif; ?>
<?php if( !$background ): ?>
<header id="headerVR" class="d-flex flex-column align-items-start justify-content-center">
 	<div class="lead">
		<h1 class="display"><?= get_the_title() ?></h1>
		<h3><?= $fields['subtitulo']; ?></h3>
		<p><?= $fields['paragrafo_cabeçalho']; ?></p>
	</div>
 </header>
<?php endif; ?>

<div class="container">

<section id="insight360">
	<div class="row">
		<div class="col-md-12 text-center" style="margin-top: 2em">
			<h1><?= $fields['sessao-titulo']; ?></h1>
			<p style="margin: 1rem .5rem"><?= $fields['sessao-texto']; ?></p>
		</div>
		<div class="col-md-12 text-center">
			<img id="box-closed" src="<?php echo get_bloginfo('template_url') ?>/images/vr/1.png" alt="oculos <?php bloginfo( 'name' );?>" />
			<img id="box-open" src="<?php echo get_bloginfo('template_url') ?>/images/vr/2.png" alt="oculos <?php bloginfo( 'name' );?>" />
		</div>
	</div>
</section>

<div class="row">
	<div class="col text-center" style="margin-top: 3em">
		<h2>Exemplos</h2>
		<p>Veja abaixo alguns vídeos 360º</p>
	</div>
</div>

<?php include( locate_template( 'partials/applecards.php', false, false ) ); ?>

</div>


<?php include( locate_template( 'partials/combo.php', false, false ) ); ?>
<?php include( locate_template( 'partials/arrow-swipe.php', false, false ) ); ?>


<?php get_footer();?>