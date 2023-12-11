// const hackatonElement = document.querySelector('.gif_text');

// function animateText() {
//     // Получаем элемент с текстом "HACKATON

//     // Получаем текст из элемента
//     const originalText = hackatonElement.innerText;

//     // Меняем буквы в хаотичном порядке
//     const shuffledText = originalText.split('').sort(() => Math.random() - 0.5).join('');
//     hackatonElement.innerText = shuffledText;

//     // Ждем 1000 миллисекунд (1 секунда)
//     setTimeout(() => {
//         // Возвращаем буквы в исходный порядок
//         hackatonElement.innerText = originalText;
//     }, 1000);
// }