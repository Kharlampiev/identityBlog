<ul class="breadcrumb">
		<li><a href="index.php">Home</a></li>
		<li><?=$action_title?></li>
		<li><?=$title?></li>
</ul>
<div class="row">
	<div class="col-md-4 col-md-offset-8">
		<ul class=" list-group list-inline">
			<li><a class="list-group-item list-group-item-warning" href="index.php?c=article&action=edit&id=<?=$id?>">редактировать</a></li>
			<li><a class="list-group-item list-group-item-danger" href="index.php?c=article&action=delete&id=<?=$id?>" >удалить</a></li>
		</ul>
	</div>
</div>

<div class="row">
	<div class="col-xs-12 col-md-12">
		<div class="panel ">
			<div class="panel-heading">
				<h3><?=$title?></h3>
					<p class="text-muted info-create">created:
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
	
			
	
		
	
	
	




