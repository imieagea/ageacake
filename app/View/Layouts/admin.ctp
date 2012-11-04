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
		echo $this->Html->css('anythingslider'); 
		echo $this->Html->script('jquery.min');
		echo $this->Html->script('modernizr');
		echo $this->Html->script('jquery.anythingslider.min');
		echo $this->Html->script('ckeditor/ckeditor');
		echo $this->Html->script('ckfinder/ckfinder');
	
	?>
	
<script type="text/javascript">

CKEDITOR.editorConfig = function(config)
{
	config.language = 'fr';
	config.entities_latin = false;
	config.width = 640;
	config.height = 320;
	config.toolbar_App =
	[
	    ['Source','-','Save','Preview','-','About'],
	    ['Cut','Copy','Paste','-','Print'],
	    ['Undo','Redo','-','Find','Replace','-','SelectAll','RemoveFormat'],
	    '/',
	    ['Bold','Italic','Underline','Strike','-','Subscript','Superscript'],
	    ['NumberedList','BulletedList','-','Outdent','Indent','Blockquote'],
	    ['JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock'],
	    ['Link','Unlink','Anchor'],
	    ['Image','Flash','Table','HorizontalRule','Smiley','SpecialChar','PageBreak'],
	    '/',
	    ['Styles','Format','Font','FontSize'],
	    ['TextColor','BGColor'],
	    ['Maximize', 'ShowBlocks']
	];
	config.toolbar = 'App';
};</script>
</head>
<body>
<header id="header">
	<div id="header_content">
		<div id="logo">
		<a href="<?php echo $this->base ?>"></a>
		</div>
		<nav id="menu">
			<?php echo $this->element('menu'); ?>
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
	<div id="content" class="admincontent">
		<?php echo $this->element('menu_admin'); ?>
	<section id="contenu" class="contenu_admin">
		<?php echo $this->Session->flash(); ?>
		<?php echo $this->fetch('content'); ?>
	</section>
		<div class="clear"></div>
</div>
</div>

<footer id="footer">
	<div id="footer_content">
		<div id="socials">
			<div>Suivez-nous sur :</div>
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
$("tr:odd").css("background-color", "#FCFCFC");
});
	</script>
	
</footer>	
</body>
</html>
	
