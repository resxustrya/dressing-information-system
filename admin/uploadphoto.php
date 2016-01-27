



<?php

$path = "../images/";

if(is_dir($path)) {
	move_uploaded_file($_FILES['img']['tmp_name'], $path . $_FILES['img']['name']);
}

?>
