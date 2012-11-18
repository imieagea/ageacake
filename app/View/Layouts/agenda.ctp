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
		<div id="monSlider">
			<ul>
				<?php foreach ($images as $i): ?>
					<li>
						<img src="<?php echo $this->base?>/app/webroot/img/<?php echo $i['Image']['src'] ?>">
					</li>
				<?php endforeach ?>
			</ul>
		</div>
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
	<?php echo $this->element('sidebar_agenda'); ?>
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
	var cpt = 0;
	function slide()
	{

		$('#monSlider ul li').each(function(){
			var p = $(this).position();
			if(p.left <= -280)
			{
				$(this).css('left',((cpt-1)*280)+"px");
			}
			var p = $(this).position();
			$(this).animate({
				position : 'absolute',
				left: (p.left-280)+'px'
			},2000);
		});

		setTimeout('slide()',4000);
	}

	function dispose () {
		$('#monSlider ul').css('width',$('#header').width()+"px");
		
		$('#monSlider ul li').each(function(){
			$(this).css('left',(cpt*280)+'px');
			cpt++;
		});
	}

	$(document).ready(function () {
		dispose();
		slide();
	});
	</script>
	
</footer>	
</body>
</html>
	
