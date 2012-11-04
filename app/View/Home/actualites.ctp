<h1>Actualités</h1>

<?php if(isset($actualites[0])):?>	
	<?php foreach ($actualites as $une){
			$cats[$une['Category']['nom']][] = $une['Post'] ;
		}
		?>
	<?php foreach ($cats as $titre=>$cat): ?>
		<h2><?php echo h($titre); ?></h2>
		<?php
			foreach ($cat as $post) { ?>
				<div>
					<p><?php echo h($post['titre']); ?></p>
					<p><?php echo h($post['corps']); ?></p>
				</div>
		 <?php	}
		 ?>

	<?php endforeach; ?>
<?php endif; ?>
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
</div>