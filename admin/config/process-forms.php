<?php

	// If form is submitted
	$post = array_filter($_POST);

	if(isset($post) && !empty($post)) {
		// var_dump($post);

		$count = sizeof($post);
		$tableName = $post['table'];
		
		// Loop through POST array
		foreach ($post as $postedItem => $value) {

			// var_dump('key: '.$postedItem);
			if ($postedItem == 'content_text') {

				foreach ($value as $k => $v) {
					// Clean up any input
					$v = escape($v);
					// Create sql update statement
					$sql = "UPDATE ".$tableName." SET ";
					$sql .= $postedItem." = '".$v."' WHERE id = ".$k;
					// var_dump($sql);
					// Insert into db
					if(mysqli_query($conn, $sql)) {
						$mysqlResult = "Saved succesfully!";
					} else {
						$mysqlResult = "Error message: %s\n". mysqli_error($conn);
					}
					
				}
			}
		}
		
		// mysqli_close($conn);
	}

?>
			