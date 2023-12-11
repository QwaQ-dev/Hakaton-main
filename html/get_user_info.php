<?php
require_once "../databaseconnect.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["userID"])) {
    $userID = $_POST["userID"];

    $sqlUserInfo = "SELECT 
        u.Username, 
        GROUP_CONCAT(ct.DifficultyID ORDER BY ct.ID) AS difficultyList, 
        GROUP_CONCAT(t.Description ORDER BY ct.ID) AS taskDescriptionList, 
        GROUP_CONCAT(ct.Answer ORDER BY ct.ID) AS answerList
    FROM 
        users u
    INNER JOIN 
        completedtasks ct ON u.ID = ct.UserID
    INNER JOIN 
        tasks t ON ct.TaskID = t.ID
    WHERE 
        u.ID = '$userID'
    GROUP BY 
        u.ID";

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
