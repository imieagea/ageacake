<div class="fiches form">
<?php echo $this->Form->create('Fiche',array('url'=>'/admin/save_fiche')); ?>
	<fieldset>
		<legend><?php echo __('Créer une Fiche candidat'); ?></legend>
	<?php
		echo $this->Form->input('nom');
		echo $this->Form->input('prenom');
		echo $this->Form->input('adresse');
		echo $this->Form->input('code_postal');
		echo $this->Form->input('ville');
		echo $this->Form->input('portable');
		echo $this->Form->input('fixe');
		echo $this->Form->input('email');
		echo $this->Form->input('date_naissance');
		echo $this->Form->input('message');
		echo $this->Form->input('pdf',array('type'=>'file'));
		echo $this->Form->input('exp',array('type'=>'checkbox','label'=>'Expérience dans le(s) domaine(s) recherché(s)'));
		foreach($criteres as $c)
		{

			echo '<h2>'.$c['CritereCategory']['nom'].'</h2>';
			foreach($c['Critere'] as $sc)
				{
					if($sc['type'] == 'checkbox')
						echo '<label for="'.$sc['id'].'">'.$sc['nom'].'</label><input type="checkbox" name="'.$sc['id'].'">';
					elseif($sc['type'] == 'textarea')
						echo '<label for="'.$sc['id'].'">'.$sc['nom'].'</label><textarea name="'.$sc['id'].'"></textarea>';
				}
			if(count($c['ChildCategory']) > 0)
			{
				foreach($c['ChildCategory'] as $child)
				{
					echo '<h3>'.$child['nom'].'</h3>';
					foreach($child['Critere'] as $sc)
					{
						if($sc['type'] == 'checkbox')
							echo '<label for="'.$sc['id'].'">'.$sc['nom'].'</label><input type="checkbox" name="'.$sc['id'].'">';
						elseif($sc['type'] == 'textarea')
							echo '<label for="'.$sc['id'].'">'.$sc['nom'].'</label><textarea name="'.$sc['id'].'"></textarea>';
					}
				}
			}
		}
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Fiches'), array('action' => 'index')); ?></li>
	</ul>
</div>
