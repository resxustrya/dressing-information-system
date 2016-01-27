<?php include_once '../database.php'; 

if (!isset($_SESSION['GUEST'])){
      header('Location: ../todo-login.php');
      exit();
}
if (isset($_REQUEST['lougout'])) {
     if($obj->logout()) {
           header('Location: ../todo-login.php');
           exit();
     }
}
if (isset($_REQUEST['id'])) {
    $_SESSION['MYCART'][++$_SESSION['COUNT']] = $_REQUEST['id'];
}
?>
<!DOCTYPE html>
<html lang="en">
	<head><title>Dashboard</title>
	     <meta charset="utf-8">
           <meta http-equiv="X-UA-Compatible" content="IE=edge">
           <meta name="viewport" content="width=device-width, initial-scale=1">
           <link rel="stylesheet" type="text/css" href="../css/bootstrap/css/bootstrap.min.css" />
	     <link rel="stylesheet" type="text/css" href="css/dashboard.css" />
	
	</head>
<body>
   <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#dash">
               <span class="icon-bar"></span>
               <span class="icon-bar"></span>
               <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Dressing Information System</a>
        </div>
        <div class="collapse navbar-collapse" id="dash">
           <ul class="nav navbar-nav navbar-right">
               <li><a href="<?php echo $_SERVER['PHP_SELF'].'?lougout=true';?>">
                   <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                   <?php
                   
                        if (isset($_SESSION['USERID'])) {
                            $name = $obj->getName($_SESSION['USERID']);
                            echo $name['firstname']." ".$name['lastname'];
                        }
                   ?>
               </a></li>
           </ul>
        </div>
      </div>
    </nav>
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <li class="active"><a href="<?= $_SERVER['PHP_SELF'];?>"><?=$name['firstname']." ".$name['lastname']?> <span class="sr-only"></span></a></li>
            <li><a href="<?php echo $_SERVER['PHP_SELF'].'?page=listing'; ?>"><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true">&nbsp;</span>Item list</a></li>
            <li><a href="<?php echo $_SERVER['PHP_SELF'].'?page=paid'; ?>"><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true">&nbsp;</span>Items purchased</a></li>
            <li><a href="<?php echo $_SERVER['PHP_SELF'].'?page=cart'; ?>"><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true">&nbsp;</span>My Cart (<?=(isset($_SESSION['COUNT']))? $_SESSION['COUNT'] : 0?>) </a></li>
            <li><a href="<?php echo $_SERVER['PHP_SELF'].'?lougout=true';?>"><span class="glyphicon glyphicon-off" aria-hidden="true">&nbsp;</span>Logout</a></li>
          </ul>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h4 class="sub-header">
              <?php
              $page = "";
                if(isset($_REQUEST['page'])) {
                    switch($_REQUEST['page']) :
                        case 'profile' :
                            echo "Profile";
                            $page = 'profile';
                            break;
                        case 'listing':
                            echo "Item list";
                            $page = 'listing';
                            break;
                        case 'paid' :
                            echo "Purchased items";
                            $page = 'paid';
                            break;
                        case 'cart':
                            $page = 'cart';
                            echo "Items in your cart";
                            break;
                        case 'checkout' :
                            $page = 'checkout';
                            echo "Checkout";
                            break;
                        default:
                            echo "Overview";
                    endswitch;
                }
              ?>
          </h4>
          <?php
            if ($page != "") {
                switch ($page) :
                   case 'profile' :
                    include_once 'profile.php';
                    break;
                   case 'listing' :
                    include_once 'listing.php';
                    break;
                   case 'cart' :
                    include_once 'cart.php';
                    break;
                   case 'paid' :
                    include_once 'paid.php';
                    break;
                   case 'checkout' :
                    include_once 'checkout.php';
                endswitch;
            }
          ?>
        </div>
      </div>
    </div>
	
	<script src="css/bootstrap/js/jquery.js"></script>
    <script src="css/bootstrap/js/bootstrap.js"></script>
	<script src="js/warning.js"></script>
	<script src="js/holder.js"></script>
</body>
</html>