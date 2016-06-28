<?php 
$mUsers=M_Users::getInstance();
if(!$mUsers->can('Add'))
{
	//header();
	die('У вас недостаточно прав для добавление статьи');
}
?>
<ul class="breadcrumb">
	<li><a href="index.php">Главная</a></li>
	<li><?=$action_title?></li>
</ul>
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
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
				<div class="panel-body">
					<form class="form-horizontal" role="form" method="POST">
						<div class="form-group">
							<label class="col-md-4 control-label">Title</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="title"  required autofocus>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-4 control-label">Date</label>
							<div class="col-md-6">
								<input type="date" class="form-control" name="date"  required>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-4 control-label">Content</label>
							<div class="col-md-6">
								<textarea class="form-control" name="content" required ></textarea> 
							</div>
						</div>

						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<button type="submit" class="btn btn-primary">
									Create
								</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>


	
		
