<?php
require_once "../databaseconnect.php";
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $taskID = $_POST["taskID"];
    $answerText = $_POST["answer"];
    $difficultyID = $_POST["difficultyID"];
    
    // Получение id пользователя из сессии
    $userID = isset($_SESSION['user']['ID']) ? $_SESSION['user']['ID'] : '';

    // Вставка данных в таблицу completedtasks
    $sql = "INSERT INTO completedtasks (UserID, TaskID, DifficultyID, Answer) VALUES ('$userID', '$taskID', '$difficultyID', '$answerText')";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        echo "Ответ успешно отправлен!";
    } else {
        echo "Ошибка при отправке ответа. ". mysqli_error($conn);
    }
}

mysqli_close($conn);
?>
