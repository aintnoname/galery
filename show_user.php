<?php 
	require_once('core/init.php');
	include('changepass_modal.php');
	$user = new User();
	$photo = new Photo();
	if(!isset($_GET['id'])){
		User::redirect('users.php');
	}
		
	$profile = $user->user_by_id($_GET['id']);

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


  </head>

  <body>

    <div class="container">

      <!-- Static navbar -->
      <nav class="navbar navbar-default">

        <?php require_once('includes/top_nav.php'); ?>

      </nav>

          <div class="row">
               <div class="col-md-12">
                 
                    <div class="col-md-8 col-md-offset-2">
				<h3 align="center">Photos by <?php echo $profile->first()->first_name; ?></h3>
               <?php
                $photos = $photo->photos_by_id($_GET['id']); ?>
              <?php foreach ($photos->result() as $photo) : ?> 
                  
                <div class="col-md-4">       
                  <a class="thumbnail" href="photos.php?id=<?php echo $photo->id; ?>">
                    <img class=" img-responsive" id="picture" src="images/<?php echo $photo->filename; ?>">
                  </a> 
                  
                  <hr style="border:1px solid skyblue;">
                 </div>

               <?php endforeach; ?>
        

                
                    

                        </div>


				
                </div>

  			</div>
        
           


    </div> <!-- /container -->


    <?php require_once('includes/footer.php'); ?>

  </body>
</html>
