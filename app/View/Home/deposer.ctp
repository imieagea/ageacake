<style type="text/css">
	.error-message
	{
		display:none;
	}
</style>
<div class="fiches form">
	<?php if (!empty($erreurs)): ?>
		<p><?php echo $erreurs ?></p>
	<?php endif ?>
<?php echo $this->Form->create('Fiche',array('url'=>'/home/deposer','type'=>'file')); ?>
	<fieldset>
		<div class="bandeau deposercv"><h1><?php echo __('Déposez votre CV'); ?></h1></div><?php 
		echo $this->Form->input('nom',array('label'=>"Nom*"));
		echo $this->Form->input('prenom',array('label'=>"Prénom*"));
		echo $this->Form->input('adresse',array('label'=>"Adresse*"));
		echo $this->Form->input('code_postal',array('label'=>"Code Postal*"));
		echo $this->Form->input('ville',array('label'=>"Ville*"));
		echo $this->Form->input('portable',array('label'=>"Portable*"));
		echo $this->Form->input('fixe');
		echo $this->Form->input('email',array('label'=>"E-mail*"));
		?>
		<div class="select">
		<label for="date_naissance">Date de naissance</label>
		<?php
		echo $this->Form->year('date_naissance',1910,date('Y'),array('empty'=>false));
		echo $this->Form->month('date_naissance',array('empty'=>false,'monthNames'=>false));
		echo $this->Form->day('date_naissance',array('empty'=>false));
		
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
					{
						(isset($criteresV['cb']) &&in_array($sc['id'],$criteresV['cb']))?$ck = 'checked = "checked"':$ck='';
						echo '<div class="input checkbox criteres"><label for="critere'.$sc['id'].'">'.$sc['nom'].'</label><input type="checkbox" id="critere'.$sc['id'].'" name="criteres[cb][]" value="'.$sc['id'].'" '.$ck.'></div>';
					}
					elseif($sc['type'] == 'textarea')
					{
						$value = (isset($criteresV['text'][$sc['id']]))?$criteresV['text'][$sc['id']]:$sc['nom'];
						echo '<div class="input textarea criteres"><textarea name="criteres[text]['.$sc['id'].']">'.$value.'</textarea></div>';
					}
				}
			if(count($c['ChildCategory']) > 0)
			{
				foreach($c['ChildCategory'] as $child)
				{
					echo '<h3>'.$child['nom'].'</h3>';
					foreach($child['Critere'] as $sc)
					{
						if($sc['type'] == 'checkbox')
						{
							(isset($criteresV['cb']) &&in_array($sc['id'],$criteresV['cb']))?$ck = 'checked = "checked"':$ck='';
							echo '<div class="input checkbox criteres"><label for="critere'.$sc['id'].'">'.$sc['nom'].'</label><input type="checkbox" id="critere'.$sc['id'].'" name="criteres[cb][]" value="'.$sc['id'].'" '.$ck.'></div>';
						}
						elseif($sc['type'] == 'textarea')
						{
							$value = (isset($criteresV['text'][$sc['id']]))?$criteresV['text'][$sc['id']]:$sc['nom'];
							echo '<div class="input textarea criteres"><textarea name="criteres[text]['.$sc['id'].']">'.$value.'</textarea></div>';
						}
					}
				}
			}
		}
	?>
	</fieldset>
<?php 
echo $this->Form->input('accept',array('type'=>'checkbox','label'=>'J\'accepte que mon cv soit partagé aux  agents adhérents AGEA'));
echo $this->Form->end(__('Déposer')); ?>
</div>