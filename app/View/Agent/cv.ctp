<div class="fiches form">
<h2><a href="<?php echo $this->base; ?>/agent/cvtheque"><- Retour à la base de CV</a></h2>

	<a style="text-decoration:underline;" href="<?php echo $this->base ?>/agent/pdf/<?php echo $fiche['Fiche']['id'] ?>">Télécharger cette fiche au format PDF</a>
	<div>
	<?php if(!empty($fiche['Fiche']['pdf'])): ?><a target="_blank" style="text-decoration:underline;;" href="<?php echo $this->Html->url('/app/webroot/cv/'.$fiche['Fiche']['pdf']) ?>">Télécharger le CV du candidat</a> <?php endif; ?>
</div>
<h2>Nom:</h2> <?php echo $fiche['Fiche']['nom']; ?><br/>
<?php echo '<h2>Prénom:</h2>'.$fiche['Fiche']['prenom']; ?>
<?php echo '<h2>Email:</h2>'.$fiche['Fiche']['email']; ?>
<?php echo '<h2>Portable:</h2>'.$fiche['Fiche']['portable']; ?>
<?php echo '<h2>Ville:</h2>'.$fiche['Fiche']['ville']; ?>

<?php echo '<h2>Avis RH:</h2><div>'.$fiche['Fiche']['message'].'</div>'; ?>
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
function recursAfficheCats($parents,$cv = null,$rang = 2)
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
						echo "<input type='checkbox' checked='checked' value = ".$cv[$critere['id']].">";
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

</div>