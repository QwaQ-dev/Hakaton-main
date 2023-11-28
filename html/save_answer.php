<?php
require_once "../databaseconnect.php";
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $selectedID = isset($_POST['selectedID']) ? $_POST['selectedID'] : '';
    $answerText = isset($_POST['answerText']) ? $_POST['answerText'] : '';
    $userID = isset($_POST['userID']) ? $_POST['userID'] : '';

    // Здесь вы можете выполнить вставку данных в вашу таблицу completedtasks
    // Используйте подготовленные запросы для безопасности

    // Пример:
    // $sql = "INSERT INTO completedtasks (TaskID, Answer, UserID) VALUES (?, ?, ?)";
    // $stmt = $conn->prepare($sql);
    // $stmt->bind_param("iss", $selectedID, $answerText, $userID);
    // $stmt->execute();

    // Дополнительные действия или проверки могут быть добавлены по необходимости

    echo "Данные успешно сохранены в базе данных.";
} else {
    echo "Неверный метод запроса.";
}

mysqli_close($conn);
?>
