<?php
	$i = $_POST['ids'];

    $conn = mysqli_connect("127.0.0.1:3306", "admin", "12345", "site_db");
    if ($conn->connect_error) {
        echo "$conn->connect_error";
        die("Connection Failed : " . $conn->connect_error);
    } else {
        // Обновляем несколько полей одним запросом
        $stmt = $conn->prepare("UPDATE `mails` SET is_read=1 WHERE text_of_submit=?");
        // Привязываем параметры к запросу
        $stmt->bind_param("s",$i);
        // Выполняем запрос
        $execval = $stmt->execute();
    
        if ($execval) {
            // Перенаправление после успешного обновления
            header("Location: ../admin/adminsite.php");
            exit(); // Убедитесь, что после перенаправления код не выполняется
        } else {
            echo "Update failed...";
        }
    
        $stmt->close();
        $conn->close();
    }
    ?>