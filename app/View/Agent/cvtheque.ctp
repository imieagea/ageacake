
<!--
<ul>
<?php foreach ($fiches as $fiche) { ?>
            <li><?php echo $fiche['Fiche']['nom'] . " " . $fiche['Fiche']['prenom']; ?> <a href="<?php echo $this->base ?>/agent/cv/<?php echo $fiche['Fiche']['id']; ?>">Consulter</a></li>
<?php } ?>
</ul>
-->



<section id="contenu" class="contenu_admin contenu_agent">
<h2><a href="<?php echo $this->base; ?>/agent/"><- Retour au menu adhérent</a></h2>
    <h1>CV-Thèque</h1>
	
    <div class='form'>
        <?php echo $this->Form->create('critere',array('url'=>'/agent/cvtheque')); ?>
            <fieldset>
                <legend><?php echo __('Trier les CV'); ?></legend>
            <?php
                foreach($criteres as $c)
                {

                    echo '<h2>'.$c['CritereCategory']['nom'].'</h2>';
                    foreach($c['Critere'] as $sc)
                        {
                            if($sc['type'] == 'checkbox')
                                echo '<div class="input checkbox criteres"><label for="critere'.$sc['id'].'">'.$sc['nom'].'</label><input type="radio" id="critere'.$sc['id'].'" name="data[critere]" value="'.$sc['id'].'"></div>';
                        }
                    if(count($c['ChildCategory']) > 0)
                    {
                        foreach($c['ChildCategory'] as $child)
                        {
                            echo '<h3>'.$child['nom'].'</h3>';
                            foreach($child['Critere'] as $sc)
                            {
                                if($sc['type'] == 'checkbox')
                                    echo '<div class="input checkbox criteres"><label for="critere'.$sc['id'].'">'.$sc['nom'].'</label><input type="radio" id="critere'.$sc['id'].'"  name="data[critere]" value="'.$sc['id'].'"></div>';
                            }
                        }
                    }
                }
            ?>
            </fieldset>
        <?php echo $this->Form->end(__('Filtrer')); ?>
    </div>
    
    <table>
        <tr>
            <th><?php //echo $this->Paginator->sort('nom');   ?> Nom</th>
            <th><?php //echo $this->Paginator->sort('prenom', 'Prénom');   ?> Prénom</th>
            <th><?php //echo $this->Paginator->sort('email');   ?> Email</th>
            <th>Actions</th>
        </tr>
        <?php if (isset($fiches[0])): ?>	
            <?php foreach ($fiches as $fiche): ?>
                <tr>
                    <td><?php echo h($fiche['Fiche']['nom']); ?>&nbsp;</td>
                    <td><?php echo h($fiche['Fiche']['prenom']); ?>&nbsp;</td>
                    <td><?php echo h($fiche['Fiche']['email']); ?>&nbsp;</td>                 
                    <td><a href="<?php echo $this->base ?>/agent/cv/<?php echo $fiche['Fiche']['id']; ?>">Consulter</a></td>
                </tr>
            <?php endforeach; ?>
        <?php endif; ?>
    </table>
</section>
<!--
<p class="paging_counter">
<?php
echo $this->Paginator->counter(array(
    'format' => __('Page {:page} sur {:pages}')
));
?>	</p>
<div class="paging">
<?php
echo $this->Paginator->prev('< ' . __('Précédent'), array(), null, array('class' => 'prev disabled'));
echo $this->Paginator->numbers(array('separator' => '|'));
echo $this->Paginator->next(__('Suivant') . ' >', array(), null, array('class' => 'next disabled'));
?>
</div>
-->