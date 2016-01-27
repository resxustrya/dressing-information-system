<?php include_once '../database.php'; 
ini_set('display_erros','off');
ini_set('log_errors','on');


if (!isset($_SESSION['ADMIN'])){
      header('Location: ../todo-login.php');
      exit();
}
if (isset($_REQUEST['lougout'])) {
     if($obj->logout()) {
           header('Location: ../todo-login.php');
           exit();
     }
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
               <li><a href="#">
                   <?php
                        if (isset($_SESSION['USERID'])) {
                            $name = $obj->getName($_SESSION['USERID']);
                            echo '<span style="color:#fff;">Hi, <span>'.$name['firstname']." ".$name['lastname'];
                        }
                   ?>
               </a></li>
               <li><a href="<?php echo $_SERVER['PHP_SELF'].'?page=newitem'; ?>"><span class="glyphicon glyphicon-plus" aria-hidden="true">&nbsp;</span>New Item</a></li>
               <li><a href="<?php echo $_SERVER['PHP_SELF'].'?page=customer'; ?>"><span class="glyphicon glyphicon-user" aria-hidden="true">&nbsp;</span>Customers</a></li>
               <li><a href="<?php echo $_SERVER['PHP_SELF'].'?page=itemlist'; ?>"><span class="glyphicon glyphicon-th-list" aria-hidden="true">&nbsp;</span>Items</a></li>
               <li><a href="<?php echo $_SERVER['PHP_SELF'].'?lougout=true';?>"><span class="glyphicon glyphicon-off" aria-hidden="true">&nbsp;</span>Logout</a></li>
           </ul>
        </div>
      </div>
    </nav>
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <li class="active"><a href="<?=$_SERVER['PHP_SELF'];?>">Overview <span class="sr-only">(current)</span></a></li>
            <li><a href="<?=$_SERVER['PHP_SELF'].'?page=newitem'; ?>"><span class="glyphicon glyphicon-plus" aria-hidden="true">&nbsp;</span>New Item</a></li>
            <li><a href="<?=$_SERVER['PHP_SELF'].'?page=customer'; ?>"><span class="glyphicon glyphicon-user" aria-hidden="true">&nbsp;</span>Customers</a></li>
            <li><a href="<?=$_SERVER['PHP_SELF'].'?page=itemlist'; ?>"><span class="glyphicon glyphicon-th-list" aria-hidden="true">&nbsp;</span>Items</a></li>
            <li><a href="<?=$_SERVER['PHP_SELF'].'?lougout=true';?>"><span class="glyphicon glyphicon-off" aria-hidden="true">&nbsp;</span>Logout</a></li>
          </ul>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h3 class="page-header">Dashboard</h3>
          <h4 class="sub-header">
              <?php
              $page = "";
                if(isset($_REQUEST['page'])) {
                    switch($_REQUEST['page']) :
                        case 'newitem' :
                            echo "New item";
                            $page = 'newitem';
                            break;
                        case 'customer':
                            echo "Customer list";
                            $page = 'customer';
                            break;
                        case 'itemlist':
                            $page = 'itemlist';
                            echo "Item list";
                            break;
                        case 'edit' :
                            echo "Edit item";
                            $page = 'edit';
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
                   case 'newitem' :
                    include_once 'newitem.php';
                    break;
                   case 'customer' :
                    include_once 'customer.php';
                    break;
                   case 'itemlist' :
                    include_once 'itemlist.php';
                    break;
                   case 'edit';
                    include_once 'edit.php';
                    break;
                endswitch;
            }
          ?>
        </div>
      </div>
    </div>
	
        <script src="../css/jquery.js"></script>
        <script src="../css/bootstrap.js"></script>
	<script src="js/warning.js"></script>
	<script src="js/holder.js"></script>
</body>
</html>