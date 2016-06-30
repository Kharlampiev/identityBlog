<div class="row">
	<?php foreach ($articles as $article): ?>
	<div class="col-xs-12 col-md-12 grid">
		<div class="col-xs-8 col-md-8">
			<h3>
				<a href="index.php?c=article&action=get&id=<?=$article['id']?>"><?=$article['title']?></a>
			</h3>
			<p class="text-muted">created:
				<?php $date=new DateTime($article['date']);
					print $date->format('d/m/Y') ?> by
				<?=$article['whoAdd']?>	
			</p>
			<!--<p class="content"><?=M_Articles::previewArticles($article['content'],$len)?>
				<a href="index.php?c=article&action=get&id=<?=$article['id']?>">
				...читать далее
				</a>
			</p>-->
		</div>
		<div class=" col-md-1 col-md-offset-1">
		<p class="text-muted text-center"><small>
			<?=$comments=count(M_Comment::all_Comments($article['id']))?></small></p> 
		<p class="text-muted text-center"><small>Comments</small> </p>
		</div>
		<div class=" col-md-1 col-md-offset-1">
		<p class="text-muted text-center"><small>
			<?php $views=M_Articles::showViewsArticle($article['id']);
			print count($views)?></small></p> 
		<p class="text-muted text-center"><small>Views</small> </p>
		</div>
	</div>
	<?php endforeach; ?>
</div>









