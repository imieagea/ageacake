<h1>Fiches candidats</h1> 

<?php
if(isset($avalider)){ 
if($avalider>0){ ?>
<div id="fichesavalider"><a href="<?php echo $this->Html->url('/admin/fiches?avalider=1');?>">Vous avez des fiches à valider</a></div>
<?php }
}else{?>
<div id="retourfiches"><a href="<?php echo $this->Html->url('/admin/fiches');?>">Retour aux fiches candidats</a></div>
<?php } ?>
<form style="width:100%" action="<?php echo $this->base ?>/admin/delete/Fiche" method="POST">	
<table>
	<tr>
	<th></th>
		<th><?php echo $this->Paginator->sort('nom'); ?></th>
		<th><?php echo $this->Paginator->sort('prenom','Prénom'); ?></th>
		<th><?php echo $this->Paginator->sort('email'); ?></th>
		<th><?php echo $this->Paginator->sort('status','Statut'); ?></th>
		<th>Actions</th>
	</tr>
<?php if(isset($fiches[0])):?>	
	<?php foreach ($fiches as $fiche): ?>
		<tr>
			<td><input type = "checkbox" name="data[ids][]" value = "<?php echo h($fiche['Fiche']['id']); ?>"></td>
			<td><?php echo h($fiche['Fiche']['nom']); ?>&nbsp;</td>
			<td><?php echo h($fiche['Fiche']['prenom']); ?>&nbsp;</td>
			<td><?php echo h($fiche['Fiche']['email']); ?>&nbsp;</td>
			<td><?php if(h($fiche['Fiche']['statut'])=="validated"){
			echo "Validé";
			}
			if(h($fiche['Fiche']['statut'])=="new"){
			echo "A validé";
			}
			 ?>&nbsp;</td>
			<td><a href="<?php echo $this->base ?>/admin/view_fiche/<?php echo $fiche['Fiche']['id'] ?>">Voir la fiche</a></td>
		</tr>
	<?php endforeach; ?>
<?php endif; ?>
</table>


<h2> Supprimer <input type="submit" value="Ok" onclick="if (confirm('Êtes-vous sûr de vouloir le supprimer ces fiches ?')) { return true; } event.returnValue = false; return false;"></h2>
</form>
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