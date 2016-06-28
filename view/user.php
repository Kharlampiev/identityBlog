<div class="breadcrumbs-menu">
	<ul>
		<li><a href="index.php">Главная</a></li>
		<li><?=$title?></li>
	</ul>
</div>
<div class="article">
	<h3><?=$title?></h3>
	<p class="content">Имя пользователя:<b><?=$user['login']?></b></p>
	<?php if(isset($_SESSION['login'])):?>
	<p>Пользователь сейчас: Онлайн</p>	
	<?php endif;?>
</div>	
