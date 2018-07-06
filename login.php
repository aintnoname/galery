<?php 
require_once('core/init.php');
if(isset($_POST['submit'])){
    
    $user = new User();
    $user = $user->check($_POST,array(
        'username' => array(
            'required' => true
        ),
        'password' => array(
            'required' => true
        )
    ));

    if($user->passed()){
       $login = $user->login(User::get('username'), User::get('password'));

       if($login){
        User::redirect('users.php');
       }else{
        echo "User coudnt be finded";
       }
    }else{
        foreach ($user->error() as $error) {
            echo $error. " ";
        }
    }
}

 ?>
 <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>


    <div class="container">    
        <div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
        <div class="panel panel-info" >

        <div class="panel-heading">
            <div class="panel-title">Sign In</div>
        </div>     

        <div style="padding-top:30px" class="panel-body" >

            <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
                
            <form class="form-horizontal" role="form" action="" method="post">
                        
                <div style="margin-bottom: 25px" class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                            <input id="login-username" type="text" class="form-control" name="username" value="" placeholder="username">                                        
                 </div>
                    
                <div style="margin-bottom: 25px" class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                            <input id="login-password" type="password" class="form-control" name="password" placeholder="password">
                </div>
                     
                    <div style="margin-top:10px" class="form-group">
                        <!-- Button -->

                        <div class="col-sm-12 controls">
                          <input type="submit" name="submit" class="btn btn-success" value="Login">
                        </div>
                    </div>


                    <div class="form-group">
                        <div class="col-md-12 control">
                            <div style="border-top: 1px solid#888; padding-top:15px; font-size:85%" >
                                Don't have an account! 
                            <a href="register.php">Register Here</a>
                            </div>
                        </div>
                    </div>    
                </form>     
            </div>                     
        </div>  
        </div>
    </div>
    