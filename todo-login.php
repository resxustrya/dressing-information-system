
<?php
    
    include_once 'database.php';
     if(isset($_POST['signup'])) {
        if ($obj->signup($_POST['username'],$_POST['password'],$_POST['firstname'],$_POST['lastname']))
        {
            if($obj->login($_POST['username'],$_POST['password'])){
                $_SESSION['GUEST'] = true;
                header("Location: user/dashboard.php");
                exit();
            }
        }
    }
  if (isset($_SESSION['ADMIN'])){
      header("Location: admin/dashboard.php");
  }
  if(isset($_SESSION['GUEST'])) {
      header("Location: user/dashboard.php?page=listing");
  }
    if (isset($_POST['signin'])) {
        $res = $obj->login($_POST['username'],$_POST['password']);
        if ($res) {
            if ($res < 0 ) {
                $_SESSION['GUEST'] = true;
                $_SESSION['COUNT'] = 0;
                header("Location: user/dashboard.php?page=listing");
            } else {
                $_SESSION['ADMIN'] = true;
                header("Location: admin/dashboard.php");
            }
        } else {
            echo "<h2>&nbsp;</h2>";
            echo '<div class="container">';
            echo '<div class="alert alert-danger" role="alert">Login failed</div>';
            echo '</div>';
        }
    }
?>

<!DOCTYPE html>
<html>
    <head><title>Login</title>
        <?php include_once 'head.php'; ?>
    <link rel="stylesheet" type="text/css" href="css/todo-signin/sign.css" />
    </head>
       
    <body>
        <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        
                    </button>
                    <a class="navbar-brand" href="todo-login.php">Dressing Information System</a
                </div>
            </div>
        </nav>
        <h2 style="margin:0px;">&nbsp;</h2>
        <div class="container">
            <form class="form-signin" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" > 
                <div class="form-group">
                    <input type="text" name="username" id="username" class="form-control" placeholder="Username" required autofocus />
                </div>
                <div class="form-group">
                    <input type="password" id="password" name="password" class="form-control" placeholder="Password" required />
                </div>
                <div class="form-group">
                 <a href="#" data-toggle="modal" data-target="#myModal">Signup</a>
                </div>
                <div class="form-group">
                    <input class="btn btn-lg btn-primary btn-block" name="signin" type="submit" value="Sign in" />
                </div>
            </form>
        </div>
        
       
        <div class="modal" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Signup</h4>
                </div>
                <div class="modal-body">
                   <form action = "" method="post">
                      <div class="form-group">
                          <label for="email">Username</label>
                          <input type="text" name="username" class="form-control" id="username" required />
                      </div>
                      <div class="form-group">
                          <label for="password">Password</label>
                          <input type="password" name="password" class="form-control" id="password" required />
                      </div>
                      <div class="form-group">
                          <label for="firstname">Firstname</label>
                          <input type="text" name="firstname" class="form-control" id="fname" required />
                      </div>
                      <div class="form-group">
                          <label for="lastname">Lastname</label>
                          <input type="text" name="lastname" class="form-control" id="lname" required />
                      </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-primary" name="signup" value="Signup" />
                </div>
                </form>
            </div>
        </div>
        
    <?php   include_once 'js.php'; ?>
        
        <script>
            (function (){
                $('#username').val('');
                $('#password').val('');
                $('#lname').val('');
                $('#fname').val('');
                $('#username').val('');
                $('#password').val('');
            })();
        </script>
    </body>
</html>