




<div class="table-responsive">
	<table class="table table-striped">
       <thead>
          <tr>
            <td>Dress name</td>
           </tr>
        </thead>
       <tbody>
         <form action="" method="post">
         <?php
  
         
         $items = $obj->purchaselist($_SESSION['USERID']);
        
          foreach ($items as $list)
          {
            echo "<tr>";
          ?>
            <td><?= $list['dressname'] ?></td>
          <?php
          echo "</tr>";
          }
         ?>
	   </tbody>
     </form>
	 </table>
</div>