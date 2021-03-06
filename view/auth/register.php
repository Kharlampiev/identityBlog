<ul class="breadcrumb">
	<li><a href="index.php">Home</a></li>
	<li><?=$action_title?></li>
</ul>
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading"><?=$action_title?></div>
				<div class="panel-body">
					<?php if (count($errors) > 0):?>
						<div class="alert alert-danger">
							<strong>Whoops!</strong> There were some problems with your input.<br><br>
							<ul class="list-inline">
								<?php foreach ($errors as $error):?>
									<li><?=$error?></li>
								<?php endforeach;?>
							</ul>
						</div>
					<?php endif;?>
				<div class="panel-body">
					<form class="form-horizontal register" role="form" method="POST">
						<div class="form-group">
							<label class="col-md-4 control-label">Login</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="login" value="<?=$login?>" required autofocus>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-4 control-label">E-mail</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="email"  value="<?=$email?>" required>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-4 control-label">Password</label>
							<div class="col-md-6">
								<input type="password" class="form-control" name="password" placeholder="length at least 5 chars" required>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-4 control-label">Confirm Password</label>
							<div class="col-md-6">
								<input type="password" class="form-control" name="password_confirm" required>
							</div>
						</div>
							

						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<button type="submit" class="btn btn-primary">
									Register
								</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>