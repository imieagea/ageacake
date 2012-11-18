<ul>
	<?php foreach ($tabs as $tab) { ?>
		<li><a href="<?php echo $tab['Lien']['lien'] ?>"><?php echo $tab['Lien']['nom'] ?></a></li>
	<?php } ?>
</ul>