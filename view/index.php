<div class="row">
	<?php foreach ($articles as $article): ?>
	<div class="col-xs-12 col-md-12 grid">
		<div class="col-xs-9 col-md-9">
			<h3>
				<a href="index.php?c=article&action=get&id=<?=$article['id']?>"><?=$article['title']?></a>
			</h3>
			<p class="text-muted">published:<?=$article['date']?></p>
			<!--<p class="content"><?=M_Articles::previewArticles($article['content'],$len)?>
				<a href="index.php?c=article&action=get&id=<?=$article['id']?>">
				...читать далее
				</a>
			</p>-->
		</div>
		<div class="col-xs-2 col-md-2">
		<p class="text-muted text-center"><small>
			<?=$comments=count(M_Comment::all_Comments($article['id']))?></small></p> 
		<p class="text-muted text-center"><small>Comments</small> </p>
		</div>
	</div>
	<?php endforeach; ?>
</div>









