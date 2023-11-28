<?php
require_once "./databaseconnect.php";
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
            header("Location: html/adm.php?id={$user['ID']}"); // Перенаправление на админ-панель с ID пользователя
            exit();
        } else {
            header("Location: html/index.php?username=$username&id={$user['ID']}"); // Перенаправление на главную страницу с именем пользователя и ID
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
    <link rel="stylesheet" href="../css/reg.css?v.01">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,600;
    1,700&family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,800;1,800&display=swap" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Reg</title>
</head>
<body>
    <div class="container">
    <form action="" method="post">
            
            <h1>Вход</h1>
            
            <div class="input-box">
                <input type="text" placeholder="Name" id="username" name="Username">
                <i class='bx bx-user'></i>
            </div>

            <div class="input-box">
                <input type="password" placeholder="Password" id="password" name="Password">
                <i class='bx bxs-lock-alt'></i>
            </div>

            <button class="btn" type="submit">Login</button>
        </form>
    </div>

</body>
</html>