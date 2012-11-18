<?php
/*
 * View/Events/edit.ctp
 * CakePHP Full Calendar Plugin
 *
 * Copyright (c) 2010 Silas Montgomery
 * http://silasmontgomery.com
 *
 * Licensed under MIT
 * http://www.opensource.org/licenses/mit-license.php
 */
?>
<div class="events form">
<?php echo $this->Form->create('Event');?>
	<fieldset>
 		<legend><?php __('Edit Event'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('event_type_id');
		echo $this->Form->input('title');
		echo $this->Form->input('details');
		echo $this->Form->input('start');
		echo $this->Form->input('end');
		echo $this->Form->input('all_day');
		echo $this->Form->input('status', array('options' => array(
					'Scheduled' => 'Programmé','Confirmed' => 'Confirmé','In Progress' => 'En cours',
					'Rescheduled' => 'Reporté','Completed' => 'Terminé'
					)
				)
			);
	?>
	</fieldset>
<?php echo $this->Form->end(__('Mise à jour', true));?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('Nouvel évènement', true), array('plugin' => 'full_calendar', 'action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('Gérer les évènements', true), array('plugin' => 'full_calendar', 'action' => 'index'));?></li>
		<li><li><?php echo $this->Html->link(__('Voir l\'agenda', true), array('plugin'=>null,'controller' => 'admin','action'=>'agenda')); ?></li>
	</ul>
</div>
