<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/font.css">
    <link rel="stylesheet" href="../css/lobby.css?v.10">
    <title>Lobby</title>
</head>
<body>
    <div class="container">
        <div class="main-info">
            <img src="../img/Hackathon_logo.png" alt="logo" class="logo-img"> 
            <div class="display_cont">
               
                <div class="countdown-container">
                    <h1 class="start">До начала:</h1>
                    <div id="countdown"></div>
                    <button id="startButton">Начать</button>
                </div>
            </div>
        </div>
        <img src="../img/sad.png" alt="" class="math">
        <div class="text_display">
            <div class="text_block">
                <h1 class="about">О мероприятии:</h1>
                <p class="text_about">Привет, уважаемые кодеры и программисты нашего колледжа! <br>Мы рады пригласить вас на самое захватывающее событие в мире программирования - хакатон 2023 ! ! ! </p>
                <p class="text_about">Вы можете показать себя как талантливый программист на языке Python, что в дальнейшем откроет для вас двери к новым возможностям и развитии в сфере прогроммирования!</p>
                <p class="text_about">Уникальные задачи и вызовы: Мы подготовили для вас увлекательные задачи, от лёгких до самых сложных!</p>    
            </div>
        </div>
        <div class="instr">
            <h1 class="instr-text">ошаговая Инструкция:</h1>
        </div>
        <div class="block_with_gifs">
            <div class="first_block">
                <img src="../img/1.gif" alt="gif" class="gifs">
                <div class="block_text">
                    <p class="gif_text" onmouseover="animateText()">1. Отсканируй QR-код!</p>
                    <p class="gif_text" onmouseover="animateText()">2. Заполни форму регистрации!</p>
                    <p class="gif_text" onmouseover="animateText()">3. Оставь свои контакты!</p>
                </div>
            </div>
            <div class="second_block">
                <div class="block_text">
                    <p class="gif_text" onmouseover="animateText()">1. Пригласи друзей!</p>
                    <p class="gif_text" onmouseover="animateText()">2. Подготовься к Хакатону!</p>
                    <p class="gif_text" onmouseover="animateText()">3. Следи за новостями!</p>
                </div>
                <img src="../img/2.gif" alt="gif" class="gifs">
            </div>
            <div class="third_block">
                <img src="../img/3.gif" alt="gif" class="gifs">
                <div class="block_text">
                    <p class="gif_text" onmouseover="animateText()">1. Приходи в назначеное место и время!</p>
                    <p class="gif_text" onmouseover="animateText()">2. Выполняй задания!</p>
                    <p class="gif_text" onmouseover="animateText()">3. Выигрывай!</p>
                </div>
            </div>
        </div>
        
        <div class="info">
            <div class="mail">
                <div class="mail-block">
                    <h2 class="mail-text">E-MAIL</h2>
                    <a href="#" class="a-style">hackathon_aqtobe@mail.ru</a>
                </div>
            </div>
            <div class="number">
                <div class="number-block">
                    <h2 class="phone">НОМЕР ТЕЛЕФОНА</h2>
                    <p class="phone-number">+7 (705) 671 13 60</p>
                </div>
            </div>
        </div>
    </div>
    
    

    <script src="html/timer.js"></script>
    <script src="html/chaotickEffect.js"></script>
</body>
</html>