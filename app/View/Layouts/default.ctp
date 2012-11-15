<!DOCTYPE HTML>
<html lang="fr-FR">
<head>
	<meta charset="UTF-8">
	<title>
		<?php echo $title_for_layout; ?>
	</title>
	<?php
		echo $this->Html->meta('icon');

		echo $this->Html->css('style');
	
		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->Html->css('anythingslider'); 
		echo $this->Html->script('jquery.min');
		echo $this->Html->script('modernizr');
		echo $this->Html->script('jquery.anythingslider.min');
	?>
</head>
<body>
<header id="header">
	<div id="header_content">
		<div id="logo">
		<a href="<?php echo $this->base.'/' ?>"></a>
		</div>
		<nav id="menu">
			<?php echo $this->element('menu'); ?>
		</nav>
		<!--
		<div id="add_this">
				<ul>
					<li><a href="" id="add_t"></a></li>
					<li><a href="" id="add_g"></a></li>
					<li><a href="" id="add_f"></a></li>
				</ul>
		</div>
		-->
	</div>	
</header>
<div id="content_wrapper">
	<div id="content">
	<section id="contenu">
		<?php echo $this->Session->flash(); ?>

			<?php echo $this->fetch('content'); ?>
	</section>
	<?php echo $this->element('sidebar'); ?>
		<div class="clear"></div>
</div>
</div>
<footer id="footer">
	<div id="footer_content">
		<div id="socials">
			<div>Suivez-nous sur :</div>
			<a href="http://www.facebook.com/pages/AGEA-Pays-de-la-Loire/401915993206192" id="page_fb">Notre page Facebook</a>
			<a href="https://www.youtube.com/channel/UCeV4ojzqOH0ECF9gnkQJZHg" id="chaine_ytb">Notre chaine Youtube</a>
		</div>
		<div id="slogan">
		AGENT GENERAL D'ASSURANCE ON ASSURE MIEUX QUAND ON CONNAIT BIEN
		</div>
		<div id="address"><address>© ageapaysdelaloire.fr   -   4, Rue De l'Héronnière   -   44000 Nantes  |  </address><a href="<?php echo $this->base ?>/mentions-legales">Mentions légales</a></div>
		
	</div>
	<script type="text/javascript">
	jQuery(function($){ 
 $('#list_actus') 
  .anythingSlider({ 
   toggleControls : true, 
   theme          : 'min',  
    buildArrows         : true,      // If true, builds the forwards and backwards buttons 
	buildNavigation     : true,      // If true, builds a list of anchor links to link to each panel 
	buildStartStop      : false,  
toggleControls      : false,
 autoPlay            : true,    
  pauseOnHover        : true,
  hashTags            : false,
    delay               : 3000
  }) 
 
});
	</script>
	
</footer>	
</body>
</html>
	
