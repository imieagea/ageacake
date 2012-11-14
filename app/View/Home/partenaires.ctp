<?php foreach ($partenaires as $partenaire): ?>
	<article class="partenaire">
		<div class="bandeau">
				<?php echo $partenaire['Partenaires']['nom'] ?>
		</div>
		<div class="consulter bruit">
			<a target="_blank" href="<?php echo $this->base ?>/app/webroot/partenaires/<?php echo $partenaire['Partenaires']['pdf'] ?>">Consulter la plaquette</a>
		</div>
		<h2>Lien du partenaire : </h2>
		<p>
			<!-- On rajoute le http si il n'y est pas -->
			<a target="_blank" href="<?php if (substr($partenaire['Partenaires']['link'],0,7) != 'http://') {
				echo 'http://';
			} echo $partenaire['Partenaires']['link'] ?>"><?php echo $partenaire['Partenaires']['link'] ?></a>
		</p>
	</article>
<?php endforeach ?>