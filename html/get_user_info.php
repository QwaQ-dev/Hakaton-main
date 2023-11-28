<?php
require_once "../databaseconnect.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["userID"])) {
    $userID = $_POST["userID"];

    // Получение информации о пользователе из базы данных
    $sqlUserInfo = "SELECT users.Username, GROUP_CONCAT(completedtasks.DifficultyID ORDER BY completedtasks.DifficultyID) AS difficultyList, 
                    GROUP_CONCAT(tasks.Description ORDER BY completedtasks.DifficultyID) AS taskDescriptionList, 
                    GROUP_CONCAT(completedtasks.Answer ORDER BY completedtasks.DifficultyID) AS answerList
                    FROM users
                    INNER JOIN completedtasks ON users.ID = completedtasks.UserID
                    INNER JOIN tasks ON completedtasks.TaskID = tasks.ID
                    WHERE users.ID = '$userID'
                    GROUP BY users.ID";

    $resultUserInfo = mysqli_query($conn, $sqlUserInfo);

    if ($resultUserInfo && mysqli_num_rows($resultUserInfo) > 0) {
        $userInfo = mysqli_fetch_assoc($resultUserInfo);

        $response = array(
            'username' => $userInfo['Username'],
            'difficultyList' => $userInfo['difficultyList'],
            'taskDescriptionList' => $userInfo['taskDescriptionList'],
            'answerList' => $userInfo['answerList']
        );

        echo json_encode($response);
    } else {
        echo json_encode(array());
    }
}

mysqli_close($conn);
?>
