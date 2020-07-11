<?php
	foreach ($data['tasks'] as $row) {
		echo '<tr><td>'.$row['user'].'</td><td>'.
		$row['email'] . '</td><td>' . 
		$row['body'] .'</td><td>'.
		getStatus($row['status']) .'</td><td>'.
		getLabelAdministrator($row['edit_administrator']) .'</td></tr>';
	}
?>