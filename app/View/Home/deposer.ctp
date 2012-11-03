<div class="fiches form">
<?php echo $this->Form->create('Fiche',array('url'=>'/home/deposer','type'=>'file')); ?>
	<fieldset>
		<h1><?php echo __('Déposez votre CV'); ?></h1>
	<?php
		echo $this->Form->input('nom');
		echo $this->Form->input('prenom');
		echo $this->Form->input('adresse');
		echo $this->Form->input('code_postal');
		echo $this->Form->input('ville');
		echo $this->Form->input('portable');
		echo $this->Form->input('fixe');
		echo $this->Form->input('email');
		?>
		<div class="select">
		<label for="date_naissance">Date de naissance</label>
		<?php
		echo $this->Form->day('date_naissance',array('empty'=>false));
		echo $this->Form->month('date_naissance',array('empty'=>false,'monthNames'=>false));
		echo $this->Form->year('date_naissance',1910,date('Y'),array('empty'=>false));
		echo '</div>';
		echo $this->Form->input('message',array('type'=>'textarea'));
		echo $this->Form->input('cv',array('type'=>'file'));
		echo $this->Form->input('exp',array('type'=>'checkbox','label'=>'Expérience dans le(s) domaine(s) recherché(s)'));
		foreach($criteres as $c)
		{
			echo '<h2>'.$c['CritereCategory']['nom'].'</h2>';
			foreach($c['Critere'] as $sc)
				{
					if($sc['type'] == 'checkbox')
						echo '<div class="input checkbox criteres"><label for="critere'.$sc['id'].'">'.$sc['nom'].'</label><input type="checkbox" id="critere'.$sc['id'].'" name="criteres[cb][]" value="'.$sc['id'].'"></div>';
					elseif($sc['type'] == 'textarea')
						echo '<div class="input textarea criteres"><textarea name="criteres[text]['.$sc['id'].']">'.$sc['nom'].'</textarea></div>';
				}
			if(count($c['ChildCategory']) > 0)
			{
				foreach($c['ChildCategory'] as $child)
				{
					echo '<h3>'.$child['nom'].'</h3>';
					foreach($child['Critere'] as $sc)
					{
						if($sc['type'] == 'checkbox')
							echo '<div class="input checkbox criteres"><label for="critere'.$sc['id'].'">'.$sc['nom'].'</label><input type="checkbox" id="critere'.$sc['id'].'"  name="criteres[cb][]" value="'.$sc['id'].'"></div>';
						elseif($sc['type'] == 'textarea')
							echo '<div class="input textarea criteres"><textarea name="criteres[text]['.$sc['id'].']">'.$sc['nom'].'</textarea><div class="clear"></div></div>';
					}
				}
			}
		}
	?>
	</fieldset>
<?php echo $this->Form->end(__('Déposer')); ?>
</div>