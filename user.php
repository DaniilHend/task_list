<!DOCTYPE html>
<html>
	<head>
		<title>Task list</title>
		<link rel="stylesheet" type="text/css" href="src/style/main.css">
	</head>
	<body>
		<div class="block">
			<form method="POST" action="/api/reg.php">
				<h2>Вход</h2>
				<input type="text" name="login" id="auth_login" placeholder="Логин">
				<input type="password" name="password" id="auth_password" placeholder="Пароль">
				<input type="submit" name="submit_log">
			</form>
			<form method="POST" action="/api/reg.php">
				<h2>Регистрация</h2>
				<input type="text" name="login" id="reg_login" placeholder="Логин">
				<input type="password" name="password" id="reg_password" placeholder="Пароль">
				<input type="password" name="password_check" id="reg_password_check" placeholder="Пароль повторно">
				<input type="submit" name="submit_reg">
			</form>
		</div>
	</body>
</html>