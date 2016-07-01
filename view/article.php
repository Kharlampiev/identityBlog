<ul class="breadcrumb">
		<li><a href="index.php">Home</a></li>
		<li><?=$action_title?></li>
</ul>
<div class="row">
	<div class="col-md-3 col-md-offset-9">
		<ul class="list-inline">
			<li><a href="index.php?c=article&action=edit&id=<?=$id?>">редактировать</a></li>
			<li><a href="index.php?c=article&action=delete&id=<?=$id?>" >удалить</a></li>
		</ul>
	</div>
</div>

<div class="row">
	<div class="col-xs-12 col-md-12">
		<div class="panel ">
			<div class="panel-heading">
				<h3><?=$title?></h3>
					<p class="text-muted">published:
						<?php $date=new DateTime($created_at);
						print ($date->format('d/m/Y')) ?> by <?=$whoAdd?>
					</p>
			</div>
			<div class="panel-body">
				<div class="col-xs-10 col-md-10  col-md-offset-1">
					<p><?=$content?></p>
				</div>
			</div>
			
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		<?=$comments;?>
		<?=$form_comments;?>
	</div>
</div>
	
			
	
		
	
	
	




