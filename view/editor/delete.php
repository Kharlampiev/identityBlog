<?php 
$mUsers=M_Users::getInstance();
if(!$mUsers->can('Delete'))
{
	die("У вас недостаточно прав для удаление статьи");
}
?>
<ul class="breadcrumb">
	<li><a href="index.php">Home</a></li>
	<li><a href="index.php?c=article&action=get&id=<?=$id?>"><?=$title?></a></li>
	<li><?=$action_title?></li>
</ul>
<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
		 	<div class="panel panel-danger">
		 		<div class="panel-heading"><?=$action_title?></div>
		 			<div class="panel-body">	
						<p  class="text-center"><b>"<?=$title?>"</b></p>
						<p class="text-danger text-center"><strong>УДАЛИТЬ СТАТЬЮ?</strong></p>
						<form class="form-horizontal" role="form" method="POST">
							<div class="form-group">
								<div class="col-md-6 col-md-offset-5">
									<button type="submit" name="yes" class="btn btn-success">YES</button>
									<button type="submit" name="no" class="btn btn-primary">NO</button>
								</div>
							</div>
						</form>
					</div>
			</div>
		</div>
	</div>
</div>