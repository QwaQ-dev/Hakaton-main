<?php
require_once "../databaseconnect.php";
session_start([
    'cookie_lifetime' => 86400,
]);


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
    <link rel="stylesheet" href="../css/style.css?v5">
    <link rel="stylesheet" href="../css/font.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.1/codemirror.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.1/theme/monokai.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.1/addon/hint/show-hint.min.css">
    <title>Main</title>

    <script>
        var editor;
        
        window.onload = function () {
            editor = CodeMirror.fromTextArea(document.getElementById("code"), {
                lineNumbers: true,
                mode: "python",
                theme: "monokai",
                extraKeys: {
                    "Ctrl-Space": function (cm) {
                        cm.showHint({ hint: CodeMirror.hint.tern });
                    },
                },
                hintOptions: {
                    tern: {
                        defs: ["browser", "ecmascript", "python"],
                        plugins: { python: {} },
                    },
                },
            });
        };
    </script>

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
            <img src="../img/Hackathon_logo-old.png" alt="">
        </div>
       <div class="lvl">
            <p class="lvl_title">
                1 Уровень:
            </p>
            <select class="lvl_name" id="lite">
            </select>
            <p class="lvl_title">
                2 Уровень:
            </p>
            <select class="lvl_name" id="normal">
            </select>
            <p class="lvl_title">
                3 Уровень:
            </p>
            <select class="lvl_name" id="hard">
            </select> 
           
        <!-- Опции будут загружены динамически из JavaScript -->
    </select>
        </div>
    <div class="user">
        <p class="user_id" id="username"><?php echo $username;?></p>
    </div>
    </div>
    <div class="cont">
        <div class="ttask">
            <div class="task">
                <p class="task_title">ERROR </br> </br> Задание не выбрано :(</p>
                <p class="desc"> </p>
                <p class="dop_info"> </p>
            </div>
        </div>
        <div class="aanswer">
            <div class="answer">
                <textarea class="answer_inp" name="code" id="code"></textarea>
                <div class="bbtn">
                    <button class="btn_answer">Отправить</button>
                </div>
            </div>
        </div>
    </div>

    <script src="script.js"></script>
    <script src="get_task_info.js"></script>
    <script src="send_answer.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.1/codemirror.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.1/mode/python/python.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.1/addon/hint/show-hint.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/acorn/8.3.0/acorn.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tern/0.23.0/tern.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tern/0.23.0/tern-python.min.js"></script>
</body>
</html>
