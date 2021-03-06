<?php
define('path', '../../');
require path.'inc/init.php';
$user = new User();
if(Input::exists()){
	if(Token::check(Input::get('token'))){
		$val = new Validation();
		$val->check($_POST, array(
				'name' => array(
						'required' => true,
				),
				'username' => array(
					'required' => true,
					'min' => 2,
					'max' => 50,
					'unique' => 'users'
				),
				'password' => array(
					'required' => true,
					'min' => 8
				),
				'password_conf' => array(
						'required' => true,
						'matches'=> 'password'
				)
		));
		if(!$val->passed()){
			
		}else{
			$user = new User();
			
			$salt = hash::salt(32);
			
			$password = hash::make(escape(Input::get('password')) , $salt);
			
			try{
				$user->create(array(
						'username' => escape(Input::get('username')),
						'password'=> Hash::make(escape(Input::get('password')), $salt),
						'salt' => $salt,
						'name'=> escape(Input::get('name')),
						'joined'=> date('Y-m-d- H:i:s'),
						'group'=> 1,
						'email'=> escape(Input::get('email')),
				));
			}catch (Exception $e){
				die($e->getMessage());
			}
			if($user->login(escape(Input::get('username')), escape(Input::get('password')), false)){
				Notifaction::createMessage('Welcome to the forums '. $user->data()->name, $user->data()->id);
				session::flash('complete', 'You completely register and you just got logged in.');
				Redirect::to(path.'index.php');
			}
		}
	}
}
?>
<html>
	<head>
	<?php Include path.'assets/head.php';?>
	</head>
	<body>
		<?php include path.'assets/nav.php';?>
		<div class="container">
			<?php if(Input::exists()): if(Token::check(Input::get('token'))): if(!$val->passed()):?>
				<div class="alert alert-danger"><?php foreach ($val->errors() as $error){echo $error.'<br/>';}?></div>
			<?php endif;endif;endif;?>
			<div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
				<h1>Register</h1>
				<form action="" method="post">
					<div class="form-group">
						<input name="name" value="<?php echo Input::get('name');?>" placeholder="Name" type="text" class="form-control input-lg">
					</div>
					<div class="form-group">
						<input name="username" value="<?php echo Input::get('username');?>" placeholder="username" type="text" class="form-control input-lg">
					</div>
					<div class="row">
						<div class="col-xs-12 col-md-6">
							<div class="form-group">
								<input name="password" value="<?php echo Input::get('password');?>" placeholder="Password" type="password" class="form-control input-lg">
							</div>
						</div>
						<div class="col-xs-12 col-md-6">
							<div class="form-group">
								<input name="password_conf" placeholder="Confirm Password" type="password" class="form-control input-lg">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-xs-12 col-md-6">
							<div class="form-group">
								<a href="../../pages/login" class="btn btn-lg btn-block btn-danger">Login</a>
							</div>
						</div>
						<div class="col-xs-12 col-md-6">
							<div class="form-group">
								<input type="submit" class="btn btn-lg btn-block btn-primary" value="Register">
								<input type="hidden" name="token" value="<?php echo Token::generate();?>"/>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
		<?php include path.'assets/foot.php';?>
	</body>
</html>
