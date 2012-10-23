<h2>Connexion</h2>
<?php
echo $this->Form->create('User', array('url' => array('controller' => 'users', 'action' => 'login')));
echo $this->Form->input('User.username',array('label'=>'Identifiant'));
echo $this->Form->input('User.password');
echo $this->Form->end('Connexion');
?>