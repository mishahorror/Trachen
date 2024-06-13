<?php
	$username = $_POST['username'];
	$password = $_POST['password'];
	$email = $_POST['email'];

	setcookie('user', "0", time() + 3600, "/");
	setcookie('username', "$username", time() + 3600, "/");
	setcookie('email', "$email", time() + 3600, "/");
	setcookie('img', "https://as2.ftcdn.net/v2/jpg/03/31/69/91/1000_F_331699188_lRpvqxO5QRtwOM05gR50ImaaJgBx68vi.jpg", time() + 3600, "/");


    $password = md5($password."qwertyaswer");
	// Database connection
	$conn = mysqli_connect("127.0.0.1:3306","admin","12345","site_db");
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into register(username, email, password) values(?, ?, ?)");
		$stmt->bind_param("sss", $username, $email, $password);
		$execval = $stmt->execute();
		echo $execval;
		echo "Registration successfully...";
        header("Location: /test/dist/index.php");
		$stmt->close();
		$conn->close();
	}
?>