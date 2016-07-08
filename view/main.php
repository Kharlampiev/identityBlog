<?php 
$mUsers=M_Users::getInstance();
?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="utf-8"> 
	<title><?=$action_title?></title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="view/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="view/css/main.css">
</head>
<body>
	<div class="page-wrap">
		<nav class="navbar navbar-default ">
			<div class="container">
				<div class="navbar-header">
			   		<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
       				<span class="sr-only">Toggle navigation</span>
       				<span class="icon-bar"></span>
        			<span class="icon-bar"></span>
        			<span class="icon-bar"></span>
     				</button>
    					<a href="index.php" class="navbar-brand">IDENTITY</a>
				</div>
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav ">
						<li><a href="index.php">Home</a></li>
					</ul>
					<ul class="nav navbar-nav navbar-right">
						<?php if (isset($_SESSION['login'])):?>
						<?php $uid=$mUsers->getUid();?>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><?=$_SESSION['login']?><span class="caret"></span></a>
							<ul class="dropdown-menu" role="menu">
								<li><a href="index.php?c=users&action=logout">Logout</a></li>
								<li><a href="index.php?c=users&action=profile&id=<?=$uid?>">Profile</a><li>
							</ul>
						</li>
						<?php else:?>
						<li><a href="index.php?c=users&action=login">Login</a></li>
						<li><a href="index.php?c=users&action=register">Registration</a></li>
						<?php endif; ?>
					</ul>
				</div>
			</div>
		</nav>
		
		<div class="container">
			<div class="row">
		 		<div class=" col-xs-10 col-md-10 col-md-offset-1">
		 		<div class=" col-xs-3 col-md-3">
					<div class="btn-group">
  						<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Sort by <span class="caret"></span></button>
  						<ul class="dropdown-menu">
  							<li><a href="index.php">Show All</a></li>
  							<li role="separator" class="divider"></li>
    						<li><a href="index.php?c=article&action=sort&date=lastmonth">Last month</a></li>
   							<li><a href="index.php?c=article&action=sort&date=lastweek">Last week</a></li>
    						<li><a href="index.php?c=article&action=sort&date=lastday">Last day</a></li>
    					</ul>
					</div>
		 		</div>
		 		<?php if (isset($_SESSION['login'])):?>
		 			<div class=" col-xs-3 col-md-3 col-xs-offset-6 col-md-offset-6 text-right">
						<a  class="btn" href="index.php?c=article&action=add">Create post</a>
					</div>
				<?php endif; ?>
		 		</div>
			</div>
		</div>
		
		<div class="container">
			<div class="row">
				<div class=" col-xs-12 col-md-10  col-md-offset-1">
					<div class="panel panel-default">
						<div class="panel-heading main "></div>
						<div class="panel-body">
						<?=$site_content?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="view/js/bootstrap.min.js"></script>
</body>
</html>
