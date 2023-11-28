// Функция для загрузки данных по ID и вывода в элементы
function loadTaskDetails(selectedID, titleElement, descElement) {
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "./get_task_details.php?id=" + selectedID, true);
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            var taskDetails = JSON.parse(xhr.responseText);

            // Выводим данные в соответствующие элементы
            titleElement.innerText = taskDetails.Title;
            descElement.innerText = taskDetails.Description;
        }
    };
    xhr.send();
}

// Обработчик событий для изменения выбора для всех селектов
function handleSelectChange(select, titleElement, descElement) {
    var selectedID = select.value;
    loadTaskDetails(selectedID, titleElement, descElement);
}

// Получаем элементы <select> и соответствующие элементы отображения
var liteSelect = document.getElementById("lite");
var normalSelect = document.getElementById("normal");
var hardSelect = document.getElementById("hard");

var taskTitleElement = document.querySelector(".task_title");
var descElement = document.querySelector(".desc");

// Обработчики событий для изменения выбора
liteSelect.addEventListener("change", function() {
    handleSelectChange(liteSelect, taskTitleElement, descElement);
    normalSelect.value = 'undefined';
    hardSelect.value = 'undefined';
});

normalSelect.addEventListener("change", function() {
    handleSelectChange(normalSelect, taskTitleElement, descElement);
    liteSelect.value = 'undefined';
    hardSelect.value = 'undefined';
});

hardSelect.addEventListener("change", function() {
    handleSelectChange(hardSelect, taskTitleElement, descElement);
    liteSelect.value = 'undefined';
    normalSelect.value = 'undefined';
});
