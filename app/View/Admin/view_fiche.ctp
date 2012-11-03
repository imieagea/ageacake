<div class="fiches form">
<?php echo $this->Form->create('Fiche',array('url'=>'/admin/view_fiche')); ?>
	<fieldset>
		<h1><?php echo __('Créer une Fiche candidat'); ?></h1>
	<?php
		echo $this->Form->input('nom',array('value'=>$fiche['Fiche']['nom']));
		echo $this->Form->input('prenom',array('value'=>$fiche['Fiche']['prenom']));
		echo $this->Form->input('adresse',array('value'=>$fiche['Fiche']['adresse']));
		echo $this->Form->input('code_postal',array('value'=>$fiche['Fiche']['code_postal']));
		echo $this->Form->input('ville',array('value'=>$fiche['Fiche']['ville']));
		echo $this->Form->input('portable',array('value'=>$fiche['Fiche']['portable']));
		echo $this->Form->input('fixe',array('value'=>$fiche['Fiche']['fixe']));
		echo $this->Form->input('email',array('value'=>$fiche['Fiche']['email']));

		?>
		<div class="select">
		<label for="date_naissance">Date de naissance</label>
		<?php
		echo $this->Form->day('date_naissance',array('empty'=>false,'value'=>substr($fiche['Fiche']['date_naissance'], -2)));
		echo $this->Form->month('date_naissance',array('empty'=>false,'monthNames'=>false,'value'=>substr($fiche['Fiche']['date_naissance'], 5, 2)));
		echo $this->Form->year('date_naissance',1910,date('Y'),array('empty'=>false,'value'=>substr($fiche['Fiche']['date_naissance'], 0, 4)));
		echo '</div>';
		echo $this->Form->input('message',array('type'=>'textarea','value'=>$fiche['Fiche']['message']));
		echo $this->Form->input('pdf',array('type'=>'file'));
		
		if($fiche['Fiche']['exp']==1){
				echo $this->Form->input('exp',array('type'=>'checkbox','label'=>'Expérience dans le(s) domaine(s) recherché(s)','checked' => 'checked'));
		}else{
		echo $this->Form->input('exp',array('type'=>'checkbox','label'=>'Expérience dans le(s) domaine(s) recherché(s)'));
		}		
		
		
		foreach ($fiche['CritereValue'] as $value) {
		if($value['value']!=0){
		$cv[$value['critere_id']] = $value['value'];
		}
}

//Antoine Guillien 28/20/2012 13h59 : Commentaire et parenthèse.
//Fonction récursive en beta, il faudrait en faire deux ou trois pour qu'elle s'adapte à tout éventuel autre type de critères.
//<Parenthèse> :
//Avec un peu plus de temps de dev on peut arriver à un développement plus optimisé et paufinné
//Il m'es totalement impossible de prévoir l'optimisation de ce genre de fonctions dès la conception (compte tenu des délais)
//</Parenthèse>;
function recursAfficheCats($parents,$cv = null,$rang = 2)
{
	foreach ($parents as $parent) {
		(isset($parent['CritereCategory']))? $titre = $parent['CritereCategory']['nom'] : $titre = $parent['nom'] ;
		echo "<h".$rang.">".$titre."</h".$rang.">";
	if($parent['id']==3){
		var_dump($parent);
	}
		if(count($parent['Critere']) > 0)
		{
			foreach ($parent['Critere'] as $critere) {
			
				if(isset($cv[$critere['id']]))
				{
					
					if($critere['type'] == 'checkbox')
					{
					echo '<div class="input checkbox criteres">';
					echo "<label>".$critere['nom']."</label>";
						echo "<input type='checkbox' checked='checked' value = ".$cv[$critere['id']].">";
					}else
					{
					echo '<div class="input textarea criteres">';
					echo "<label>".$critere['nom']."</label>";
						echo "<textarea>".$cv[$critere['id']]."</textarea>";
					}
					echo '</div>';
				}else{
				
				if($critere['type'] == 'checkbox')
					{
						echo '<div class="input checkbox criteres">';
					echo "<label>".$critere['nom']."</label>";
						echo "<input type='checkbox' >";
					}else
					{
					echo '<div class="input textarea criteres">';
					echo "<label>".$critere['nom']."</label>";
						echo "<textarea></textarea>";
					}
				echo '</div>';
			}
		}
		if(isset($parent['ChildCategory']) && count($parent['ChildCategory']) > 0)
		{
			recursAfficheCats($parent['ChildCategory'],$cv,$rang++);
		}

	}else{
		
	}
} 
}
recursAfficheCats($criteres,$cv);
	?>
	</fieldset>
<?php echo $this->Form->end(__('Enregistrer')); ?>
</div>
<!--
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Fiches'), array('action' => 'index')); ?></li>
	</ul>
</div>
-->
