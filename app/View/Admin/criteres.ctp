<div class="criteres index">
	<h1><?php echo __('Criteres'); ?></h1>
	<?php $ii = 0; ?>
	<?php $ix = count($criteres); ?>
	<?php foreach($criteres as $c)
		{
			echo '<div class="critere-container">';
			echo '<div>';
			echo '<h2>'.$c['CritereCategory']['nom'];
			echo '( ';
				echo ($c['CritereCategory']['public'] == 1)? 'Public': 'Privé';
			echo ' )</h2>';
			if ($ii > 0) {
	# code...

				echo '<form method="post" action="'.$this->base.'/admin/criteres">';
					echo '<input type="submit" value="+">';
					echo '<input type="hidden" name = "up" value="up">';
					echo '<input type="hidden" name="id" value="'.$c['CritereCategory']['id'].'">';
					echo '<input type="hidden" name="position" value="'.$c['CritereCategory']['position'].'">';
					echo '<input type="hidden" name="category" value="category">';
				echo '</form>';
			}
			if ($ii<$ix-1) {
				# code...
			
			echo '<form method="post" action="'.$this->base.'/admin/criteres">';
				echo '<input type="hidden" name="down"value="down">';
				echo '<input type="hidden" name="id" value="'.$c['CritereCategory']['id'].'">';
				echo '<input type="hidden" name="category" value="category">';
				echo '<input type="hidden" name="position" value="'.$c['CritereCategory']['position'].'">';
				echo '<input type="submit" value="-">';
			echo '</form>';
			}
			echo '<a href="'.$this->base.'/admin/view_critere_category/'.$c['CritereCategory']['id'].'">Editer</a>';
			echo '</div>';
			$di = 0;
			$dx = count($c['Critere']);
			foreach($c['Critere'] as $sc)
				{
					echo '<div class = "critere">';
						echo '<p>';
							echo $sc['nom'];
							echo '( '.$sc['type'].' )';
							if ($di > 0) {
								# code...
							
							echo '<form method="post" action="'.$this->base.'/admin/criteres">';
								echo '<input type="submit" value="+">';
								echo '<input type="hidden" name = "up" value="up">';
								echo '<input type="hidden" name="id" value="'.$sc['id'].'">';
								echo '<input type="hidden" name="position" value="'.$sc['position'].'">';
								echo '<input type="hidden" name="critere" value="critere">';
							echo '</form>';
						}
						if($di < $dx-1)
						{
							echo '<form method="post" action="'.$this->base.'/admin/criteres">';
								echo '<input type="hidden" name="down" value="down">';
								echo '<input type="hidden" name="id" value="'.$sc['id'].'">';
								echo '<input type="hidden" name="position" value="'.$sc['position'].'">';
								echo '<input type="hidden" name="critere" value="critere">';
								echo '<input type="submit" value="-">';
							echo '</form>';
						}
						echo '<a href="'.$this->base.'/admin/view_critere/'.$sc['id'].'">Editer</a>';
						echo '</p>';
					echo '</div>';
					$di++;
				}
			if(count($c['ChildCategory']) > 0)
			{
				$vi = 0;
				$vx = count($c['ChildCategory']);
				foreach($c['ChildCategory'] as $child)
				{
					echo '<div>';
					echo '<h3>'.$c['CritereCategory']['nom'];
					echo '( ';
						echo ($c['CritereCategory']['public'] == 1)? 'Public': 'Privé';
					echo ' )</h3>';
					if ($vi > 0) {
			# code...

						echo '<form method="post" action="'.$this->base.'/admin/criteres">';
							echo '<input type="submit" value="+">';
							echo '<input type="hidden" name = "up" value="up">';
							echo '<input type="hidden" name="id" value="'.$sc['id'].'">';
							echo '<input type="hidden" name="position" value="'.$sc['position'].'">';
							echo '<input type="hidden" name="category" value="category">';
						echo '</form>';
					}
					if ($vi<$vx-1) {
						# code...
					
					echo '<form method="post" action="'.$this->base.'/admin/criteres">';
						echo '<input type="hidden" name="down"value="down">';
						echo '<input type="hidden" name="id" value="'.$sc['id'].'">';
						echo '<input type="hidden" name="category" value="category">';
						echo '<input type="hidden" name="position" value="'.$sc['position'].'">';
						echo '<input type="submit" value="-">';
					echo '</form>';
				}
				echo '<a href="'.$this->base.'/admin/view_critere_category/'.$c['CritereCategory']['id'].'">Editer</a>';
				echo '</div>';
					$di = 0;
			$dx = count($child['Critere']);
				foreach($child['Critere'] as $sc)
				{
					echo '<div class = "critere">';
						echo '<p>';
							echo $sc['nom'];
							echo '( '.$sc['type'].' )';
							if ($di > 0) {
								# code...
							
							echo '<form method="post" action="'.$this->base.'/admin/criteres">';
								echo '<input type="submit" value="+">';
								echo '<input type="hidden" name = "up" value="up">';
								echo '<input type="hidden" name="id" value="'.$sc['id'].'">';
								echo '<input type="hidden" name="position" value="'.$sc['position'].'">';
								echo '<input type="hidden" name="critere" value="critere">';
							echo '</form>';
						}
						if($di < $dx-1)
						{
							echo '<form method="post" action="'.$this->base.'/admin/criteres">';
								echo '<input type="hidden" name="down" value="down">';
								echo '<input type="hidden" name="id" value="'.$sc['id'].'">';
								echo '<input type="hidden" name="position" value="'.$sc['position'].'">';
								echo '<input type="hidden" name="critere" value="critere">';
								echo '<input type="submit" value="-">';
							echo '</form>';
							
						}
						echo '<a href="'.$this->base.'/admin/view_critere/'.$sc['id'].'">Editer</a>';
						echo '</p>';
					echo '</div>';
					$di++;
				}
					$vi++;
				}
			}
			echo '</div>';
			$ii++;
		} ?>
</div>

