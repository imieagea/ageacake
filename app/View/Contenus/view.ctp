<?php if(isset($contenus['Contenus'])){ ?>
<article>
			<div class="bandeau recrut"><h1><?php echo h($contenus['Contenus']['titre']); ?></h1></div>
			<?php echo $contenus['Contenus']['contenu']; ?>		
</article>	
<?php }else { ?>
<article>
			<div class="bandeau recrut"><h1><?php echo h($contenus['Post']['titre']); ?></h1></div>
			<?php echo $contenus['Post']['corps']; ?>		
</article>	
<?php } ?>