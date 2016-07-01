<form class="form-horizontal" role="form" method="POST">
	<div class="form-group">
		<label  class="col-md-4 control-label">Name</label>
		<div class="col-md-6">
			<input type="text" name="name" placeholder="<?=$name?>">
		</div>
	</div>
	<div class="form-group">
		<label  class="col-md-4 control-label">Comment text</label>
		<div class="col-md-6">
			<input type="text" name="text" placeholder="<?=$text?>">
		</div>
	</div>			
	<div class="form-group">
		<div class="col-md-6 col-md-offset-4">
			<button type="submit" class="btn btn-primary">Send</button>
		</div>
	</div>
</form>

