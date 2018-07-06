  
  <div class="container-fluid">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
     <!-- Main component for a primary marketing message or call to action -->
          <div id="mySidenav" class="sidenav">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
            <a href="upload_photo.php">Upload pictures</a>
            <a href="search.php">Search</a>
            <?php if($user->isLoggedin()) : ?>
            <a href="users.php">Profile</a>
            <?php endif; ?>
          </div>

          <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; Story</span>
          </div>
          <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav pull-right">
              <li><a href="index.php">Home</a></li>
            
              <li class="dropdown">
                <?php if($user->isLoggedin()) : ?>
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-user"></span> Welcome <?php echo $user->data()->first_name; ?><span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href="logout.php"><span class="glyphicon glyphicon-off"></span> Logout</a></li>
                  <li><a href="" data-toggle="modal" data-target="#modalPass"><span class="glyphicon glyphicon-cog"></span> Change password</a></li>
                </ul>
                <?php else :?>
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-user"></span> Welcome<span class="caret"></span></a>
                   <ul class="dropdown-menu">
                  <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span>  Login</a></li>
                  <li><a href="register.php"><span class="glyphicon glyphicon-thumbs-up"></span> Register</a></li>
                </ul>
                <?php endif; ?>
              </li>
            </ul>
          </div><!--/.nav-collapse -->
        </div><!--/.container-fluid -->