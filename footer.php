<footer class="layout-column">

	<div>
		<a class="button" href="<?php echo home_url();?>/#">Call to action</a>
	</div>

	<div class="layout-row-between-nowrap">

		<ul class="footer-links">
			<li>SAC</li>
			<li><a href="<?php echo home_url();?>/#">Link to somewhere</a></li>
			<li><a href="<?php echo home_url();?>/#">Link to somewhere</a></li>
			<li><a href="<?php echo home_url();?>/#">Link to somewhere</a></li>
		</ul>

		<ul class="footer-links">
			<li>HELP</li>
			<li><a href="<?php echo home_url();?>/#">Link to somewhere</a></li>
			<li><a href="<?php echo home_url();?>/#">Link to somewhere</a></li>
			<li><a href="<?php echo home_url();?>/#">Link to somewhere</a></li>
			<li><a href="<?php echo home_url();?>/#">Link to somewhere</a></li>
		</ul>

		<ul class="footer-links text-right">
			<li>SOCIAL</li>
			<li class="social">
				<a href="#" title="Map">
					<img src="<?php echo get_bloginfo('template_url') ?>/build/images/icon-map.svg" alt="Mapa"/>
				</a>
				<a href="#" title="Facebook">
					<img src="<?php echo get_bloginfo('template_url') ?>/build/images/icon-facebook.svg" alt="Facebook"/>
				</a>
				<a href="#" title="Instagram">
					<img src="<?php echo get_bloginfo('template_url') ?>/build/images/icon-instagram.svg" alt="Instagram"/>
				</a>
				<a href="#" title="YouTube">
					<img src="<?php echo get_bloginfo('template_url') ?>/build/images/icon-play.svg" alt="YouTube"/>
				</a>
			</li>
		</ul>
		
	</div>
 </footer>

<?php wp_footer(); ?>
</body>
</html>