<?php get_header(); ?>

<?php $frontHero = get_field('galeria-home_wide', 'option'); ?>

<header id="header-carroussel">
  <?php foreach( $frontHero as $image ): ?>
    <div class="home-swipe" style="background-image: url('<?php echo $image['sizes']['large']; ?>')">
    </div>
		<?php endforeach; ?>

		<h1>Header</h1>

</header>


<?php get_footer(); ?>