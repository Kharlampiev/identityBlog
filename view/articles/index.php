<div class="row">
	<?php foreach ($articles as $article): ?>
	<div class="col-xs-12 col-md-12 grid">
		<div class="col-xs-6 col-md-8">
			<h3>
				<a href="index.php?c=article&action=get&id=<?=$article['id']?>"><?=$article['title']?></a>
			</h3>
			<p class="text-muted info-create">created:
				<?php $date=new DateTime($article['created_at']);
					print $date->format('d/m/Y') ?> by <?=$article['whoAdd']?>
			</p>
		</div>
		<div class=" col-xs-3 col-md-2  text-center">
				<p class="label label-info"><?=$comments=count(M_Comment::allComments($article['id']))?></p>
				<p><small class="text-muted">Comments</small></p>	
		</div>
		<div class=" col-xs-3  col-md-2 text-center">
				<p class="label label-success">
				<?php $views=M_Articles::showViewsArticle($article['id']);
				print count($views)?></p> 
				<p class="text-center"><small class="text-muted">Views</small></p> 
		</div>
	</div>
	<?php endforeach; ?>
</div>







<!--<p class="content"><?=M_Articles::previewArticles($article['content'],$len)?>
				<a href="index.php?c=article&action=get&id=<?=$article['id']?>">
				...читать далее
				</a>
			</p>-->