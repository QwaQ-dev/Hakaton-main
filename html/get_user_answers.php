<?php
require_once "../databaseconnect.php";

// Обработка запроса
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Получение ID пользователя из запроса
    $userId = $_POST['userId'];

    // Защита от SQL-инъекций (используйте подготовленные запросы или экранирование данных)
    $userId = mysqli_real_escape_string($conn, $userId);

    // Выполнение запроса к вьюхе completedtasks_view для получения данных по пользователю
    $sql = "SELECT UserName, TaskTitle, TaskDescription, UserAnswer FROM completedtasks_view WHERE UserID = '$userId'";
    $result = mysqli_query($conn, $sql);

    $data = array();

    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            // Добавление данных в массив
            $data[] = $row;
        }

        // Возвращение данных в формате JSON
        echo json_encode(array_map(function($item) {
            return is_array($item) ? array_map('htmlspecialchars', $item) : htmlspecialchars($item);
        }, $data));
    } else {
        // Ошибка выполнения запроса
        echo json_encode(array('error' => 'Ошибка выполнения запроса'));
    }

    // Закрытие соединения с базой данных
    mysqli_close($conn);
} else {
    // Обработка некорректного запроса
    echo json_encode(array('error' => 'Некорректный запрос'));
}
?>
