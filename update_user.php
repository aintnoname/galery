<?php 
	require_once('core/init.php');
	//include('changepass_modal.php');
	$user = new User();
	$photo = new Photo();

	$message = '';

	
		if(isset($_POST['submit'])){

			$validation = $user->check($_POST,array(
			'username' => array(
				'required' => true,
				'min'     => 2,
				'max'	  => 50,
				
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

			if($validation->passed()){
				$user->update(array(
					'first_name' => User::get('first_name'),
					'last_name' => User::get('last_name'),
					'username' => User::get('username'),
					'city' => User::get('city'),
					'email' => User::get('email')
				));

				User::redirect('users.php');

				//echo User::get('first_name');

			}else{
				foreach ($validation->error() as $error) {
					echo $error;
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
	    		<h3 class="panel-title">Update your profile</h3>
	 			</div>
	 			<div class="panel-body">
	    		<form method="post" action="update_user.php">
	    			<div class="row">
	    				<div class="col-xs-6 col-sm-6 col-md-6">
	    					<div class="form-group">
	    						<label for="first_name">First name</label>
	                <input type="text" name="first_name" id="first_name" class="form-control input-sm" placeholder="First Name" value="<?php echo $user->data()->first_name; ?>">
	    					</div>
	    				</div>
	    				<div class="col-xs-6 col-sm-6 col-md-6">
	    					<div class="form-group">
	    						<label for="last_name">Last name</label>
	    						<input type="text" name="last_name" id="last_name" class="form-control input-sm" placeholder="Last Name" value="<?php echo $user->data()->last_name; ?>">
	    					</div>
	    				</div>

	    				<div class="col-xs-6 col-sm-6 col-md-6">
	    					<div class="form-group">
	    						<label for="username">Username</label>
	                			<input type="text" name="username" id="username" class="form-control input-sm" placeholder="Username" value="<?php echo $user->data()->username; ?>">
	    					</div>
	    				</div>

	    				<div class="col-xs-6 col-sm-6 col-md-6">
	    					<div class="form-group">
	    						<label for="city">City</label>
	                			<input type="text" name="city" id="city" class="form-control input-sm" placeholder="City" value="<?php echo $user->data()->city; ?>" >
	    					</div>
	    				</div>


	    			</div>

	    			<div class="form-group">
	    				<label for="email">Email</label>
	    				<input type="email" name="email" id="email" class="form-control input-sm" placeholder="Email Address" value="<?php echo $user->data()->email; ?>">
	    			</div>

	    			
	    			
	    			<input type="submit" name="submit" value="Update profile" class="btn btn-info btn-block">
	    		
	    		</form>
	    	</div>
    		</div>
    		</div>
    	</div>
    </div>




