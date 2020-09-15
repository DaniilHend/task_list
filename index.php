<?
	require_once $_SERVER['DOCUMENT_ROOT']."/api/db.php";
	include 'api/check.php';
	session_start();
	// выход
	if(isset($_POST['logout']))
    {
        session_destroy();
        header('Location: /user.php');
    }
    // проверка на сессию
	if (get_login_status() == false) {
		header('Location: /user.php');
	}
	// создание задачи
	if (isset($_POST['submit']) && !empty($_POST['description']))
	{
		$new_task = $db->insert(
			'tasks', [
			'user_id' => $_SESSION['id'],
			'description' => htmlspecialchars($_POST['description'], ENT_QUOTES, 'UTF-8'),
			'status_id' => '1'
		]);
		header('Location: /');
	}
	// удаление задачи
	if (isset($_POST['delete']))
	{
		if (is_array($_POST['task_id']) == true)
		{
			foreach ($_POST['task_id'] as $task)
				{
				$delete_task = $db->delete(
					'tasks', [
					'AND' => [
						'user_id' => $_SESSION['id'],
						'id' => intval($task)
					]
				]);
			}
		} else {
			$delete_task = $db->delete(
				'tasks', [
				'AND' => [
					'user_id' => $_SESSION['id'],
					'id' => intval($_POST['task_id'])
				]
			]);
		}
		header('Location: /');
	}
	// переключение статуса задачи
	if (isset($_POST['complete']))
	{
		if (is_array($_POST['task_id']) == true)
		{
			foreach ($_POST['task_id'] as $task)
			{
				$new_task = $db->update(
					'tasks', [
					'status_id' => '2'], [
					'user_id' => $_SESSION['id'],
					'status_id' => '1',
					'id' => intval($task)
				]);
			}
		} else {
			$new_task = $db->update(
				'tasks', [
				'status_id' => '2'], [
				'user_id' => $_SESSION['id'],
				'status_id' => '1',
				'id' => intval($_POST['task_id'])
			]);
		}
		header('Location: /');
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Task list</title>
		<link rel="stylesheet" type="text/css" href="src/style/main.css">
	</head>
	<body>
		<div class="block">
			<form method="POST" action="/">
				<h1>Вы авторизованы как <?=$_SESSION['login']?></h1>
				<input type="submit" name="logout" value="Выйти">
				<div class="card">
					
					<h3>Создать задачу</h3>
					<input type="text" name="description" placeholder="description">
					<input type="submit" name="submit" value="Добавить">
					<input type="submit" name="delete" value="Удалить">
					<input type="submit" name="complete" value="Выполнено">
					
				</div>
				<?
				$tasks = $db->select(
					"tasks",
					'*',[
					'user_id' => $_SESSION['id']
				]);
				foreach ($tasks as $task):
				?>
				<div class="card status_<?=$task['status_id']?>">
					<p><?=htmlspecialchars($task['description'], ENT_QUOTES, 'UTF-8')?></p>
					<input type="checkbox" name="task_id[]" id="task<?=$task['id']?>" value="<?=$task['id']?>">
				</div>
				<?
				endforeach;
				?>
			</form>
		</div>
	</body>
</html>