<div class="panel">
	<div class="panel-heading">
	<p ><span class="label label-success">comments</span><span class=" label label-default"><?=count($comments)?></span></p>
	</div>
	<?php foreach ($comments as $comment):?>
	<div class="panel-body">
		<div class="col-md-4 comment-creator ">
			<p><?=$comment['name']?><br>
			<span class="text-muted">published: <?=date( "d/m/Y")?></span> 
			</p>
		</div>
		<div class="col-md-8 ">
			<p class="comment-text"><?=$comment['text']?></p>
		</div>
	</div>
	<?php endforeach;?>
</div>

