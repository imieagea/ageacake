
<h3 style="text-align:center">Fiche Candidat <?php echo $fiche['Fiche']['nom']; ?> <?php echo $fiche['Fiche']['prenom']; ?> </h3>

<?php echo '<p><big>Adresse:</big> '.$fiche['Fiche']['adresse'].' '.$fiche['Fiche']['ville'].'</p>'; ?>
<?php echo '<p><big>Email:</big> '.$fiche['Fiche']['email'].'</p>'; ?>
<?php echo '<p><big>Portable:</big> '.$fiche['Fiche']['portable'].'</p>'; ?>
<?php if (isset($fiche['Fiche']['fixe']) && !empty($fiche['Fiche']['fixe'])): ?>
	<?php echo '<p><big>Fixe:</big> '.$fiche['Fiche']['fixe'].'</p>'; ?>
<?php endif ?>

<?php echo '<h2>Avis RH:</h2><div>'.$fiche['Fiche']['message'].'</div>'; ?>
<?php
$cv = array();
//On intialise le tableau avec les valeurs des critères
foreach ($fiche['CritereValue'] as $value) {
		$cv[$value['critere_id']] = $value['value'];
}
?>

<?php
//Antoine Guillien 28/20/2012 13h59 : Commentaire et parenthèse.
//Fonction récursive en beta, il faudrait en faire deux ou trois pour qu'elle s'adapte à tout éventuel autre type de critères.
//<Parenthèse> :
//Avec un peu plus de temps de dev on peut arriver à un développement plus optimisé et paufinné
//Il m'es totalement impossible de prévoir l'optimisation de ce genre de fonctions dès la conception (compte tenu des délais)
//</Parenthèse>;
function recursAfficheCats($parents,$cv = null,$rang = 3)
{
	foreach ($parents as $parent) {
		(isset($parent['CritereCategory']))? $titre = $parent['CritereCategory']['nom'] : $titre = $parent['nom'] ;
		echo "<h".$rang.">".$titre."</h".$rang.">";
		echo "<table style='width:100%'>";
		echo '<col style="width: 20%" class="col1">
	    <col style="width: 20%">
	    <col style="width: 20%">
	    <col style="width: 20%">
	    <col style="width: 20%">';
		echo "<tr>";
		
		if(count($parent['Critere']) > 0)
		{
			
			$numcel = 1;
			foreach ($parent['Critere'] as $critere) {
				if($numcel % 5 == 0)
					echo '</tr><tr><td>';
				else
					echo '<td>';
				
				if(isset($cv[$critere['id']]))
				{
					
					if($critere['type'] == 'checkbox')
					{

						echo '<div style="border: solid 1px #333333; background: #EEEEEE; text-align: center;width:35mm">';
						echo "<small>".$critere['nom']."</small>";
						echo '</div>';
						
					}else
					{
					echo '<div style="border: solid 1px #333333; background: #EEEEEE; text-align: center;width:35mm">';
					echo "<small>".$critere['nom']."</small>";
					echo "<small>".$cv[$critere['id']]."</small>";
					echo '</div>';
					}
				}else{
				
					if($critere['type'] == 'checkbox')
					{
						echo '<div style="text-align: center;width:38mm">';
						echo "<small>".$critere['nom']."</small>";
						echo '</div>';
						
					}else
					{
						echo '';
					}
				
			}
			echo '</td>';
			$numcel++;
		}
		

	}
	echo "</tr>";
	echo "</table>";
	if(isset($parent['ChildCategory']) && count($parent['ChildCategory']) > 0)
	{
		recursAfficheCats($parent['ChildCategory'],$cv,$rang+1);
	}

} 
}
recursAfficheCats($criteres,$cv); ?>
