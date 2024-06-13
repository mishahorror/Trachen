<?php
$info_s = $_POST['info_s'];
$info_f = $info_s;
$t_i_u = $_POST['img'];
$tit = $_POST['tit'];
$di = $_POST['idd'];


// Database connection
$conn = mysqli_connect("127.0.0.1:3306", "admin", "12345", "site_db");
if ($conn->connect_error) {
    echo "$conn->connect_error";
    die("Connection Failed : " . $conn->connect_error);
} else {
    // Обновляем несколько полей одним запросом
    $stmt = $conn->prepare("UPDATE `tours` SET info_short=?, info_full=?, tour_img_url=?, title=? WHERE id=?");
    // Привязываем параметры к запросу
    $stmt->bind_param("ssssi", $info_s, $info_f, $t_i_u, $tit, $di);
    // Выполняем запрос
    $execval = $stmt->execute();

    if ($execval) {
        // Перенаправление после успешного обновления
        header("Location: ../admin/admin.php");
        exit(); // Убедитесь, что после перенаправления код не выполняется
    } else {
        echo "Update failed...";
    }

    $stmt->close();
    $conn->close();
}
?>