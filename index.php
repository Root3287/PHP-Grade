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
		<?php include 'assets/head.php'?>
	</head>
	<body>
		<?php include 'assets/nav.php'?>
		<div class="container">
			<div class="jumbotron">
				<h1><?php Setting::show('title')?></h1>
			</div>
		</div>
		<?php include 'assets/foot.php'?>
	</body>
</html>