<div id="toutesactus">
<h1>Actions</h1>
<?php if(isset($actions[0])):?>	
	<?php foreach ($actions as $une){
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
					<p><a href="<?php echo $this->base.'/actions/'.$post['pslug'].'/'.$post['slug']; ?>" class="consulter" >[+] Consulter</a></p>
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