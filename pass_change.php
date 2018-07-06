<?php 
	require_once('core/init.php');

	$user = new User();
	if(!$user->isLoggedin()){
		User::redirect('index.php');
	}

	if(isset($_POST)){
	
		$validation = $user->check($_POST,array(
			'password' => array(
				'require' => true,
				'min' => 6,
			),
			'newpass' => array(
				'require' => true,
				'min' => 6,
			),
			'newagain' => array(
				'require' => true,
				'min'  => 6,
				'matches' => 'newpass'
			)
		));	

		if($validation->passed()){
			if(Hash::make(User::get('password'), $user->data()->salt) !== $user->data()->password){
				echo 'Password incorect';
			}else{

			$salt = Hash::salt(32);
			$validation->update(array(
				'password' => Hash::make(User::get('newpass'), $salt),
				'salt' => $salt
			));
			echo 'Password has been changed succesfuly';
			}
		}else{
			foreach ($validation->error() as  $error) {
				echo $error. " ";
			}
		}
	}

 ?>