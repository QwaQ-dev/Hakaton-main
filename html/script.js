function loadTasks(difficultyID, selectId) {
    var select = document.getElementById(selectId);
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "./get_tasks.php?difficultyID=" + difficultyID, true);
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            var options = JSON.parse(xhr.responseText);

            // Очищаем существующие опции в select
            select.innerHTML = '';

            // Создаем и добавляем опции в select
            options.forEach(function(option) {
                var optionElement = document.createElement("option");
                optionElement.value = option.ID;
                optionElement.text = option.Title;
                select.appendChild(optionElement);
            });
        }
    };
    xhr.send();
}

// Вызов функций для загрузки опций в каждый селект
loadTasks(1, "lite");
loadTasks(2, "normal");
loadTasks(3, "hard");


document.getElementById("username").innerText = username;
