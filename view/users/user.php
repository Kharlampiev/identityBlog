<ul class="breadcrumb">
	<li><a href="index.php">Главная</a></li>
	<li><?=$title?></li>
</ul>
<div class="row">
	<div class="col-md-5 col-md-offset-4">
		<div class="panel panel-default">
			<div class="panel-heading">Profile: <?=$user['login']?></div>
			<div class="panel-body">
			<?php if(isset($_SESSION['login'])):?>
			<p>Пользователь сейчас: Онлайн</p>	
			<?php endif;?>
			</div>	
		</div>
	</div>
</div>

