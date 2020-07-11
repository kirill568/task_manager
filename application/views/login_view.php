<h1>Страница авторизации</h1>
<form action="/admin/login" method="post">
	<div class="form-group">
		<label for="logintInput">Логин</label>
		<input type="text" class="form-control" name="login" id="loginInput">
	</div>

	<div class="form-group">
		<label for="passwordInput">Пароль</label>
		<input type="password" class="form-control" name="password" id="passwordInput">
	</div>

	<input type="submit" class="btn btn-primary" name="submit" value="Войти">
</form>


<?php extract($data);
if($login_status=="access_denied") {
	echo '<div class="mt-3 alert alert-danger" role="alert">Логин и/или пароль введены неверно.</div>';
}?>
