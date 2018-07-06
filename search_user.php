<?php 
	require_once('core/init.php');

	$output = '';

	if(isset($_POST['user'])){
		
		$users = DB::getInstance()->search_user();
	$output .= '<div class="table-responsive">
				<table class="table table bordered">
				</tr>
					<th>User Name </th>
					<th>First Name</th>
					<th>Last Name</th>
					<th>City</th>
				</tr>';

		foreach ($users->result() as $user) {
		
				$output .= '<tr>

				<td><a href="show_user.php?id='.$user->id.'">'.$user->username.'</a></td>
				<td>'.$user->first_name.'</td>
				<td>'.$user->last_name.'</td>
				<td>'.$user->city.'</td>
				</tr>
				
				</div>';

			
		}
		echo $output;
		
		
	}else{
		echo "There is no such username";
	}
	

 ?>
