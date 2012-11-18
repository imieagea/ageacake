<aside id="admin_menu">
	<nav>
		<ul>
			<li><a href="<?php echo $this->base ?>/admin/" class="tab_bord">Tableau de bord</a></li>
			<li>
				<a href="javascript:void(0);" id="toggle_fiches">Fiches candidats</a>
				<ul style="display:none">
					<li class="menu-child"><a href="<?php echo $this->base ?>/admin/fiches">Gérer les Fiches candidats</a></li>
					<li class="menu-child"><a href="<?php echo $this->base ?>/admin/add_fiche">Ajouter une Fiche</a></li>
					<li class="menu-child"><a href="<?php echo $this->base ?>/admin/criteres">Gérer les Critères</a></li>
					<li class="menu-child"><a href="<?php echo $this->base ?>/admin/add_critere">Ajouter un Critère</a></li>
					<li class="menu-child"><a href="<?php echo $this->base ?>/admin/critere_category">Gérer les Catégories de critères</a></li>
					<li class="menu-child"><a href="<?php echo $this->base ?>/admin/add_critere_category">Ajouter une Catégorie de critères</a></li>
				</ul>
			</li>
			<li>
				<a href="<?php echo $this->base ?>/admin/contenus" class="gerer_pages" >Gérer les Pages</a>
			</li>
			<li>
				<a href="<?php echo $this->base ?>/admin/agenda" class="gerer_pages" >Agenda</a>
			</li>
			<li>
				<a href="<?php echo $this->base ?>/admin/menu" class="gerer_pages" >Gérer le Menu</a>
			</li>
			<li>
				<a href="<?php echo $this->base ?>/admin/images" class="gerer_pages" >Gérer les images du bandeau</a>
			</li>
			<li>
				<a href="javascript:void(0);" id="toggle_actus">Actualités</a>
				<ul style="display:none">
					<li class="menu-child"><a href="<?php echo $this->base ?>/admin/actualites">Gérer les Actualités</a></li>
					<li class="menu-child"><a href="<?php echo $this->base ?>/admin/add_actualite">Ajouter une Actualité</a></li>
					<li class="menu-child"><a href="<?php echo $this->base ?>/admin/actualites_category">Gérer les Catégories d'actualité</a></li>
					<li class="menu-child"><a href="<?php echo $this->base ?>/admin/add_actualite_category">Ajouter une Catégorie d'actualité</a></li>
				</ul>
			</li>
			<li>
				<a href="javascript:void(0);" id="toggle_actions">Actions</a>
				<ul style="display:none">
					<li class="menu-child"><a href="<?php echo $this->base ?>/admin/actions">Gérer les Actions</a></li>
					<li class="menu-child"><a href="<?php echo $this->base ?>/admin/add_actions">Ajouter une Actions</a></li>
					<li class="menu-child"><a href="<?php echo $this->base ?>/admin/action_category">Gérer les Catégories d'action</a></li>
					<li class="menu-child"><a href="<?php echo $this->base ?>/admin/add_action_category">Ajouter une Catégorie d'action</a></li>
				</ul>
			</li>
			<li>
				<a href="javascript:void(0);" id="toggle_bruis">Bruissements</a>
				<ul style="display:none">
					<li class="menu-child"><a href="<?php echo $this->base ?>/admin/bruissements">Gérer les Bruissements</a></li>
					<li class="menu-child"><a href="<?php echo $this->base ?>/admin/add_bruissement">Ajouter un Bruissement</a></li>
				</ul>
			</li>
			<li><a href="<?php echo $this->base ?>/admin/alaune" class="gerer_une">Gérer la Une</a></li>
			<li><a href="<?php echo $this->base ?>/admin/recrutement" class="gerer_pages">Gérer le texte de recrutement</a></li>
			<li><a href="<?php echo $this->base ?>/admin/contact" class="gerer_pages">Gérer l'encart Contact</a></li>
			<li><a href="<?php echo $this->base ?>/admin/textes" class="gerer_pages">Gérer le texte des pages spécifiques</a></li>
			<li>
				<a href="javascript:void(0);" id="toggle_part">Partenaires</a>
				<ul style="display:none">
					<li class="menu-child"><a href="<?php echo $this->base ?>/admin/partenaires">Gérer les Partenaires</a></li>
					<li class="menu-child"><a href="<?php echo $this->base ?>/admin/view_partenaire">Ajouter un Partenaire</a></li>
				</ul>
			</li>
		</ul>
	</nav>
</aside>

<script type="text/javascript">
 $(document).ready(function () {
 
 $('#toggle_fiches').click(function(){
	$('#toggle_fiches + ul').toggle('slow');
 });
  $('#toggle_actus').click(function(){
	$('#toggle_actus + ul').toggle('slow');
 });
   $('#toggle_actions').click(function(){
	$('#toggle_actions + ul').toggle('slow');
 });
    $('#toggle_bruis').click(function(){
	$('#toggle_bruis + ul').toggle('slow');
 });
  $('#toggle_part').click(function(){
	$('#toggle_part + ul').toggle('slow');
 });
});
</script>