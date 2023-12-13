let countdownDate = new Date("Dec 20, 2023 10:00:00").getTime();
let countdownElement = document.getElementById("countdown");
let startButton = document.getElementById("startButton");

function startTimer() {
  let timerInterval = setInterval(function() {
    let now = new Date().getTime();
    let distance = countdownDate - now;

    let days = Math.floor(distance / (1000 * 60 * 60 * 24));
    let hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    let minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    let seconds = Math.floor((distance % (1000 * 60)) / 1000);

    // Форматирование времени в "dd:hh:mm ss"
    let formattedTime = pad(days, 2) + ":" + pad(hours, 2) + ":" + pad(minutes, 2) + " " + pad(seconds, 2);

    // Разделяем секунды для применения разного размера шрифта
    let secondsPart = formattedTime.split(' ')[1];
    
    countdownElement.innerHTML = pad(days, 2) + ":" + pad(hours, 2) + ":" + pad(minutes, 2) + " " + '<span class="seconds">' + secondsPart + '</span>';

    if (distance <= 0) {
      clearInterval(timerInterval);
      countdownElement.innerHTML = "START!";

      // Активируем кнопку
      startButton.disabled = false;

      // Назначаем функцию для перехода на другую страницу при нажатии на кнопку
      startButton.onclick = function() {
        window.location.href = "/html/reg.php";
      };
    }
  }, 10); // Уменьшил интервал до 10 миллисекунд для более точного отображения времени
}

// Дополнительная функция для добавления нулей к числу
function pad(number, length) {
  let str = '' + number;
  while (str.length < length) {
    str = '0' + str;
  }
  return str;
}

window.onload = function() {
  startTimer();
};
