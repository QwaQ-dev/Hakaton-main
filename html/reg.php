<?php
require_once "../databaseconnect.php";
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["Username"];
    $password = $_POST["Password"];

    // Запрос к базе данных для проверки пользователя
    $sql = "SELECT * FROM users WHERE Username = '$username' AND Password = '$password'";
    $result = mysqli_query($conn, $sql);
    if ($result && mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);
        // Сохранение информации о пользователе в сессии
        $_SESSION['user'] = $user;

        // Проверка роли пользователя
        if ($user["Role"] == "admin") {
            header("Location: adm.php?id={$user['ID']}"); // Перенаправление на админ-панель с ID пользователя
            exit();
        } else {
            header("Location: index.php?username=$username&id={$user['ID']}"); // Перенаправление на главную страницу с именем пользователя и ID
            exit();
        }
    } else {
        echo '<script>alert("Неверное имя пользователя или пароль.");</script>';
    }
}

mysqli_close($conn);
?>







<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/reg.css">
    <link rel="stylesheet" href="../css/font.css">
    <title>Reg</title>
</head>
<body>
    <div class="container">
    <form action="" method="post">
            
            <h1>Вход</h1>
            
            <div class="input-box">
                <input type="text" placeholder="Имя" id="username" name="Username">
                <i class='bx bx-user'></i>
            </div>

            <div class="input-box">
                <input type="password" placeholder="Пароль" id="password" name="Password">
                <i class='bx bxs-lock-alt'></i>
            </div>

            <button class="btn" type="submit">Вход</button>
        </form>
    </div>

</body>
</html>