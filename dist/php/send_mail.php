<?php
	$email = $_POST['user_email'];
	$username = $_POST['name_of_user'];
	$text = $_POST['text_of_mail'];
    if($_COOKIE['img'] != ''):
        $img_url = $_COOKIE['img'];
    else:
        $img_url = "https://as2.ftcdn.net/v2/jpg/03/31/69/91/1000_F_331699188_lRpvqxO5QRtwOM05gR50ImaaJgBx68vi.jpg";
    endif;

	// Database connection
	$conn = mysqli_connect("127.0.0.1:3306","admin","12345","site_db");
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into mails(email_of_sender, text_of_submit, user_name, sub_img_url) values(?, ?, ?, ?)");
		$stmt->bind_param("ssss", $email, $text, $username, $img_url);
		$execval = $stmt->execute();
        header("Location: ../../localhost/index/index.php");
		$stmt->close();
		$conn->close();
	}
?>