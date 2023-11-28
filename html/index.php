<?php
require_once "../databaseconnect.php";
session_start();

// Проверка наличия сессии (авторизации)
if (!isset($_SESSION['user'])) {
    header("Location: ../index.php"); // Перенаправление на страницу авторизации, если нет сессии
    exit();
}

// Получение информации о пользователе из сессии
$user = $_SESSION['user'];
$username = $user['Username'];
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Main</title>

    <?php
    $username = isset($_GET['username']) ? $_GET['username'] : ''; // Получаем имя пользователя из параметра запроса
    $username = isset($_GET['ID']) ? $_GET['ID'] : '';
    ?>
    <script>
        var username = "<?php echo $username; ?>"; // Передаем имя пользователя в JavaScript
    </script>
</head>
<body>
    <div class="header">
        <div class="logo">
            <p class="logo_title">
                Hackaton <p class="aqt">Aqtobe</p>
            </p>
        </div>
        <div class="lvl">
            <p class="lvl_title">
                Легкий:
            </p>
            <select class="lvl_name" id="lite">
            </select>
            <p class="lvl_title">
                Средний:
            </p>
            <select class="lvl_name" id="normal">
            </select>
            <p class="lvl_title">
                Сложный:
            </p>
            <select class="lvl_name" id="hard">
            </select>
           
        <!-- Опции будут загружены динамически из JavaScript -->
    </select>
        </div>
    <div class="user">
        <p class="user_id" id="username"><?php echo $username; ?></p>
    </div>
    </div>
    <div class="cont">
        <div class="task_title_bg">
            <p class="task_title"> </p>
        </div>
        <div class="task">
            <p class="desc"> </p>
            <p class="line"></p>
            <p class="dop_info"> </p>
         </div>
        <div class="answer">
            <textarea class="answer_inp"></textarea>
            <button class="btn_answer">Отправить</button>
        </div>
    </div>

    <script src="script.js"></script>
    <script src="get_task_info.js"></script>
    <script src="send_answer.js"></script>
    
</body>
</html>