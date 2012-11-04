<h1>Fiches candidats</h1> 
<div id="fichesavalider"><a href="/admin/fiches?avalider=1">Vous avez des fiches à valider</a></div>
<table>
	<tr>
		<th><?php echo $this->Paginator->sort('nom'); ?></th>
		<th><?php echo $this->Paginator->sort('prenom','Prénom'); ?></th>
		<th><?php echo $this->Paginator->sort('email'); ?></th>
		<th><?php echo $this->Paginator->sort('status','Statut'); ?></th>
		<th>Actions</th>
	</tr>
<?php if(isset($fiches[0])):?>	
	<?php foreach ($fiches as $fiche): ?>
		<tr>
			<td><?php echo h($fiche['Fiche']['nom']); ?>&nbsp;</td>
			<td><?php echo h($fiche['Fiche']['prenom']); ?>&nbsp;</td>
			<td><?php echo h($fiche['Fiche']['email']); ?>&nbsp;</td>
			<td><?php echo h($fiche['Fiche']['statut']); ?>&nbsp;</td>
			<td><a href="<?php echo $this->base ?>/admin/view_fiche/<?php echo $fiche['Fiche']['id'] ?>">Voir la fiche</a></td>
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