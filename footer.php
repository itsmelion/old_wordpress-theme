<footer>
	<div id="footer-brand">
		<img src="<?php echo get_bloginfo('template_url') ?>/images/logo.svg"
		width="80px" height="auto" alt="<?php bloginfo( 'name' );?>" />
	</div>

	<address>
		<p>Belo Horizonte/MG<br>telefone: (##) # ####-####</p>
		<a href="mailto:contato@intuite.ch?cc=contato@intuite.ch&subject=Email%20Test&body=Email%20teste%20corpo">Escrever email</a>
		<a href="tel:+########">
			<img src="<?php echo get_bloginfo('template_url') ?>/images/icons/whatsapp.svg">
			Adicionar aos contatos
		</a>
	</address>
</footer>

<ul class="footer-widgets">
	<?php
	if ( function_exists( 'dynamic_sidebar' ) ) :
		dynamic_sidebar( 'footer-sidebar' );
	endif; ?>
</ul>

<?php wp_footer(); ?>
</body>
</html>