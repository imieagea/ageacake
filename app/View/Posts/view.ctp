<article>
			<div class="bandeau recrut"><h1><?php echo h($posts['Post']['titre']); ?></h1></div>
			<?php echo $posts['Post']['corps']; ?>		
			<?php if (isset($posts['Post']['video']) && $posts['Post']['type_video'] == 'youtube'): ?>
				<iframe width="400" height="300" src="http://www.youtube.com/embed/<?php echo $posts['Post']['video'] ?>?fs=1&amp;feature=oembed" frameborder="0" allowfullscreen=""></iframe>
			<?php elseif(isset($posts['Post']['video']) && $posts['Post']['type_video'] == 'dailymotion'): ?>
				<object width="560" height="315">
				    <param name="movie" value="http://www.dailymotion.com/swf/video/<?php echo $posts['Post']['video'] ?>?background=493D27&foreground=E8D9AC&highlight=FFFFF0"></param>
				    <param name="allowFullScreen" value="true"></param>
				    <param name="allowScriptAccess" value="always"></param>
				    <embed type="application/x-shockwave-flash" src="http://www.dailymotion.com/swf/video/<?php echo $posts['Post']['video'] ?>?background=493D27&foreground=E8D9AC&highlight=FFFFF0" width="560" height="315" allowfullscreen="true" allowscriptaccess="always"></embed>
				</object>
			<?php endif ?>
</article>	
