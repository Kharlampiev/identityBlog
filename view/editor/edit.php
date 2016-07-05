<?php 
$mUsers=M_Users::getInstance();
if(!$mUsers->can('Edit'))
{
	die("У вас недостаточно прав для редактирование статьи");
}
?>
<ul  class="breadcrumb">
	<li><a href="index.php">Главная</a></li>
	<li><a href="index.php?c=article&action=get&id=<?=$id?>"><?=$title?></a></li>
	<li><?=$action_title?></li>
</ul>
<div class="container-fluid">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading"><?=$action_title?></div>
				<div class="panel-body">
					<?php if (count($errors) > 0):?>
						<div class="alert alert-danger">
							<strong>Whoops!</strong> There were some problems with your input.<br><br>
							<ul class="list-inline">
									<?php foreach ($errors as $error):?>
									<li><?=$error?></li>
									<?php endforeach;?>
							</ul>
						</div>
					<?php endif;?>
					<form class="form-horizontal create-form" role="form" method="POST">
						<div class="form-group">
							<label class="col-md-2 control-label">Title</label>
							<div class="col-md-8">
								<input type="text" class="form-control" name="title"  value="<?=$title?>" autofocus>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-2 control-label">Date</label>
							<div class="col-md-8">
								<input type="date" class="form-control" name="created_at"  value="<?=$created_at?>">
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-2 control-label">Content</label>
							<div class="col-md-8">
								<textarea class="form-control" name="content" required ><?=$content?></textarea> 
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-6 col-md-offset-2">
							<button type="submit" class="btn btn-primary">Update</button>
							</div>
						</div>
					</form>
				</div>	
			</div>	
		</div>
	</div>
</div>
