
<?php
  if (isset($_REQUEST['remove'])) {
    if($obj->delete($_REQUEST['removeid'])) {
       header("Location: ".$_SERVER['PHP_SELF']."?page=itemlist");
    } else {
      echo "<h2>Delete Failed</h2>";
    }
  } 
?>
<div class="table-responsive">
	<table class="table table-striped">
       <thead>
          <tr>
            <th>Dress name</th>
            <th>Dress size</th>
            <th>Dress type</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Actions</th>
           </tr>
        </thead>
       <tbody>
         <?php
          
          $items = $obj->viewList();
          foreach ($items as $list)
          {
            echo "<tr>";
          ?>
            <td><?= $list['dressname'] ?></td>
            <td><?= $list['dresssize'] ?></td>
            <td><?= $list['dresstype'] ?></td>
            <td><?= sprintf("%.2f",$list['price']) ?></td>
            <td><?= $list['qty'] ?></td>
            <td>
              <a href="<?= $_SERVER['PHP_SELF']."?page=edit&editid=".$list['dressid']?>" class="glyphicon glyphicon-pencil" aria-hidden="true"></a>&nbsp;|&nbsp;
              <a href="<?= $_SERVER['PHP_SELF']."?page=itemlist&remove=true&removeid=".$list['dressid']?>" class="glyphicon glyphicon-trash" aria-hidden="true"></a>
            </td>
          <?php
          echo "</tr>";
          }
         ?>
        
	   </tbody>
	 </table>
</div>