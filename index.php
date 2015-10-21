<?php
define('path', '');
include path.'inc/init.php';
$user = new User();
if(!$user->isLoggedIn()){
	Redirect::to(path.'pages/login');
}else{
}
?>