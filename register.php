<?php 
	require_once('core/init.php');

	if(isset($_POST['submit'])){

		$user = new User();
		$user = $user->check($_POST,array(
			'username' => array(
				'required' => true,
				'min'     => 2,
				'max'	  => 50,
				'unique'  => 'users'
			),
			'password' => array(
				'required' => true,
				'min' 	   => 6
			),
			'password_again' => array(
				'required' => true,
				'matches'  => 'password'
			),
			'first_name' => array(
				'required' => true,
				'min'     => 2
			),
			'last_name'  => array(
				'required' => true,
				'min'     => 2
			),
			'email'	=> array(
				'required' => true
			),
			'city' => array(
				'required' => true,
				'min' => 2
			)
		));
		if(empty($user->error())){
			$salt = Hash::salt(32);

			try {
				$user->create(array(
					'username' => User::get('username'),
					'password' => Hash::make(User::get('password'), $salt),
					'city' => User::get('city'),
					'first_name' => User::get('first_name'),
					'last_name' => User::get('last_name'),
					'email' => User::get('email'),
					'joined' => date('Y-m-d H:i:s'),
					'salt' => $salt
				));

				User::redirect('users.php');
				
			} catch (Exception $e) {
				die($e->getMessage());
			}
		}else{
			foreach ($user->error() as $error) {
				echo $error. " ";
			}
		}

	}



 ?>

<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

<style>
	.container{
		padding-top:10%;
		padding-left:10%;
		position: absolute;
	}

</style>


<div class="container">
        <div class="row centered-form">
        <div class="col-xs-12 col-sm-8 col-md-4 col-sm-offset-2 col-md-offset-4">
    	<div class="panel panel-default">
		<div class="panel-heading">
	    		<h3 class="panel-title">Register</h3>
	 			</div>
	 			<div class="panel-body">
	    		<form role="form" action="" method="post">
	    			<div class="row">

	    				<div class="col-xs-6 col-sm-6 col-md-6">
	    					<div class="form-group">
	                <input type="text" name="first_name" id="first_name" class="form-control input-sm" placeholder="First Name">
	    					</div>
	    				</div>
	    				<div class="col-xs-6 col-sm-6 col-md-6">
	    					<div class="form-group">
	    						<input type="text" name="last_name" id="last_name" class="form-control input-sm" placeholder="Last Name">
	    					</div>
	    				</div>

	    				<div class="col-xs-6 col-sm-6 col-md-6">
	    					<div class="form-group">
	                			<input type="text" name="username" id="username" class="form-control input-sm" placeholder="Username">
	    					</div>
	    				</div>

	    				<div class="col-xs-6 col-sm-6 col-md-6">
	    					<div class="form-group">
	                			<input type="text" name="city" id="city" class="form-control input-sm" placeholder="City">
	    					</div>
	    				</div>


	    			</div>

	    			<div class="form-group">
	    				<input type="email" name="email" id="email" class="form-control input-sm" placeholder="Email Address">
	    			</div>

	    			<div class="row">
	    				<div class="col-xs-6 col-sm-6 col-md-6">
	    					<div class="form-group">
	    						<input type="password" name="password" id="password" class="form-control input-sm" placeholder="Password">
	    					</div>
	    				</div>
	    				<div class="col-xs-6 col-sm-6 col-md-6">
	    					<div class="form-group">
	    						<input type="password" name="password_again" id="password_again" class="form-control input-sm" placeholder="Confirm Password">
	    					</div>
	    				</div>
	    			</div>
	    			
	    			<input type="submit" name="submit" value="Register" class="btn btn-info btn-block">
	    		
	    		</form>
	    	</div>
    		</div>
    		</div>
    	</div>
    </div>