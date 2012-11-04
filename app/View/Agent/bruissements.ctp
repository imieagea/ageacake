<div id="toutesactus">
<h1>Bruissements de chambre</h1>
<?php if(isset($bruissements[0])):?>	
	<?php foreach ($bruissements as $une){
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
				<div class="consulter bruit">	<?php echo 	$post['corps']; ?>
				</div>					
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