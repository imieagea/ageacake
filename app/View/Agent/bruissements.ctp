<h1>Bruissements de chambre</h1>
<table>
	<tr>
		<th><?php echo $this->Paginator->sort('titre'); ?></th>
		<th><?php echo $this->Paginator->sort('corps'); ?></th>
	</tr>
<?php if(isset($bruissements[0])):?>	
	<?php foreach ($bruissements as $une): ?>
		<tr>
			<td><?php echo h($une['Post']['titre']); ?>&nbsp;</td>
			<td><?php echo $rest = substr(h($une['Post']['corps']), 0, 20).'[...]'; ?>&nbsp;</td>		
			<td><a href="<?php echo $this->base ?>/agent/bruissement/<?php echo $une['Post']['id'] ?>">Voir</a></td>
		</tr>
	<?php endforeach; ?>
<?php endif; ?>
</table>
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