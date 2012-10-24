<aside id="sidebar">
	<div id="box_login">
		<div class="bandeau login">Adhérents AGEA</div>
		<?php if(!$session->check('Auth.User.id')): ?>
			<form action="<?php echo $this->base.'/users/login' ?>" method="POST">
			<span class="before_login_input"></span><input type="text" class="login_input" name="data[User][username]" placeholder="Identifiant"/>
			<span class="before_mdp_input"></span><input type="password" class="mdp_input" name="data[User][password]" placeholder="Mot de passe"/>
			<input type="submit" value="Connexion" class="right_button"/><div class="clear"></div>
			</form>
		<?php else: ?>
			<form action="<?php echo $this->base.'/users/logout' ?>" method="get">
			<?php $user = $session->read('Auth.User') ?>
			<p>Vous êtes connecté(e) en temps qu'<?php echo $user['username'] ?></p>
			<input type="submit" value="Déconnexion" class="right_button"/><div class="clear"></div>
			</form>
		<?php endif; ?>
	</div>
	<div id="box_actus">
		<div class="bandeau actus">Actualités</div>
		<ul id="list_actus">
		<li>
				<a href=""></a>
				<p><em> 
				</em></p>
			
			</li>
			
		</ul>
		<a href="" class="all_actus">Voir toutes les actualités</a>
		<div class="clear"></div>
	</div>
	<div id="box_contact">
		<div class="bandeau contact">Contact</div>
			<a href="" class="right_button contact_link">Contactez-nous</a><div class="clear"></div>
	</div>
</aside>