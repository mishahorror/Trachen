<?php
$what = $_POST['mail'];
$username = $_POST['text'];
$email = $_POST['email'];
$img_url = $_POST['url'];

// Database connection
$conn = mysqli_connect("127.0.0.1:3306", "admin", "12345", "site_db");
if ($conn->connect_error) {
    echo "$conn->connect_error";
    die("Connection Failed : " . $conn->connect_error);
} else {
    $query = "UPDATE `register` SET ";
    $params = [];
    $types = "";

    if (!empty($username)) {
        setcookie('username', "$username", time() + 3600, "/");
        $query .= "username=?, ";
        $params[] = &$username;
        $types .= "s";
    }

    if (!empty($email)) {
        setcookie('email', "$email", time() + 3600, "/");
        $query .= "email=?, ";
        $params[] = &$email;
        $types .= "s";
    }

    if (!empty($img_url)) {
        setcookie('img', "$img_url", time() + 3600, "/");
        $query .= "img_url=?, ";
        $params[] = &$img_url;
        $types .= "s";
    }

    // Remove trailing comma and space
    $query = rtrim($query, ', ');
    $query .= " WHERE email=?";
    $params[] = &$what;
    $types .= "s";


    $stmt = $conn->prepare($query);
    // Dynamically bind parameters
    call_user_func_array([$stmt, 'bind_param'], array_merge([$types], $params));

    $execval = $stmt->execute();

    if (empty($img_url)) {
        $query = "SELECT `img_url` FROM `register` WHERE email=?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($row = $result->fetch_assoc()) {
            $img_url = $row['img_url'];
        }
        $stmt->close();
    }





    if ($execval) {
        header("Location: ../account/account.php");
        exit();
    } else {
        echo "Update failed...";
    }

    $stmt->close();
    $conn->close();
}
?>