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
		echo $this->Html->script('jquery.tinymce');
	?>
	
<script type="text/javascript">
	$().ready(function() {
		$('textarea.tinymce').tinymce({
			// Location of TinyMCE script
			script_url : '<?php echo $this->base ?>/app/webroot/js/tiny_mce.js',

			// General options
			theme : "advanced",
			plugins : "autolink,lists,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,advlist",

			// Theme options
			theme_advanced_buttons1 : "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,styleselect,formatselect,fontselect,fontsizeselect",
			theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
			theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",
			theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,|,styleprops,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,pagebreak",
			theme_advanced_toolbar_location : "top",
			theme_advanced_toolbar_align : "left",
			theme_advanced_statusbar_location : "bottom",
			theme_advanced_resizing : true,

			// Example content CSS (should be your site CSS)
			content_css : "css/content.css",

			// Drop lists for link/image/media/template dialogs
			template_external_list_url : "lists/template_list.js",
			external_link_list_url : "lists/link_list.js",
			external_image_list_url : "lists/image_list.js",
			media_external_list_url : "lists/media_list.js",

			// Replace values for the template plugin
			template_replace_values : {
				username : "Some User",
				staffid : "991234"
			}
		});
	});
</script>
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
	
