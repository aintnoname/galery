<?php 
	require_once('core/init.php');
	include('changepass_modal.php');

	$photos = new Photo();
	$user = new User();
	$comments = new Comment();

	if(empty($_GET['id'])){
		User::redirect('users.php');
	}
	$id = $_GET['id'];
	

	
	$photo = $photos->photo_by_id($id);


	 
              		
	// var_dump($photo);
	// if(!$photo->count()){
	// 	echo 'error';
	// }else{
	// print_r($photo);
	// }

	$msg = '';
	if(isset($_POST['submit'])){
		if($_POST['comment'] != ''){
		$comments->create_comment('comments', array(
			'author' => User::get('author'),
			'comment' => User::get('comment'),
			'photo_id' => $id,
			'created' => date('Y-m-d H:i:s')
		));
		User::redirect('index.php');
		}else{
			$msg = 'Empty comments are not alowed!';
		}
	}



	
 ?>

 <!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    

    <title>Life in Picture</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

  

    <!-- Custom styles -->
    <link href="css/style.css" rel="stylesheet">
	
	<style>
		
	#picture{
		height: 200px;
		width: 300px;
		border: 1px solid red;
	}


	</style>

  </head>

  <body>

    <div class="container">

      <!-- Static navbar -->
      <nav class="navbar navbar-default">

        <?php require_once('includes/top_nav.php'); ?>

      </nav>

  

   


    <div id="page-wrapper">

            <div class="container-fluid">
                <div class="row">
                	<div class="col-md-6 col-md-offset-3">
         			<?php 

         			/****error****/
         				// var_dump($photo->first()->user_id);

         				// $sql = "SELECT * FROM users WHERE id = ? ";
         				// $name =  DB::getInstance()->query($sql, array($photo->first()->user_id));
         				// var_dump($name);

         			 ?>
    
                	<h1><?php echo $photo->first()->title; ?></h1>
                   
			<hr>
			
         		 <img class="img-responsive" id="picture" src="images/<?php echo $photo->first()->filename; ?>">

         		 <hr>

         		 	<div class="well">
                	<p><?php echo $photo->first()->description; ?></p>
                </div>
            <hr>
            <?php if($user->isLoggedin()): ?>
			<div class="well">
              <h4>Leave a Comment:</h4>

                    <form role="form" method="post" action="">
                        <div class="form-group">
                           <label for="author">Author</label>
                          <input type="text" name="author" class="form-control" value="<?php echo $user->data()->first_name; ?>" readonly >
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" name="comment" rows="3"></textarea>
                        </div>
                        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                    </form>
          <div><?php// echo $msg; ?></div>

             </div>
         	<?php endif; ?>
				<?php 
					$comment = $comments->show_comment($photo->first()->id);
					// var_dump($photo->first()->id);
					//var_dump($id);
					//var_dump($comment);
				 ?>
				 <?php foreach ($comment->result() as $com) : ?>
					<hr>
				 	<p>Comment by: <a href="profile.php?name=<?php echo $com->author; ?>"><?php echo $com->author; ?></a></p>
					<div class="well">
						<?php echo $com->comment; ?>
					</div>
				 	<p> posted on: <?php echo $com->created; ?></p>
                <!--ERROR-->
               <!-- <?php if($photo->first()->user_id === $user->data()->id): ?>
                    <a href="delete_comment.php?id=<?php echo $com->id; ?>">Delete</a>
                <?php endif; ?> -->

         		<?php endforeach; ?>

         		 </div>
                </div>
               

            </div>
     </div>
 </div> <!-- /container -->

 <?php require_once('includes/footer.php'); ?>
  </body>
</html>