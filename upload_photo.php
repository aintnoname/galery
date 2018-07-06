<?php 
	require_once('core/init.php');
  include('changepass_modal.php');

	$user = new User();
  $photo = new Photo();

  $message = '';
	if(!$user->isLoggedin()){
		User::redirect('login.php');
	}

    if(isset($_FILES['file'])){

        $validation = $user->check($_POST,array(
            'title' => array(
                'required' => true
            ),

            'description' => array(
                'required' => true
            )

        ));

        if($validation->passed()){
           $photo->set_file($_FILES['file']);

           $file = $_FILES['file'];
           $photo->upload_photo(array(
                'title' => User::get('title'),
                'description' => User::get('description'),
                'user_id' => $user->data()->id,
                'filename' => basename($file['name']),
                'type' => $file['type'],
                'size' => $file['size']
           ));
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


  </head>

  <body>

    <div class="container">

      <!-- Static navbar -->
      <nav class="navbar navbar-default">

        <?php require_once('includes/top_nav.php'); ?>

      </nav>

      <div class="container">
      
        <div class="col-md-3 col-md-offset-4">
          <?php if($user->error()) : ?>
          <div class="alert alert-danger">
            <?php 
              foreach($user->error() as $error) : ?>
              <p><?php echo $error; ?></p>
            <?php endforeach; ?>
          </div>
          <?php endif; ?>
      <form method="post" enctype="multipart/form-data" action="upload_photo.php">
                            
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" class="form-control">  
        </div>

        <div class="form-group">
            <label for="description">Description</label>
           <textarea name="description" cols="44" rows="10"></textarea>
        </div>

        <div class="form-group">
            <input type="file" name="file">  
        </div>

        <input type="submit" name="submit" class="btn btn-primary" value="Upload picture">

    </form>

</div>
        

      </div>

    </div> <!-- /container -->


    <?php require_once('includes/footer.php'); ?>

  </body>
</html>




