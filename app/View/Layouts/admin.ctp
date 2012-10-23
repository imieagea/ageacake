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
		echo $this->fetch('script');
	?>
</head>
<body>
<header id="header">
	<div id="header_content">
		<div id="logo">
		<a href=""></a>
		</div>
		<nav id="menu">
		
			
		</nav>
		<div id="add_this">
				<ul>
					<li><a href="" id="add_t"></a></li>
					<li><a href="" id="add_g"></a></li>
					<li><a href="" id="add_f"></a></li>
				</ul>
		</div>
	</div>	
</header>
<div id="content_wrapper">
	<div id="content">
	<section id="contenu">
		<?php echo $this->Session->flash(); ?>

			<?php echo $this->fetch('content'); ?>
	</section>
		<div class="clear"></div>
</div>
</div>
<footer id="footer">
	<div id="footer_content">
		<div id="socials">
			<div>Suivez-nous sur:</div>
			<a href="" id="page_fb">Notre page Facebook</a>
			<a href="" id="chaine_ytb">Notre chaine Youtube</a>
		</div>
		<div id="slogan">
		AGENT GENERAL D'ASSURANCE ON ASSURE MIEUX QUAND ON CONNAIT BIEN
		</div>
		<div id="address"><address>© ageapaysdelaloire.fr   -   4, Rue De l'Héronnière   -   44000 Nantes  |  </address><a href="">Mentions légales</a></div>
		
	</div>
	<script type="text/javascript">
	$(function(){ 
 $('#list_actus') 
  .anythingSlider({ 
   toggleControls : true, 
   theme          : 'min',  
    buildArrows         : false,      // If true, builds the forwards and backwards buttons 
	buildNavigation     : true,      // If true, builds a list of anchor links to link to each panel 
	buildStartStop      : false,  
toggleControls      : false,
 autoPlay            : false,    
  pauseOnHover        : true,
  hashTags            : false,
    delay               : 5000
  }) 
 
});
	</script>
	
</footer>	
</body>
</html>
	
