












<?php
 include_once '../database.php';
 
 	if(isset($_POST['save'])) {
		include_once 'uploadphoto.php';
		if ($obj->edit($_POST['dressname'],$_POST['dresssize'],$_POST['dresstype'],$_POST['price'],$_POST['qty'],$_FILES['img']['name'],$_REQUEST['editid'])) {
			header("Location: ".$_SERVER['PHP_SELF']."page=itemlist");
		}
	 }
	
	if (isset($_REQUEST['editid'])) {
		
		$list = $obj->getItem($_REQUEST['editid']);
	}
?>
<div class="container">
	<form action="" method="post" enctype="multipart/form-data">
	<div class="row">
		<div class="col-md-6 col1">
			<div class="form-group">
				<label for="dressname">Dress name</label>
				<input class="form-control" value="<?= $list['dressname'] ?>" type="text" name="dressname" id="dressname" />
			</div>
		</div>
		<div class="col-md-6 col2">
			<div class="form-group">
				<label for="img">Upload image</label>
				<input type="file" name="img"  id="img" />
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-6">
			<div class="form-group">
				<label for="dresssize">Dress size</label>
				<input class="form-control" type="text" value="<?= $list['dresssize']?>" name="dresssize" id="dresssize" />
			</div>
		</div>
		<div class="col-md-6">
			<div class="form-group">
				<label for="dresstype">Dress type</label>
				<select name="dresstype" class="form-control">
					<option value="sando">Sando</option>
					<option value="sayal">Sayal</option>
					<option value="karsones">Karsones</option>
					<option value="tshirt">T-Shirt</option>
					<option value="polo">Polo</option>
					<option value="skinny">Skinny</option>
				</select>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-6">
			<div class="form-group">
				<label for="price">Price</label>
				<input type="text" name="price" value="<?= $list['price'] ?>" id="price" class="form-control" />
			</div>
		</div>
		<div class="col-md-6">
			<div class="form-group">
				<label for="qty">Quantity</label>
				<input type="text" name="qty" value="<?= $list['qty'] ?>" id="qty" class="form-control" />
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-xs-6 col-sm-4">&nbsp;</div>
		<div class="col-xs-6 col-sm-4">
			<input type="submit" class="btn btn-primary btn-lg btn-block" name="save" id="add" value="Save changes" />
		</div>
		
		<div class="clearfix visible-xs-block"></div>
		<div class="col-xs-6 col-sm-4">&nbsp;</div>
	</form>
</div>

<script>
	
</script>