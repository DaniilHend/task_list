<?
require_once $_SERVER['DOCUMENT_ROOT']."/api/db.php";
include 'api/check.php';
?>
<!DOCTYPE html>
<html>
	<head>
		<?
		if (get_login_status() == true)
		{
			$login = $_COOKIE['login'];
		} else {
			?><meta http-equiv="refresh" content="1;URL=user.php" /> </head><?
		}
		?>
		<title>Task list</title>
		<link rel="stylesheet" type="text/css" href="src/style/main.css">
	</head>
	<body>
		<div class="block">
			<h1>Вы авторизованы как <?=$login?></h1>
			<?
			$tasks = $db->select("tasks",
            	"*",[
            	"LIMIT"=>1
			]);
			foreach ($tasks as $task):
			?>
			<div class="card">
				<p><?=$task['description']?></p>
			</div>
			<?
			endforeach;
			?>
		</div>
	</body>
</html>