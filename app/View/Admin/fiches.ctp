<table>
	<tr>
		<th>Nom</th>
		<th>Prénom</th>
		<th>Statut de la fiche</th>
	</tr>
<?php if(isset($fiches[0])):?>	
	<?php foreach ($fiches as $fiche): ?>
		<tr>
			<td><?php echo h($fiche['Fiche']['nom']); ?>&nbsp;</td>
			<td><?php echo h($fiche['Fiche']['prenom']); ?>&nbsp;</td>
			<td><?php echo h($fiche['Fiche']['status']); ?>&nbsp;</td>
		</tr>
	<?php endforeach; ?>
<?php endif; ?>
</table>
<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => '|'));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>