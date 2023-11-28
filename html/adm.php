<?php
require_once "../databaseconnect.php";
session_start();

// Проверка наличия сессии (авторизации) и роли админа
if (!isset($_SESSION['user']) || $_SESSION['user']['Role'] !== 'admin') {
    header("Location: ../index.php"); // Перенаправление на страницу авторизации, если нет сессии или роль не администратор
    exit();
}

// Получение информации о пользователях из базы данных
$sqlUsers = "SELECT ID, Username FROM users";
$resultUsers = mysqli_query($conn, $sqlUsers);

// Массив для хранения ников и id пользователей
$users = array();

while ($rowUsers = mysqli_fetch_assoc($resultUsers)) {
    $users[] = array(
        'id' => $rowUsers['ID'],
        'username' => $rowUsers['Username']
    );
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/adm.css?v.02">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <title>Admin Panel</title>
</head>
<body>
    <div class="header">
        <div class="logo">
            <p class="logo_title">
                Hackaton Aqtobe
            </p>
        </div>
        <div class="user_frame">
            <p class="member">
                Участник:
            </p>
            <select id="users">
    <option value="" selected>Не выбрано</option>
    <?php
    foreach ($users as $user) {
        echo "<option value='{$user['id']}'>{$user['username']}</option>";
    }
    ?>
</select>
        </div>
        <div class="user">
            <p class="user_id" id="username"></p>
        </div>
    </div>
    <div class="cont">
        <div class="task_card">
            <h1 class="task_title"></h1>
            <p class="lvl" id="lvl">Уровень сложности: </p>
            <p class="answer" id="answer">Задание:<br></p>
            <p class="send_answer" id="send_answer">Ответ:</p>
        </div>
    </div>
    <script>
    $(document).ready(function () {
    $("#users").change(function () {
        var userID = $(this).val();
        $.ajax({
            url: 'get_user_info.php',
            method: 'post',
            data: {userID: userID},
            dataType: 'json',
            success: function (response) {
                $("#username").text(response.username);

                var difficultyList = response.difficultyList.split(',');
                var taskDescriptionList = response.taskDescriptionList.split(',');
                var answerList = response.answerList.split(',');

                // Очищаем предыдущие данные
                $(".task_card").remove();

                // Выводим новые данные
                for (var i = 0; i < difficultyList.length; i++) {
                    $(".cont").append('<div class="task_card">' +
                        '<h1 class="task_title">' + response.username + '</h1>' +
                        '<p class="lvl" id="lvl">Уровень: ' + difficultyList[i] + '</p>' +
                        '<p class="answer" id="answer">Задание: ' + taskDescriptionList[i] + '</p>' +
                        '<p class="send_answer" id="send_answer">Ответ: ' + answerList[i] + '</p>' +
                        '</div>');
                }
            }
        });
    });
});

    </script>
</body>
</html>
