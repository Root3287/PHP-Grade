<?php
define('path', '');
include path.'inc/init.php';
$user = new User();
if(!$user->isLoggedIn()){
	Redirect::to(path.'pages/login');
}
?>
<html>
	<head>
		<?php include path.'assets/head.php'?>
	</head>
	<body>
		<?php include path.'assets/nav.php'?>
		<div class="container">
			<div class="row">
				<div class="jumbotron">
					<h1><?php Setting::show('title')?></h1>	
				</div>
			</div>
			<div class="">
			
			</div>
		</div>
		<?php include path.'assets/foot.php';?>
	</body>
</html>