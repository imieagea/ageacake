<?php  //echo $this->element('sql_dump'); ?>
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
			<?php if ($session->read('Auth.User.role') == 'admin'): ?>

			<form action="<?php echo $this->base.'/admin/' ?>" method="get">
				<input type="submit" value="Administration" class="right_button"/><div class="clear"></div>
			</form>

			<?php else: ?>	
			
				<form action="<?php echo $this->base.'/agent' ?>" method="get">
				<input type="submit" value="Espace Agent" class="right_button"/><div class="clear"></div>
				</form>

			<?php endif ?>
			<form action="<?php echo $this->base.'/users/logout' ?>" method="get">
				<?php $user = $session->read('Auth.User') ?>
				<p>Vous êtes connecté(e) en temps qu'<?php echo $user['username'] ?></p>
				<input type="submit" value="Déconnexion" class="right_button"/><div class="clear"></div>
				</form>
		<?php endif; ?>
	</div>
	<div id="box_contact">
		<div class="bandeau contact">Contact</div>
		<?php echo $infos_contact['Post']['corps'] ?>
		<!--	<a href="" class="right_button contact_link">Contactez-nous</a><div class="clear"></div>-->
	</div>
</aside>