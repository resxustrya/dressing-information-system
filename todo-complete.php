





<?php

	include_once 'database.php';

		$data = $obj->viewList();

		if($data != null) {
			echo json_encode($data);
		} else {
			echo "No result found";
		}
?>
