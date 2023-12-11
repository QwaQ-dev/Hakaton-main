<?php
require_once "../databaseconnect.php";

// Получаем DifficultyID из параметра запроса
$difficultyID = isset($_GET['difficultyID']) ? intval($_GET['difficultyID']) : 1;

$sql = "SELECT ID, Title FROM tasks WHERE DifficultyID = $difficultyID";
$result = mysqli_query($conn, $sql);

$options = [["Title" => "Не выбрано"]];

while ($row = mysqli_fetch_assoc($result)) {
    $options[] = array(
        'ID' => $row['ID'],
        'Title' => $row['Title']
    );
}

mysqli_close($conn);

header('Content-Type: application/json; charset=utf-8');
echo json_encode($options);
?>
