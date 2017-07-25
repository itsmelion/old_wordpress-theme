<div id="footer">
 <footer class="container layout-row-nowrap">
	 	<div class="sense-data">
		<img src="<?php echo get_bloginfo('template_url') ?>/dist/images/logo.svg" alt="<?php bloginfo( 'name' );?>" />
		<address>
		<p>Belo Horizonte/MG<br>(##) # ####-####</p>
		<ul class="hide-lg layout-row-center">
			<li>
				<a href="about" title="Encontre sua Bike">
				<img src="<?php echo get_bloginfo('template_url') ?>/dist/images/icon-map.svg" alt="Mapa"/>
				</a>
			</li>
			<li>
				<a href="about" title="Facebook">
				<img src="<?php echo get_bloginfo('template_url') ?>/dist/images/icon-facebook.svg" alt="Facebook"/>
				</a>
			</li>
			<li>
				<a href="about" title="Instagram">
				<img src="<?php echo get_bloginfo('template_url') ?>/dist/images/icon-instagram.svg" alt="Instagram"/>
				</a>
			</li>
			<li>
				<a href="about" title="YouTube">
				<img src="<?php echo get_bloginfo('template_url') ?>/dist/images/icon-play.svg" alt="YouTube"/>
				</a>
			</li>
		</ul>
		<ul>
			<li><a href="mailto:contato@intuite.ch?cc=contato@intuite.ch&subject=Email%20Test&body=Email%20teste%20corpo">Escrever email</a></li>
			<li class="hide-lg"><a href="tel:+########">
			Adicionar aos contatos
		</a></li>
		</ul>
	</address>
	</div>
	<ul class="footer-links">
		<li><a href="about">Sobre a Sense</a></li>
		<li><a href="about">Atletas</a></li>
		<li><a href="about">Dúvidas</a></li>
		<li><a href="about">Garantia</a></li>
	</ul>
	<span class="flex"></span>
	<ul class="footer-links text-right">
		<li><a href="about">Vídeos</a></li>
		<li><a href="about">Papéis de Parede</a></li>
		<li class="social hide-sm">
			<a href="about" title="Encontre sua Bike">
				<img src="<?php echo get_bloginfo('template_url') ?>/dist/images/icon-map.svg" alt="Mapa"/>
			</a>
			<a href="about" title="Facebook">
				<img src="<?php echo get_bloginfo('template_url') ?>/dist/images/icon-facebook.svg" alt="Facebook"/>
			</a>
			<a href="about" title="Instagram">
				<img src="<?php echo get_bloginfo('template_url') ?>/dist/images/icon-instagram.svg" alt="Instagram"/>
			</a>
			<a href="about" title="YouTube">
				<img src="<?php echo get_bloginfo('template_url') ?>/dist/images/icon-play.svg" alt="YouTube"/>
			</a>
		</li>
	</ul>
 </footer>
</div>

<ul class="footer-widgets">
	<?php
	if ( function_exists( 'dynamic_sidebar' ) ) :
		dynamic_sidebar( 'footer-sidebar' );
	endif; ?>
</ul>

<?php wp_footer(); ?>

<!-- <div id="dev-footer">
	<iframe src="http://www.alia.ml/api/" frameborder="0"></iframe>
</div> -->
</body>
</html>