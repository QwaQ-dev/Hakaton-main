<?php
require_once "../databaseconnect.php";
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Проверка существования пользователя в сессии
    if (!isset($_SESSION['user']) || $_SESSION['user']['Role'] !== 'admin') {
        header("Location: ../index.php"); // Перенаправление на страницу авторизации, если нет сессии или роль не администратор
        exit();
    }

    // Получение данных из формы
    $selectedID = $_POST["selectedID"];
    $answerText = $_POST["answer"];

    // Получение id пользователя из сессии
    $userID = isset($_SESSION['user']['ID']) ? $_SESSION['user']['ID'] : '';

    // Предотвращение SQL-инъекций
    $answerText = mysqli_real_escape_string($conn, $answerText);

    // Вставка данных в таблицу completedtasks
    $sql = "INSERT INTO completedtasks (UserID, TaskID, Answer) VALUES (?, ?, ?)";
    $stmt = mysqli_prepare($conn, $sql);

    if ($stmt) {
        // Привязка параметров
        mysqli_stmt_bind_param($stmt, "iis", $userID, $selectedID, $answerText);

        // Выполнение запроса
        if (mysqli_stmt_execute($stmt)) {
            echo "Ответ успешно отправлен!";
        } else {
            echo "Ошибка при отправке ответа. " . mysqli_error($conn);
        }

        // Закрытие подготовленного запроса
        mysqli_stmt_close($stmt);
    } else {
        echo "Ошибка при подготовке запроса. " . mysqli_error($conn);
    }
    
    // Закрытие соединения с базой данных
    mysqli_close($conn);
}
?>
