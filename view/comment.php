<div class="panel">
	<div class="panel-heading"><p class="text-muted">comments(<?=count($comments)?>)</p></div>
	<?php foreach ($comments as $comment):?>
	<div class="panel-body">
		<p><?=$comment['name']?><br>
		<p  class="text-muted">published: <?=date( "d/m/Y")?></p>
		<p><?=$comment['text']?></p>
	</div>
	<?php endforeach;?>
</div>


