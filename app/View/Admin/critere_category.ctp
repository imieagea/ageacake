<div class="criteres index">
<form style="width:100%" action="<?php echo $this->base ?>/admin/delete/CritereCategory" method="POST">	
	<h1><?php echo __('Catégories de critères'); ?></h1>
	<!--<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		
		<li><?php echo $this->Html->link(__('New Critere Category'), array('controller' => 'critere_categories', 'action' => 'add')); ?> </li>
	</ul>
</div>-->
	<table cellpadding="0" cellspacing="0">
	<tr>
	<th></th>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('nom'); ?></th>
			<th>Catégories enfants</th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
	foreach ($categories as $categorie): ?>
	<tr>
	<td><input type = "checkbox" name="data[ids][]" value = "<?php echo h($categorie['CritereCategory']['id']); ?>"></td>
		<td><?php echo h($categorie['CritereCategory']['id']); ?>&nbsp;</td>
		<td><?php echo h($categorie['CritereCategory']['nom']); ?>&nbsp;</td>
		<td><ul><?php foreach ($categorie['ChildCategory'] as $cat) { ?>
			<li><?php echo $cat['nom'] ?></li>
		<?php } ?><ul></td>
		<td><a href="<?php echo $this->base ?>/admin/view_critere_category/<?php echo $categorie['CritereCategory']['id'] ?>">Voir</a></td>
	</tr>
<?php endforeach; ?>
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
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('Suivant') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
	<h2> Supprimer <input type="submit" value="Ok" onclick="if (confirm('Êtes-vous sûr de vouloir le supprimer ces categories ?')) { return true; } event.returnValue = false; return false;"></h2>

</div>

