<?php 
 	require_once('core/init.php');
    include('changepass_modal.php');

  	$user = new User();



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
                             
                    <h2 align="center">Searh user on platform</h2>
                    <div class="col-md-6 col-md-offset-3">
                    <div class="form-group">
                    	<div class="input-group">
                    		<span class="input-group-addon">Search</span>
							<input type="text" name="search_user" id="search_user" placeholder="Search by user name" class="form-control">
                    	</div>
                    </div>
                    <br>
                <div id="result"></div>
                </div>
				
                </div>

  			</div>
        
           


    </div> <!-- /container -->


    <?php require_once('includes/footer.php'); ?>

  </body>
</html>
