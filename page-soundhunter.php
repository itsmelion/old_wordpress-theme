<?php /* Template Name: Sound Hunter */ ?>
<?php 
/*
 * Pages
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
<?php $background = get_field('bg'); if( $background ): ?>
<style>
#headerhunter2{
	background-image: url('<?php echo $bg; ?>') !important;
	@media screen and (max-width: 720px){
		background-image: url('<?php echo $bg_mobile; ?>') !important;
	};
}
</style>
 <header id="headerhunter2" class="d-flex flex-column align-items-center justify-content-center">
 	<div class="lead text-center">
		<h1 class="display"><?= get_the_title() ?></h1>
		<h3><?= $fields['subtitulo']; ?></h3>
	</div>
 </header>
<?php endif; ?>
<?php if( !$background ): ?>
 <header id="headerhunter" class="d-flex flex-column align-items-center justify-content-center">
 	<div class="lead text-center">
		<h1 class="display"><?= get_the_title() ?></h1>
		<h3><?= $fields['subtitulo']; ?></h3>
	</div>
 </header>
 <?php endif; ?>

<div class="tip">
	<img src="<?php echo get_bloginfo('template_url') ?>/images/icons/soundhunter.svg" alt="soundwave" />
	<article class="d-flex flex-column align-items-stretch align-content-stretch">
		<h3 style="padding-right: 90px "><?= $fields['o_que_e_soundhunter']; ?></h3>
		<p>
			<?= $fields['sound_hunter_descricao']; ?>
		</p>
	</article>
</div>

<div class="container">
	<div class="row">
			<div class="col-md-12 text-center" style="margin-top: 3em">
				<h1>Como Funciona?</h1>
				<p style="margin: 1rem .5rem">É bem simples, são 3 etapas te oferecer a melhor experiencia possível.</p>
			</div>
	</div>
</div>

<?php $edgeColor = '#eaeaea';
	include( locate_template( 'partials/wave.php', false, false ) );
?>

<div class="container">
	<?php include( locate_template( 'partials/applecards.php', false, false ) ); ?>

	<div class="row text-center" style="margin-top: 2em; margin-bottom: 2em;">
		<div class="col-md-12">
			<a class="btn btn-primary btn-block" href="#joinCast">
				Eu tenho uma banda
			</a>
		</div>
	</div>

</div>

<?php include( locate_template( 'partials/combo.php', false, false ) ); ?>

<div id="joinCast" class="overlay">
		<aside class="social text-center" tabindex="-1" role="dialog" aria-labelledby="modal-label" aria-hidden="true">
			<h2 class="m-3">Entre pro time!</h2>
			<p class="text-left">Inscreva a sua banda, seja visto!
				<br>Nós temos uma excelente infraestrutura para os seus shows,
				e conosco voce ganha mais visibilidade</p>
			<a class="btn btn-primary" href="mailto:daniel@live8.com.br?cc=alexandre@live8.com.br&subject=Quero%20participar%20do%20Elenco&amp;&body=Oi%20vi%20o%20site%20de%20voces%20e%20gostaria%20de%20saber%20mais">
				Entre em contato
			</a>
			<img src="<?php echo get_bloginfo('template_url') ?>/images/soundhunter/i-want-you.png" alt="Queremos você!">
		</aside>
		<a href="#close" class="btn-close" aria-hidden="true"><span class="sr-only">Close</span></a>
</div>

<?php include( locate_template( 'partials/arrow-swipe.php', false, false ) ); ?>

<?php get_footer(); ?>