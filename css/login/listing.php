


<?php 

    include_once '../database.php';
    
    $items = $obj->viewList();

?>

<div class="row">
    <?php foreach($items as $list) :?>
        <div class="col-lg-4" style="text-align:left;">
          <img class="img-square" src="<?= '../images/'.$list['imgname']?>" width="140" height="140">
          <h5><?= $list['dressname']?></h5>
          <h6><?= "Size :".$list['dresssize'] ?></h6>
          <h5><?= "Price :".$list['price']?></h6>
          
          <p><a href="<?= $_SERVER['PHP_SELF'].'?page=listing&id='.$list['dressid']?>"" type="button" class="btn btn-info">Add to cart</a></p>
        </div>
        
    <?php endforeach; ?>    
</div>