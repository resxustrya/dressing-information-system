
<?php
  $inctr = 0;
  $success = false;
  if (isset($_POST['pay'])) {
    foreach($_SESSION['MYCART'] as $insert)
    {
      if ($obj->buyDress($insert,$_SESSION['USERID'],$_SESSION['QUANTITY'][$inctr])) {
         $success = true;
         $obj->updateQty($insert,$_SESSION['QUANTITY'][$inctr]);
      }
      $inctr++;
    }
    if($success) {
      unset($_SESSION['MYCART']);
      unset($_SESSION['QUANTITY']);
      unset($_SESSION['COUNT']);

      echo '<div class="alert alert-success" role="alert"><h3>Purchase finished</h3></div>';
    }
  }
?>
<div class="table-responsive">
	<table class="table table-striped">
       <thead>
          <tr>
            <td>Dress no.</td>
            <td>Dress name</td>
            <td>Price</td>
            <td>Quantity selected</td>
            <td>Subtotal</td>
           </tr>
        </thead>
       <tbody>
         <form action="" method="post">
         <?php
  
          $total = 0;
          $ctr = 0;
          $subtotal = 0;
         if(isset($_SESSION['MYCART'])) :
          foreach ($_SESSION['MYCART'] as $list)
          {
            $list = $obj->getItem($list);
            echo "<tr>";
          ?>
            <td><?= $list['dressid'] ?></td>
            <td><?= $list['dressname'] ?></td>
            <td><?= sprintf("%.2f",$list['price']) ?></td>
            <td><?= $_SESSION['QUANTITY'][$ctr] ?></td>
            <td>
              <?php
                $subtotal += ($list['price'] * $_SESSION['QUANTITY'][$ctr]);
                echo sprintf("%.2f",$subtotal);
                $total += $subtotal;
              ?>
            </td>
            
          <?php
          echo "</tr>";
          $ctr++;
          }
          endif;
         ?>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>Total amount : <?= sprintf("%.2f",$total)?></td>
          <td><input type="submit" class="btn btn-success" name="pay" value="Pay" /></td>
        </tr>
	   </tbody>
     </form>
	 </table>
</div>