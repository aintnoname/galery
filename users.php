<?php 
	require_once('core/init.php');
	include('changepass_modal.php');


	$user = new User();

  $photo = new Photo();

  $photos = $photo->photos_by_id($user->data()->id);
  //var_dump($photos);
 //var_dump($photo->picture_path());
	if(!$user->isLoggedin()){
		User::redirect('index.php');
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


  </head>

  <body>

    <div class="container">

      <!-- Static navbar -->
      <nav class="navbar navbar-default">

        <?php require_once('includes/top_nav.php'); ?>

      </nav>

  

   


    <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                    
                        <div class="col-md-8">
                             
              <?php foreach ($photos->result() as $photo) : ?> 
                  
                <div class="col-md-4">       
                  <a class="thumbnail" href="photos.php?id=<?php echo $photo->id; ?>">
                    <img class=" img-responsive" id="picture" src="images/<?php echo $photo->filename; ?>">
                  </a> 
                  <a href="delete_photo.php?id=<?php echo $photo->id; ?>" id="action">Delete</a>
                  <hr style="border:1px solid skyblue;">
                 </div>

               <?php endforeach; ?>
        

                
                    

                        </div>


                        <div class="col-md-4" >
                            <div  class="photo-info-box">
                                <div class="info-box-header">
                                   <h4>Personal information <span id="toggle" class="glyphicon glyphicon-menu-up  pull-right"></span></h4>
                                </div>
                            <div class="inside">
                              <div class="box-inner">
                                 <p class="text">
                                   <span class="glyphicon glyphicon-calendar"></span> Joined on:<?php echo $user->data()->joined; ?>
                                  </p>
                                  <p class="text ">
                                    First Name: <span class="data"><?php echo $user->data()->first_name; ?></span>
                                  </p>
                                  <p class="text">
                                    Last Name: <span class="data"><?php echo $user->data()->last_name; ?></span>
                                  </p>
                                 <p class="text">
                                  City: <span class="data"><?php echo $user->data()->city; ?></span>
                                 </p>
                                 <p class="text">
                                   Email: <span class="data"><?php echo $user->data()->email; ?></span>
                                 </p>
                              </div>
                              
                              <hr>
                              <div class="info-box-footer clearfix">
                                <div class="info-box-update pull-right ">
                                   <a href="update_user.php" class="btn btn-success">Update</a>
                                </div>   
                              </div>
                            </div>          
                        </div>
                    </div>
                




                    </div>
                </div>
                <!-- /.row -->

            </div>
 </div> <!-- /container -->

 <?php require_once('includes/footer.php'); ?>
  </body>
</html>


  