
<?php
  
    if(isset($_REQUEST['removeuser'])) {
      if ($obj->removeuser($_REQUEST['delid'])) {
         echo '<div class="alert alert-success" role="alert"><h5>User was remove</div>';
      }
    }
?>
<div class="table-responsive">
	<table class="table table-striped">
       <thead>
          <tr>
            <th>Firstname</th>
            <th>Lastname</th>
           </tr>
        </thead>
       <tbody>
         <?php
          include_once '../database.php';
          
          $items = $obj->userlist();
          foreach ($items as $list)
          {
            echo "<tr>";
          ?>
            <td><?= $list['firstname'] ?></td>
            <td><?= $list['lastname'] ?></td>
            <td>
              <a href="<?= $_SERVER['PHP_SELF']."?page=customer&removeuser=true&delid=".$list['userid']?>" class="glyphicon glyphicon-trash" aria-hidden="true"></a>
            </td>
          <?php
          echo "</tr>";
          }
         ?>
        
	   </tbody>
	 </table>
</div>