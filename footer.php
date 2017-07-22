<?php
/**
 * alive8 template for displaying the footer
 *
 * @package WordPress
 * @subpackage alive8
 * @since alive8 1.0
 */
?>

<footer>
	<section class="text-center arrow down dark">
		<img src="<?php echo get_bloginfo('template_url') ?>/images/icons/arrow.svg" alt="Swipe up"/>
	</section>
	<div class="container">
		<div class="row d-flex justify-content-center align-items-center">

			<div id="footer-brand">
				<img src="<?php echo get_bloginfo('template_url') ?>/images/logo.svg" width="80px" height="auto" alt="logo live8"/>
			</div>

			<div class="row d-flex justify-content-center align-items-center social-links">
				<a id="instagram" href="//instagram.com/grupolive8">
					<img src="<?php echo get_bloginfo('template_url') ?>/images/icons/instagram-wave.svg">
				</a>
				<a id="facebook" href="//facebook.com/grupolive8">
					<img src="<?php echo get_bloginfo('template_url') ?>/images/icons/facebook.svg">
				</a>
			</div>

			<address>
				<p class="card-text">Belo Horizonte/MG<br>telefone: (31) 9 9581-0804</p>
				<a class="btn btn-success iconic" href="mailto:daniel@live8.com.br?cc=alexandre@live8.com.br&subject=Quero%20participar%20do%20Elenco&amp;&body=Oi%20vi%20o%20site%20de%20voces%20e%20gostaria%20de%20saber%20mais">Escrever email</a>
				<a class="btn btn-outline-success hidden-md-up iconic" href="tel:+5531995810804">
					<img src="<?php echo get_bloginfo('template_url') ?>/images/icons/whatsapp.svg">
					Adicionar aos contatos
				</a>
			</address>
			</div>
	</div>
</footer>

		<?php wp_footer(); ?>
	</body>
</html>