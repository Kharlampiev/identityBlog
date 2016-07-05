<div class="row">
	<?php foreach ($articles as $article): ?>
	<div class="col-xs-12 col-md-12 grid">
		<div class="col-xs-8 col-md-8">
			<h3>
				<a href="index.php?c=article&action=get&id=<?=$article['id']?>"><?=$article['title']?></a>
			</h3>
			<p class="text-muted info-create">created:
				<?php $date=new DateTime($article['created_at']);
					print $date->format('d/m/Y') ?> by
				<?=$article['whoAdd']?>	
			</p>
		</div>
		<div class=" col-md-1 col-md-offset-1 text-center">
				<span class="label label-info">
				<?=$comments=count(M_Comment::allComments($article['id']))?>
				</span>
				<small class="text-muted">Comments</small>	
		</div>
		<div class=" col-md-1 col-md-offset-1 text-center">
				<span class="label label-success">
					<?php $views=M_Articles::showViewsArticle($article['id']);
					print count($views)?>
				</span> 
				<small class="text-muted">Views</small>
		</div>
	</div>
	<?php endforeach; ?>
</div>







<!--<p class="content"><?=M_Articles::previewArticles($article['content'],$len)?>
				<a href="index.php?c=article&action=get&id=<?=$article['id']?>">
				...читать далее
				</a>
			</p>-->