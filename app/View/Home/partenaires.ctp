<div id="toutesactus">
<h1>Partenaires</h1>

	<article>
		<?php echo $texte['Texte']['contenu'] ?>
	</article>
<?php foreach ($partenaires as $partenaire): ?>
	<article class="partenaire">
		<div class="bandeau">
				<?php echo $partenaire['Partenaires']['nom'] ?>
		</div>
		<?php if (isset($partenaire['Partenaires']['pdf'])): ?>
		<div class="consulter bruit">
			<a target="_blank" href="<?php echo $this->base ?>/app/webroot/partenaires/<?php echo $partenaire['Partenaires']['pdf'] ?>">Consulter la plaquette</a>
		</div>	
		<?php endif ?>
		
		<h2>Lien du partenaire : </h2>
		<p>
			<!-- On rajoute le http si il n'y est pas -->
			<a target="_blank" href="<?php if (substr($partenaire['Partenaires']['link'],0,7) != 'http://') {
				echo 'http://';
			} echo $partenaire['Partenaires']['link'] ?>"><?php echo $partenaire['Partenaires']['link'] ?></a>
		</p>
	</article>
<?php endforeach ?>
</div>