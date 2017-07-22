<section class="container-fluid degrade-icons">
	<div class="row">
    <ul class="justify-content-center">
		<li data-id="0">
      <a class="wave-btn wave-thing" href="#bottom-sheet0" >
				<img src="<?php echo get_bloginfo('template_url') ?><?php echo $itemSVG[0];?>">
				<span class="caption"><?php echo $itemCaption[0];?></span>
			</a>
    </li>
		<li data-id="1"><a data-id="1" href="#bottom-sheet1" class="wave-btn wave-thing">
				<img src="<?php echo get_bloginfo('template_url') ?><?php echo $itemSVG[1];?>">
				<span class="caption"><?php echo $itemCaption[1];?></span>
		</a></li>
		<li data-id="2">
    	<a data-id="2" class="wave-btn wave-thing" href="#bottom-sheet2" >
					<img src="<?php echo get_bloginfo('template_url') ?><?php echo $itemSVG[2];?>">
					<span class="caption"><?php echo $itemCaption[2];?></span>
			</a>
    </li>
	</ul>
 </div>
</section>

<div id="bottom-sheet0" class="overlay">
			<aside class="social" tabindex="-1" role="dialog" aria-labelledby="modal-label" aria-hidden="true">
				<img src="<?php echo get_bloginfo('template_url') ?><?php echo $itemSVG[0];?>">
				<h2><?php echo $itemCaption[0];?></h2>
				<p class="text-left"><?php echo $itemText[0];?></p>
				<a href="soundhunter" class="btn btn-primary">Veja mais</a>
			</aside>
	<a href="#close" class="btn-close" aria-hidden="true"><span class="sr-only">Close</span></a>
</div>
<div id="bottom-sheet1" class="overlay">
			<aside class="social" tabindex="-1" role="dialog" aria-labelledby="modal-label" aria-hidden="true">
				<img src="<?php echo get_bloginfo('template_url') ?><?php echo $itemSVG[1];?>">
				<h2><?php echo $itemCaption[1];?></h2>
				<p class="text-left"><?php echo $itemText[1];?></p>
				<a href="audio-effects" class="btn btn-primary">Veja mais</a>
			</aside>
	<a href="#close" class="btn-close" aria-hidden="true"><span class="sr-only">Close</span></a>
</div>
<div id="bottom-sheet2" class="overlay">
			<aside class="social" tabindex="-1" role="dialog" aria-labelledby="modal-label" aria-hidden="true">
				<img src="<?php echo get_bloginfo('template_url') ?><?php echo $itemSVG[2];?>">
				<h2><?php echo $itemCaption[2];?></h2>
				<p class="text-left"><?php echo $itemText[2];?></p>
				<a href="virtual-reality" class="btn btn-primary">Veja mais</a>
			</aside>
	<a href="#close" class="btn-close" aria-hidden="true"><span class="sr-only">Close</span></a>
</div>
