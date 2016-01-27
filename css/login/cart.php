
<?php

  if(isset($_POST['checkout'])) {
    $_SESSION['QUANTITY'] = $_POST['qty'];
      header("Location: dashboard.php?page=checkout");
  }

?>

<div class="table-responsive">
	<table class="table table-striped">
       <thead>
          <tr>
            <td>Dress name</td>
            <td>Dress size</td>
            <td>Dress type</td>
            <td>Price</td>
            <td>Quantity</td>
           </tr>
        </thead>
       <tbody>
         <form action="" method="post">
         <?php
  
          include_once '../database.php';
          $total = 0;
         if(isset($_SESSION['MYCART'])) :
          foreach ($_SESSION['MYCART'] as $list)
          {
            $list = $obj->getItem($list);
            $total += $list['price'];
            echo "<tr>";
          ?>
            <td><?= $list['dressname'] ?></td>
            <td><?= $list['dresssize'] ?></td>
            <td><?= $list['dresstype'] ?></td>
            <td><?= sprintf("%.2f",$list['price']) ?></td>
            <td>
              <select name="qty[]">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
               </select>
             </td>
            <td>
              <a href="<?= $_SERVER['PHP_SELF']."?id=".$list['dressid']?>" class="glyphicon glyphicon-pencil" aria-hidden="true"></a>&nbsp;|&nbsp;
              <a href="<?= $_SERVER['PHP_SELF']."?id=".$list['dressid']?>" class="glyphicon glyphicon-trash" aria-hidden="true"></a>
            </td>
          <?php
          echo "</tr>";
          }
          endif;
         ?>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td><input type="submit" class="btn btn-success" name="checkout" value="Checkout" /></td>
        </tr>
	   </tbody>
     </form>
	 </table>
</div>