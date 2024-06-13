<?php
	$password = filter_var(trim($_POST['password']), FILTER_SANITIZE_STRING);
	$email = filter_var(trim($_POST['email']), FILTER_SANITIZE_STRING);

    $password = md5($password."qwertyaswer");

    $mysql = new mysqli("127.0.0.1:3306","admin","12345","site_db");
    
    $result = $mysql->query("SELECT * FROM `register` WHERE `email` = '$email' AND `password` = '$password'");
    $user = $result->fetch_assoc();
    if(count($user) == 0){
        echo "Такой пользователь не найден!";
        exit();
    }

    setcookie('user', $user['is_admin'], time() + 3600, "/");
    setcookie('username', $user['username'], time() + 3600, "/");
    setcookie('email', $user['email'], time() + 3600, "/");
    setcookie('img', $user['img_url'], time() + 3600, "/");


    header("Location: /test/dist/index.php");

    
    $mysql->close();
?>