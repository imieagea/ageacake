<h1>CV-Thèque</h1>
<ul>
	<?php foreach ($fiches as $fiche) { ?>
		<li><?php echo $fiche['Fiche']['nom']." ".$fiche['Fiche']['prenom']; ?> <a href="<?php echo $this->base ?>/agent/cv/<?php echo $fiche['Fiche']['id']; ?>">Consulter</a></li>
	 <?php } ?>
</ul>