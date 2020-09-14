<?
	$log_status = "";
	$data = $_POST;
	require_once $_SERVER['DOCUMENT_ROOT']."/api/db.php";

	function generateCode($length = 6)
	{
	    $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHI JKLMNOPRQSTUVWXYZ0123456789";
	    $code = "";
	    $clen = strlen($chars) - 1;
	    while (strlen($code) < $length)
	    {
	        $code.= $chars[mt_rand(0, $clen) ];
	    }
	    return $code;
	}

	function set_cookie()
	{
		
		
	}

	if (isset($data['submit_log'])) {
		$user_check = $db->select("users",
			'*',[
            'login' => $data['login']], [
            'LIMIT' => 1
        ]);
        if ($user_check[0]) {
        	if (((password_verify($data['password'], $user_check[0]['password_hash'])) == true)) {
				$hash = md5(generateCode(10));
				$db->update("users",[
					'cookie' => $hash ], [
					'login' => $data['login']
				]);
					// Ставим куки
					setcookie("login", $data['login'], time()+60*60*24*30, "/", null, null, true);
	                setcookie("cookie", $hash, time()+60*60*24*30, "/", null, null, true);
        	print_r($user_check);
	                ?><meta http-equiv="refresh" content="1;URL=../" /> </head><?
			} else {
				$log_status = 'Неверно указан пароль';
			}
        }
	}

	// проверки при регистрации
	if (isset($data['submit_reg']))
	{

		$errors = array();

		$login_check = $db->select("users",
			'login',[
            'login' => $data['login']], [
            'LIMIT' => 1
        ]);

        if ( ($login_check) )
		{
			$errors[] = 'Пользователь с таким логином уже существует!';
		}

		if (iconv_strlen($data['login']) > 16) {
			$errors[] = 'Слишком длинное имя пользователя!';
		}

		if ( ($data['password']) == '' )
		{
			$errors[] = 'Введите пароль!';
		}

		if ( ($data['password_check']) != $data['password'] )
		{
			$errors[] = 'Повторный пароль введён не верно!';
		}
		// создание пользователя
		if( empty($errors))
		{
			$db->insert('users', [
	    		'login' => $data['login'],
	    		'password_hash' => md5(md5($data['password']))
			]);
			$hash = md5(generateCode(10));
			$db->update("users",[
				'cookie' => $hash ], [
				'login' => $data['login']
			]);
			//$q = "UPDATE users SET hash='".$hash."' WHERE id=".$data['id'];


			
				// Ставим куки
				setcookie("login", $data['login'], time()+60*60*24*30, "/", null, null, true);
                setcookie("cookie", $hash, time()+60*60*24*30, "/", null, null, true);
                ?><meta http-equiv="refresh" content="1;URL=../" /> </head><?
		}
		else
		{
			echo $errors[0];
		}
	}
?>