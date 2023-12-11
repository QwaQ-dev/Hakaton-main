<?php
require_once "../databaseconnect.php";

// Получаем ID из параметра запроса
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Выполняем запрос к базе данных для получения данных по ID
$sql = "SELECT Title, Description FROM tasks WHERE ID = $id";
$result = mysqli_query($conn, $sql);

if ($result) {
    $taskDetails = mysqli_fetch_assoc($result);
    echo json_encode($taskDetails);
} else {
    echo json_encode(['error' => 'Ошибка выполнения запроса']);
}

mysqli_close($conn);
?>
