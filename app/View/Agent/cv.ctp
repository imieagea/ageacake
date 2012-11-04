<h2><?php echo $fiche['Fiche']['nom'].' '.$fiche['Fiche']['prenom'] ?></h2>

<div style="background:grey;">
	<a style="color:pink;" href="<?php echo $this->base ?>/agent/pdf/<?php echo $fiche['Fiche']['id'] ?>">Télécharger au format PDF</a>
	<?php if(!empty($fiche['Fiche']['pdf'])): ?><a target="_blank" style="color:pink;" href="<?php echo $this->Html->url('/app/webroot/cv/'.$fiche['Fiche']['pdf']) ?>">Télécharger le CV du candidat</a> <?php endif; ?>
</div>
<?php
$cv = array();
//On intialise le tableau avec les valeurs des critères
foreach ($fiche['CritereValue'] as $value) {
		$cv[$value['critere_id']] = $value['value'];
}

//Antoine Guillien 28/20/2012 13h59 : Commentaire et parenthèse.
//Fonction récursive en beta, il faudrait en faire deux ou trois pour qu'elle s'adapte à tout éventuel autre type de critères.
//<Parenthèse> :
//Avec un peu plus de temps de dev on peut arriver à un développement plus optimisé et paufinné
//Il m'es totalement impossible de prévoir l'optimisation de ce genre de fonctions dès la conception (compte tenu des délais)
//</Parenthèse>;
function recursAfficheCats($parents,$cv = null,$rang = 1)
{
	foreach ($parents as $parent) {
		(isset($parent['CritereCategory']))? $titre = $parent['CritereCategory']['nom'] : $titre = $parent['nom'] ;
		echo "<h".$rang.">".$titre."</h".$rang.">";

		if(count($parent['Critere']) > 0)
		{
			foreach ($parent['Critere'] as $critere) {
				if(isset($cv[$critere['id']]))
				{
					echo "<label>".$critere['nom']."</label>";
					if($critere['type'] == 'checkbox')
					{
						echo "<input type='checkbox' value = ".$cv[$critere['id']].">";
					}else
					{
						echo "<textarea>".$cv[$critere['id']]."</textarea>";
					}
				}
			}
		}
		if(isset($parent['ChildCategory']) && count($parent['ChildCategory']) > 0)
		{
			recursAfficheCats($parent['ChildCategory'],$cv,$rang++);
		}

	}
} ?>
<?php recursAfficheCats($criteres,$cv) ?>