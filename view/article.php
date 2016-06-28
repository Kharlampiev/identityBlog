<ul class="breadcrumb">
		<li><a href="index.php">Home</a></li>
		<li><?=$action_title?></li>
</ul>
<div class="article">
	<h3><?=$title?></h3>
	<p class="date">Опубликовано:<?=$date?></p>
	<p class="content"><?=$content?></p>
	<div class="editor">
		<ul>
			<li><a href="index.php?c=article&action=edit&id=<?=$id?>">редактировать</a></li>
			<li><a href="index.php?c=article&action=delete&id=<?=$id?>" >удалить</a></li>
		</ul>
	</div>
	<div class="comment">
		<?=$comments;?>
		<?=$form_comments;?>
	</div>
</div>



