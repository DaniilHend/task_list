<?php
// Скрипт проверки
function get_login_status()
{
    if (isset($_COOKIE['login']) and isset($_COOKIE['cookie']))
    {
        // Соединямся с БД
        include "./api/db.php";
        // $userdata = $db->select("users",
        //     "*",[
        //     "login"=>$_COOKIE['login'],
        //     "LIMIT"=>1
        // ]);
        $userdata = $db->select("users",
            '*',[
            'login' => $_COOKIE['login']], [
            'LIMIT' => 1
        ]);
        // $query = mysqli_query($connect, "SELECT * FROM users WHERE id = '".intval($_COOKIE['id'])."' LIMIT 1");
        // $userdata = mysqli_fetch_assoc($query);

        if (($userdata[0]['cookie'] !== $_COOKIE['cookie']) or ($userdata[0]['login'] !== $_COOKIE['login']))
        {
            return false;
        }
        elseif (($userdata[0]['cookie'] === $_COOKIE['cookie']) and ($userdata[0]['login'] === $_COOKIE['login']))
        {
            return true;
        }
    }
    return false;
}

if(isset($_GET['logout']) and $_GET['logout'] == "Выйти")
{
    setcookie("login", "", time() - 3600*24*30*12, "/");
    setcookie("cookie", "0", time() - 3600*24*30*12, "/");
    ?>
    <script type="text/javascript">
        document.cookie = "login="+0+"; max-age="+(60*60*24*30);
        document.cookie = "cookie="+0+"; max-age="+(60*60*24*30);
        location.replace('/'); exit();
    </script>
    <?php
}
?>