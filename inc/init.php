<?php
$GLOBALS['config'] = array(
	"config"=>array("name" => "Forums"),
	"mysql" => array(
		"host" => "127.0.0.1",
		"user" => "root",
		"password" => "",
		"db" => "grade",
		"port" => "3306",
	),
	"remember" => array(
		"expiry" => 604800,
	),
	"session" => array (
		"token_name" => "token",
		"cookie_name"=>"cookie",
		"session_name"=>"session"
	),
);


session_start();

spl_autoload_register(function($class){
	require path.'inc/classes/'.$class.'.class.php';
});

require_once 'sanitize.php';

//if(!file_exists(path.'install/index.php')){
	$db = DB::getInstance();
	if(Cookies::exists(Config::get('session/cookie_name')) && !Session::exists(Config::get('session/session_name'))){
		$hash = Cookies::get(Config::get('session/cookie_name'));
		$hashCheck= $db->get('user_session', array('hash','=',$hash));
		if($hashCheck->count()){
			$user = new User($hashCheck->first()->user_id);
			$user->login();
		}
	}
	ini_set('diplay_errors', Setting::get('debug'));
	$error_reporting =(Setting::get('debug') == 'Off')? '0':'-1';
	error_reporting($error_reporting);
//}else{
//	error_reporting(0);
//}