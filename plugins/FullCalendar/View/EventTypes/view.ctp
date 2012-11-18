<?php
/*
 * View/EventTypes/view.ctp
 * CakePHP Full Calendar Plugin
 *
 * Copyright (c) 2010 Silas Montgomery
 * http://silasmontgomery.com
 *
 * Licensed under MIT
 * http://www.opensource.org/licenses/mit-license.php
 */
?>
<style type="text/css">
* {
 padding:0;
  margin:0
}
dl {
 width:100%;
 overflow:hidden;
}
dt {
 float:left;
 font-weight: bold;
 width:50%; /* adjust the width; make sure the total of both is 100% */
}
dd {
 float:left;
 width:50%; /* adjust the width; make sure the total of both is 100% */
}
</style>
<div class="form eventTypes view">
<h2><?php echo __('Event Type');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Nom'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $eventType['EventType']['name']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Couleur'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $eventType['EventType']['color']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('Editer le type d\'évènement', true), array('plugin' => 'full_calendar', 'action' => 'edit', $eventType['EventType']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Supprimer ce type d\'évènement', true), array('plugin' => 'full_calendar', 'action' => 'delete', $eventType['EventType']['id']), null, sprintf(__('Etes-vous sûr de vouloir supprimer %s?', true), $eventType['EventType']['name'])); ?> </li>
		<li><?php echo $this->Html->link(__('Gérer les types d\'évènements', true), array('plugin' => 'full_calendar', 'action' => 'index')); ?> </li>
		<li><li><?php echo $this->Html->link(__('Voir l\'agenda', true), array('plugin' => null, 'controller' => 'admin','action'=>'agenda')); ?></li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Events');?></h3>
	<?php if (!empty($eventType['Event'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Title',array("label"=>"Titre")); ?></th>
		<th><?php echo __('Status',array("label"=>"Statut")); ?></th>
		<th><?php echo __('Start',array("label"=>"Début")); ?></th>
        <th><?php echo __('End',array("label"=>"Fin")); ?></th>
        <th><?php echo __('All Day',array("label"=>"Toute la journée")); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"></th>
	</tr>
	<?php
		$i = 0;
		foreach ($eventType['Event'] as $event):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $event['title'];?></td>
			<td><?php echo $event['status'];?></td>
			<td><?php echo $event['start'];?></td>
            <td><?php if($event['all_day'] != 1) { echo $event['end']; } else { echo "N/A"; } ?></td>
            <td><?php if($event['all_day'] == 1) { echo "Oui"; } else { echo "Non"; }?></td>
			<td><?php echo $event['modified'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('Voir', true), array('plugin' => 'full_calendar', 'controller' => 'events', 'action' => 'view', $event['id'])); ?>
				<?php echo $this->Html->link(__('Editer', true), array('plugin' => 'full_calendar', 'controller' => 'events', 'action' => 'edit', $event['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>
</div>
