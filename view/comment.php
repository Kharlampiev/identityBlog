<p class="comments-number">Комментрии(<?=count($comments)?>)</p>
<?php foreach ($comments as $comment):?> 
	<div class="list-comments">
		<p class="comment-name">
			<?=$comment['name']?><br>
			<span><?=date( "m.d.y")?></span>
		</p>
		<p class="comment-text">
			<?=$comment['text']?>
		</p>
		<form method="post">
			<!--<input type="hidden" name="id_comment" value="<?=$comment['id_comment']?>">
			<input type="submit" name="c_delete" value="Удалить">-->
		</form>
	</div>
<?php endforeach;?>
