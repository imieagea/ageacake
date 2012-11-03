<?php  //echo $this->element('sql_dump'); ?>
<article>		
			<div class="bandeau recrut"><h1><?php echo $texte_recrutement['Post']['titre']; ?>	</h1></div>
			<div class="text_recrut"><?php echo $texte_recrutement['Post']['corps']; ?>	</div>
			<a href="<?php echo $this->base ?>/home/deposer" class="button_cv">Déposez votre CV !</a>	
<div class="clear"></div>		
			</article>
<article>			
			<div class="bandeau une">A la une: <?php echo $alaune['Post']['titre']; ?></div>
			<div class="text_une">
		<?php echo $alaune['Post']['corps']; ?>
			</div>
			<div class="clear"></div>	
</article>