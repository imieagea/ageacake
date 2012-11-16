<?php  //echo $this->element('sql_dump'); ?>
<article>		
			<div class="bandeau recrut"><h1><?php echo $texte_recrutement['Post']['titre']; ?>	</h1></div>
			<div class="text_recrut"><?php echo $texte_recrutement['Post']['corps']; ?>	</div>
			<a href="<?php echo $this->base ?>/deposer" class="button_cv">Déposez votre CV !</a>	
<div class="clear"></div>		
			</article>
<?php if(!empty($alaune['Post']['titre'])): ?>			
<article>			
			<div class="bandeau une">A la une: <?php echo $alaune['Post']['titre']; ?></div>
			<div class="text_une">
		<?php echo $alaune['Post']['corps']; ?>
		<?php if (isset($alaune['Post']['video']) && $alaune['Post']['type_video'] == 'youtube'): ?>
						<iframe width="400" height="300" src="http://www.youtube.com/embed/<?php echo $alaune['Post']['video'] ?>?fs=1&amp;feature=oembed" frameborder="0" allowfullscreen=""></iframe>
					<?php elseif(isset($alaune['Post']['video']) && $alaune['Post']['type_video'] == 'dailymotion'): ?>
						<object width="560" height="315">
						    <param name="movie" value="http://www.dailymotion.com/swf/video/<?php echo $alaune['Post']['video'] ?>?background=493D27&foreground=E8D9AC&highlight=FFFFF0"></param>
						    <param name="allowFullScreen" value="true"></param>
						    <param name="allowScriptAccess" value="always"></param>
						    <embed type="application/x-shockwave-flash" src="http://www.dailymotion.com/swf/video/<?php echo $alaune['Post']['video'] ?>?background=493D27&foreground=E8D9AC&highlight=FFFFF0" width="560" height="315" allowfullscreen="true" allowscriptaccess="always"></embed>
						</object>
					<?php endif ?>
			</div>
			<div class="clear"></div>	
</article>
<?php endif; ?>