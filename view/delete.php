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
			<p class="text-danger text-center">Вы действительно хотите удалить эту статью <br><b>"<?=$title?>"</b>?
			</p>
			<form class="form-horizontal" role="form" method="POST">
				<div class="form-group">
					<div class="col-md-6 col-md-offset-5">
						<button type="submit" class="btn btn-primary">YES</button>
						<button type="submit" class="btn btn-primary">NO</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>