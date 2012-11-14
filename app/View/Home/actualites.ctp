<div id="toutesactus">
<h1>Actualités</h1>
<?php if(isset($actualites[0])):?>	
	<?php foreach ($actualites as $une){
			$une['Post']['pslug'] = $une['Category']['slug'];
			$cats[$une['Category']['nom']][] = $une['Post'] ;
		}
		?>
	<?php foreach ($cats as $titre=>$cat): ?>
		<h2><?php echo h($titre); ?></h2>
		<?php
			foreach ($cat as $post) { ?>
				<article>
					<div class="bandeau recrut"><h3><?php echo h($post['titre']); ?></h3></div>
				<div>	<?php echo 	substr(strip_tags($post['corps']), 0, 150); ?>
				</div>
					<p><a href="<?php echo $this->base.'/actualites/'.$post['pslug'].'/'.$post['slug']; ?>" class="consulter" >[+] Consulter</a></p>
					<br>
					<?php if (isset($post['video']) && $post['type_video'] == 'youtube'): ?>
						<iframe width="400" height="300" src="http://www.youtube.com/embed/<?php echo $post['video'] ?>?fs=1&amp;feature=oembed" frameborder="0" allowfullscreen=""></iframe>
					<?php elseif(isset($post['video']) && $post['type_video'] == 'dailymotion'): ?>
						<object width="560" height="315">
						    <param name="movie" value="http://www.dailymotion.com/swf/video/<?php echo $post['video'] ?>?background=493D27&foreground=E8D9AC&highlight=FFFFF0"></param>
						    <param name="allowFullScreen" value="true"></param>
						    <param name="allowScriptAccess" value="always"></param>
						    <embed type="application/x-shockwave-flash" src="http://www.dailymotion.com/swf/video/<?php echo $post['video'] ?>?background=493D27&foreground=E8D9AC&highlight=FFFFF0" width="560" height="315" allowfullscreen="true" allowscriptaccess="always"></embed>
						</object>
					<?php endif ?>
				</article>	
		 <?php	}
		 ?>

	<?php endforeach; ?>
<?php endif; ?>
<!--
<p class="paging_counter">
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} sur {:pages}')
	));
	?>	</p>
<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('Précédent'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => '|'));
		echo $this->Paginator->next(__('Suivant') . ' >', array(), null, array('class' => 'next disabled'));
	?>
</div>--></div>