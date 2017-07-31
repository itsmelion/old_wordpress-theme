<?php if ( is_singular() ) :?>
<?php $image = get_field('hero');?>
<style>
	header#post-<?php the_ID(); ?>{
		background-image: url('<?php echo $image['url']; ?>');
	}
	@media screen and (max-width: 48.9em){
		header#post-<?php the_ID(); ?>{
			max-height: <?php echo $image['sizes'][ 'medium_large-height' ];?>px;
			background-image: url('<?php echo $image['sizes'][ 'medium' ];?>');
		}
	}
</style>
<header id="post-<?php the_ID(); ?>" class="post-header">
	<div class="flex-initial"><h1><?php the_title(); ?><?php the_field('bold-title'); ?></h1></div>
</header>

<aside id="NAV-OVERVIEW">
	<li>Dropdown pra outras páginas</li>
	<li><?php the_title(); ?><?php the_field('bold-title'); ?></li>
	<li>Especificações</li>
	<li>Geometria</li>
	<li>Tecnologia</li>
	<li>Galeria</li>
	<li>Mais produtos</li>
</aside>

<section id="BIKE-OVERVIEW" class="layout-row-between wrap">

	<div class="overview-paragraph">
		<div class="paragraph-title">
			<?php if( get_field('arte_do_titulo') ) : ?>
			<img src="<?php the_field('arte_do_titulo'); ?>" />
			<?php endif; ?>
			<?php if ( the_field('Bikename') ) : ?>
			<h2><?php the_field('Bikename'); ?></h2>
			<?php endif; ?>
		</div>
		<div class="paragraph-description">
			<?php if ( !the_field('descricao_ou_imagem' && !the_field('description')) ) : ?>
			<?php the_content(); ?>
			<?php endif; ?>
			<?php if ( the_field('descricao_ou_imagem	') ) : ?>
			<img src="<?php the_field('imagem_da_descricao'); ?>">
			<?php else : ?> 
			<p><?php the_field('description'); ?></p>
			<?php endif; ?>
		</div>
	</div>


<!-- ######## ADD ZOOM ####### -->
<article>
	<div class="color-picker">
	<?php if( have_rows('bike_color') ): ?>
	<?php while( have_rows('bike_color') ): the_row(); 

		$img = get_sub_field('foto');
		$color = get_sub_field('cor');

	?>
		<img src="<?php echo $img; ?>" class="bike-color" />
	

	<?php endwhile; ?>

	<ol class="layout-row">
		<?php while( have_rows('bike_color') ): the_row(); 
			$color = get_sub_field('cor');
		?>	
		<li><span style="background-color: <?php echo $color; ?>"></span></li>
		<?php endwhile; ?>
	</ol>
	<?php endif; ?>

</div>
</article>

</section>

<section id="SPECS" class="layout-column">
	<ul>
		<li>NAO USAR ABA Especificações</li>
		<li>Geometria</li>
	</ul>

<div class="container spec-parent">
<div id="especificacoes">
 <h2>no content</h2>
</div>

<div id="geometria">
	<table>
		<tbody>
	<?php if( have_rows('geometry') ): ?>
	<?php while( have_rows('geometry') ): the_row(); 

		$letra = get_sub_field('letra');
		$nome = get_sub_field('nome');
		$val1 = get_sub_field('valor_1');
		$val2 = get_sub_field('value_2');

	?>
			<tr>
				<td><?php echo $letra; ?></td>
				<td><?php echo $nome; ?></td>
				<td><?php echo $val1; ?></td>
				<td><?php echo $val2; ?></td>
			</tr>
	<?php endwhile; ?>
	<?php endif; ?>
		</tbody>
	</table>
</div>
</div>

</section>

<section id="GALERIA">
	GALERIA
</section>

<section>
 OOUTRAAS BIKES
</section>

<?php endif; ?>