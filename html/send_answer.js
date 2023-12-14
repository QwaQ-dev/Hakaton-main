// Функция для отправки ответа на сервер
function sendAnswer(taskID, answerText, difficulty) {
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "./submit_answer.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    // Собираем данные для отправки
    var data = "taskID=" + taskID + "&answer=" + encodeURIComponent(answerText) + "&difficultyID=" + difficulty;

    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4) {
            if (xhr.status === 200) {
                console.log(xhr.responseText); // Выводим ответ сервера в консоль
            } else {
                console.error("Ошибка при отправке запроса: " + xhr.status);
            }
        }
    };

    xhr.send(data);
}

// Обработчик события для кнопки "Отправить"
var answerButton = document.querySelector(".btn_answer");
answerButton.addEventListener("click", function () {
    var taskID, difficulty, answerText;

    // Определяем выбранный уровень сложности и получаем TaskID
    if (liteSelect.value != 'undefined') {
        taskID = liteSelect.value;
        difficulty = "1";
    } else if (normalSelect.value != 'undefined') {
        taskID = normalSelect.value;
        difficulty = "2";
    } else if (hardSelect.value != 'undefined') {
        taskID = hardSelect.value;
        difficulty = "3";
    }

    // Получаем текст ответа
    var answerText = editor.getValue();
    

    if (answerText == '') {
        alert("необходимо ввести текст");
    } else if (typeof taskID == 'undefined') {
        alert("необходимо выбрать задание");
    } else {
        // Отправляем данные на сервер
        sendAnswer(taskID, answerText, difficulty);

        document.querySelector(".answer_inp").value = '';

        alert("отправлено!");
    }
});
