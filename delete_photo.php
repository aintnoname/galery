<?php 
	require_once('core/init.php');
	$user = new User;
	$photo = new Photo;

	if(!$user->isLoggedin()){
		User::redirect('index.php');
	}

	
	if(empty($_GET['id'])){

		User::redirect('users.php');
	}else{

	$photo->delete_photo($_GET['id']);

		User::redirect('users.php');
	}
	

	

 ?>