<?php 
if($data['login_status']=="access_granted" && $_SESSION['show_login_status']) {
	$_SESSION['show_login_status'] = 0;
	echo '<div class="alert alert-success alert-dismissible fade show" role="alert">'.
	'Авторизация прошла успешно'.
	'<button type="button" class="close" data-dismiss="alert" aria-label="Close">'.
    '<span aria-hidden="true">&times;</span></button>' .
	'</div>';
}
?>

<form action="tasks/createTask" method="POST" class="mb-4">
	<div class="form-group">
		<label for="userInput">Имя пользователя</label> 
		<input type="text" class="form-control" name="user" id="userInput">
	</div>
	<div class="form-group">
		<label for="emailInput">Введите e-mail</label>
		<input type="text" class="form-control" name="email" id="emailInput" placeholder="example@ex.ru">
	</div>
	<div class="form-group">
		<label for="taskInput">Опишите задачу</label>
		<textarea name="body" class="form-control" id="bodyInput"></textarea>
	</div>

	<input type="submit" class="btn btn-primary" name="createTask" value="Создать задачу">
	<div>
		<?php 
			if (isset($_SESSION['formErrors'])) {
				foreach ($_SESSION['formErrors'] as $error) {
					echo '<div class="mt-3 alert alert-danger" role="alert">' . $error . '</div>';
				}
			} 
			if ($_SESSION['success_create_task']) {
				$_SESSION['success_create_task'] = false;
				echo '<div class="mt-5 alert alert-success alert-dismissible fade show" role="alert">'.
				'Задача создана успешно'.
				'<button type="button" class="close" data-dismiss="alert" aria-label="Close">'.
			    '<span aria-hidden="true">&times;</span></button>' .
				'</div>';
			}
		?>
	</div>
</form>

<?php
function getLabelAdministrator($bool) {
	return $bool ? 'Отредактировано администратором' : '';
}

function getStatus($bool) {
	return $bool ? 'Выполнено' : 'Не выполнено';
}
if ($data['isAuth']) {
	echo '<a href="/admin/logout">Выйти из профиля админа</a>';
} else {
	echo '<a href="/admin/login">авторизоваться</a>';
}
?>
<table id="tableTasks" class="mt-4">
	<thead>
		<tr>
			<th>Имя пользователя</th>
			<th>E-mail</th>
			<th class="sorting_disabled">Задача</th>
			<th>Статус</th>
			<th class="sorting_disabled">Метка администратора</th>
		</tr>
	</thead>
	<tbody>
		<?php
		if ($data['isAuth']) {
			include 'application/views/authTasks_view.php';
		} else {
			include 'application/views/nonAuthTasks_view.php';
		}
		?>
	</tbody>
</table>
