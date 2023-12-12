<?php
$servername = "localhost"; // Адрес сервера MySQL
$username = "userh"; // Имя пользователя MySQL
$password = "root"; // Пароль пользователя MySQL
$dbname = "db_hackaton"; // Имя базы данных

// Устанавливаем соединение
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Проверяем соединение
if (!$conn) {
    die("Ошибка подключения к базе данных: " . mysqli_connect_error());
}


// Дальнейший код для работы с базой данных

// Закрываем соединение после использования
// mysqli_close($conn);

?>