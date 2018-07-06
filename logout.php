<?php 
	require_once('core/init.php');

	$user = new User();
	$user->logout();
	User::redirect('index.php');



 ?>