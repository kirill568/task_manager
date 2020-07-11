<?php
	$id = 0;
	foreach ($data['tasks'] as $row) {
		echo '<tr><td>'.$row['user'].'</td><td>'.
		$row['email'] . '</td><td>' .
		'<form action="/tasks/updateBody?id='. $row['id'] .'" method="POST">' .
		'<textarea name="body" class="form-control">' . $row['body'] . '</textarea>' .
		'<input type="submit" class="mt-2 btn btn-primary" value="Сохранить"> </form> </td><td>' .
		'<form action="/tasks/updateStatus?id='. $row['id'] .'" method="POST">' . 
		'<input type="checkbox" class="checkbox" name="taskStatus" class="form-control" id="statusInput'. $id .'" value="' . $row['status'] . '">' . 
		'<label for="statusInput'. $id .'">' . getStatus($row['status']) . '</label>'.
		' </form></td><td class="administratorLabel">'. 
		$row['edit_administrator'] .
		' </td></tr>';
		$id+=1;
	}
?>