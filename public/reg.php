<?php
// Объявляем переменные
$nameErr = $eduErr = $cityErr = $gradeErr = $phoneErr = $emailErr = $telegramErr = $skillsErr = $projErr = $reasonErr = "";
$name = $edu = $city = $phone = $email = $telegram = $skills = $proj = $reason = $question = "";



// Если сервер вернул результат, то обрабатываем пришедшие данные
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Флаг толерантности
    $check = true;

    // Ошибка в поле "ФИО"
    if (empty($_POST["name"])) {
        $nameErr = "Это поле обязательно для заполнения";
        $check = false;
    }
    else {
        $name = test_input($_POST["name"]);
    }

    // Ошибка в поле "Место обучения"
    if (empty($_POST["edu"])) {
        $eduErr = "Это поле обязательно для заполнения";
        $check = false;
    }
    else {
        $edu = test_input($_POST["edu"]);
    }

    // Ошибка в поле "Город проживания"
    if (empty($_POST["city"])) {
        $cityErr = "Это поле обязательно для заполнения";
        $check = false;
    }
    else {
        $city = test_input($_POST["city"]);
    }

    // Ошибка в поле "Класс обучения"
    if (empty($_POST["grade"])) {
        $gradeErr = "Это поле обязательно для заполнения";
        $check = false;
    }
    else
        $grade = test_input($_POST["grade"]);

    // Ошибка в поле "Почта"
    if (empty($_POST["email"])) {
        $emailErr = "Это поле обязательно для заполнения";
        $check = false;
    } else {
        $email = test_input($_POST["email"]);

        // Валидируем адрес
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Неверно указан адрес электронной почты";
            $check = false;
        }
    }

    // Ошибка в поле "Номер телефона"
    if (empty($_POST["phone"])) {
        $phoneErr = "Это поле обязательно для заполнения";
        $check = false;
    }
    else {
        $phone = test_input($_POST["phone"]);

        // Валидируем телефон
        if (!preg_match("/^\\+?[1-9][0-9]{7,14}$/",$phone)) {
            $phoneErr = "Неверно указан номер";
            $check = false;
        }
    }

    // Ошибка в поле "Ник в telegram"
    if (empty($_POST["telegram"])) {
        $telegramErr = "Это поле обязательно для заполнения";
        $check = false;
    } else {
        $telegram = test_input($_POST["telegram"]);
    }

    // Ошибка в поле "Скиллы"
    if (empty($_POST["skills"])) {
        $skillsErr = "Это поле обязательно для заполнения";
        $check = false;
    } else {
        $skills = test_input($_POST["skills"]);
    }

    // Ошибка в поле "Проект"
    if (empty($_POST["proj"])) {
        $projErr = "Это поле обязательно для заполнения";
        $check = false;
    } else {
        $proj = test_input($_POST["proj"]);
    }

    // Ошибка в поле "Причина участия"
    if (empty($_POST["reason"])) {
        $reasonErr = "Это поле обязательно для заполнения";
        $check = false;
    } else {
        $reason = test_input($_POST["reason"]);
    }

    $question = test_input($_POST["question"]);
    $got = date('Y-m-d H:i:s');

    // Если все
    if ($check) {
        $conn_string = "host=pg_container port=5432 dbname=test_db user=root password=root";
        $conn = pg_connect($conn_string);
        $query = "INSERT INTO candidate (
                       got, fio, city, university, grade, phone, telegram, skills_summary, project_summary, reason_summary, questions) 
                       VALUES ('$got', '$name', '$city', '$edu', '$grade', '$phone', '$telegram', '$skills', '$proj', '$reason', '$question');";
        $result = pg_query($conn, $query    );


        header('Location: success.php');
        exit();
    }
}



function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>
<!DOCTYPE html>
<html lang="en" style="scroll-behavior: smooth;">
<head>
    <meta charset="UTF-8">
    <title>Подать заявку</title>
    <link rel="stylesheet" href="styles/reg.css">
    <link rel="icon" type="image/x-icon" href="/Resources/favicon.ico">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:100,200,300,400,500,600,700,800,900" rel="stylesheet">
</head>
<body>
<header id="navbar">
    <div>
        <a href="index.php">
            <img id="logo" src="Resources/wasp-logo.png" />
        </a>
        <ul>

        </ul>
    </div>
</header>
<section class="main-section" style="display: flex; flex-direction: column" id="main">
    <div class="rectangle-inside">
        <div class="rectangle-back">
            <h1>Анкета кандидата</h1>
            <h4>Привет, друг! Ты находишься на странице подачи заявки на участие в проекте “WASP-Academy”. Заполни все поля данной анкеты и нажми на кнопку “Отправить”.</h4>
        </div>
        <div class="content">
            <p id="asterisk"><span style="color: red">*</span> Обязательно для заполнения</p>
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?> ">
                <div class="field">
                    <h4>👋 Давай знакомиться! <span style="color: red">*</span></h4>
                        <div>
                            <p>Как тебя зовут? Укажи здесь свое ФИО.</p>
                            <p><i style="opacity: 0.5">Например, Иванов Иван Иванович</i></p>
                        </div>
                    <div>
                    <input type="text" name="name" placeholder="Фамилия Имя Отчество" value="<?php echo $name;?>">
                    <span class="error"><?php echo $nameErr;?></span>
                    </div>
                </div>
                <div class="field">
                    <h4>🏫 Где ты учишься? <span style="color: red">*</span></h4>
                    <div>
                        <p>Укажи в этом поле название своего учебного заведения.</p>
                        <p><i style="opacity: 0.5">Например, ГБОУ "Школа № XXXX" или НИУ ВШЭ</i></p>
                    </div>
                    <div>
                        <input type="text" name="edu" placeholder="Школа / университет" value="<?php echo $edu;?>">
                        <span class="error"><?php echo $eduErr;?></span>
                    </div>
                </div>
                <div class="field">
                    <h4>🌍 В каком городе ты живешь? <span style="color: red">*</span></h4>
                    <div>
                        <p><i style="opacity: 0.5">Например, Москва</i></p>
                    </div>
                    <div>
                        <input type="text" name="city" placeholder="Город" value="<?php echo $city;?>">
                        <span class="error"><?php echo $cityErr;?></span>
                    </div>
                </div>
                <div class="field">
                    <h4>🎓 Класс обучения <span style="color: red">*</span></h4>
                    <div>
                        <p>Здесь необходимо выбрать класс обучения в учебном году 2022-2023:</p>
                    </div>
                    <div class="choose-panel">
                        <label>
                            <input type="radio" name="grade" <?php if (isset($grade) && $grade=="school9") echo "checked";?> value="9 класс">
                            <p>9 класс</p>
                        </label>
                        <label>
                            <input type="radio" name="grade" <?php if (isset($grade) && $grade=="school10") echo "checked";?> value="10 класс">
                            <p>10 класс</p>
                        </label>
                        <label>
                            <input type="radio" name="grade" <?php if (isset($grade) && $grade=="school11") echo "checked";?> value="11 класс">
                            <p>11 класс</p>
                        </label>
                        <label>
                            <input type="radio" name="grade" <?php if (isset($grade) && $grade=="grade1") echo "checked";?> value="1 курс">
                            <p>1 курс</p>
                        </label>
                        <label>
                            <input type="radio" name="grade" <?php if (isset($grade) && $grade=="grade2") echo "checked";?> value="2 курс">
                            <p>2 курс</p>
                        </label>
                        <label>
                            <input type="radio" name="grade" <?php if (isset($grade) && $grade=="grade3") echo "checked";?> value="3 курс">
                            <p>3 курс</p>
                        </label>
                        <label>
                            <input type="radio" name="grade" <?php if (isset($grade) && $grade=="grade4") echo "checked";?> value="Другое">
                            <p>4 курс</p>
                        </label>
                        <span class="error"><?php echo $gradeErr;?></span>
                    </div>
                </div>
                <div class="field">
                    <h4>📞 Контактный номер <span style="color: red">*</span></h4>
                    <div>
                        <p>Укажи в данном поле свой контактный номер. Это нужно для того, чтобы организаторы курса могли с тобой оперативно связаться.</p>
                        <p><i style="opacity: 0.5">Например, +7 XXX XXX XX XX</i></p>
                    </div>
                    <div>
                        <input type="text" name="phone" placeholder="+7 XXX XXX XX XX" value="<?php echo $phone;?>">
                        <span class="error"><?php echo $phoneErr;?></span>
                    </div>
                </div>
                <div class="field">
                    <h4>📧 Адрес электронной почты <span style="color: red">*</span></h4>
                    <div>
                        <p>Укажи адрес своего почтового ящика. Мы будем присылать информацию о курсе и информацию о зачислении. После регистрации на этот адрес поступит тестовое задание.</p>
                        <p><i style="opacity: 0.5">Например, test@test.com</i></p>
                    </div>
                    <div>
                        <input type="text" name="email" placeholder="Почта" value="<?php echo $email;?>">
                        <span class="error"><?php echo $emailErr;?></span>
                    </div>
                </div>
                <div class="field">
                    <h4>🎭 Ник в Telegram <span style="color: red">*</span></h4>
                    <div>
                        <p>Укажи свой ник (username) в Telegram. Так организаторы смогут быстро с тобой связаться :)</p>
                        <p><i style="opacity: 0.5">Например, @username</i></p>
                    </div>
                    <div>
                        <input type="text" name="telegram" placeholder="@username" value="<?php echo $telegram;?>">
                        <span class="error"><?php echo $telegramErr;?></span>
                    </div>
                </div>
                <div class="field">
                    <h4>🧩 Расскажи о своих навыках программирования! <span style="color: red">*</span></h4>
                    <div>
                        <p>С какими технологиями, фреймворками и библиотеками ты работал? Какие языки программирования знаешь? Здесь ты можешь рассказать о своих индивидуальных достижениях!</p>
                    </div>
                    <div>
                        <input type="text" name="skills" placeholder="" value="<?php echo $skills;?>">
                        <span class="error"><?php echo $skillsErr;?></span>
                    </div>
                </div>
                <div class="field">
                    <h4>💻 Есть ли у тебя проект, которым ты особенно гордишься? <span style="color: red">*</span></h4>
                    <div>
                        <p>Расскажи! Это может быть целый проект, простой алгоритм или даже небольшой кусок кода</p>
                    </div>
                    <div>
                        <input type="text" name="proj" placeholder="" value="<?php echo $proj;?>">
                        <span class="error"><?php echo $projErr;?></span>
                    </div>
                </div>
                <div class="field">
                    <h4>✋ Почему ты решил принять участие в проекте? <span style="color: red">*</span></h4>
                    <div>
                        <p>Расскажи, от кого ты узнал про курсы и почему ты хочешь принять участие в нашем проекте? Что ты ожидаешь получить?</p>
                    </div>
                    <div>
                        <input type="text" name="reason" placeholder="" value="<?php echo $reason;?>">
                        <span class="error"><?php echo $reasonErr;?></span>
                    </div>
                </div>
                <div class="field">
                    <h4>🎤 Есть вопросы?</h4>
                    <div>
                        <p>Если у тебя остались вопросы, то смело задавай их в этом поле!</p>
                    </div>
                    <div>
                        <input type="text" name="question" placeholder="" value="<?php echo $question;?>">
                    </div>
                </div>
                <p class="footer">В соответствии с Федеральным законом от 27.07.2006 года №152-ФЗ «О персональных данных» вы подтверждаете свое согласие на сбор и обработку своих персональных данных, предоставленных в составе заявки, организаторами проекта «WASP-Academy». Согласие дается в целях администрирования Вашего участия в проекте и проводимых в его поддержку мероприятиях, в том числе, не исключая направления уведомлений, установления телефонных контактов, публичного освещения в СМИ и сети Интернет хода и итогов программы. Обработке подлежат следующие персональные данные: фамилия, имя, отчество, дата рождения, адрес электронной почты, номер телефона, наименование образовательного учреждения. Действия с персональными данными включают в себя сбор персональных данных, их накопление, систематизацию и хранение, обновление и изменение, обезличивание, копирование и уничтожение. Право на обработку данных сохраняется за организаторами до конца проводимой программы и всех мероприятий в ее составе, а также до истечения 10 лет с даты завершения проводимой программы, и может быть отозвано в любой момент в письменной форме или электронным сообщением, направленным на адрес support@wasp-academy.com.</p>
                <input type="submit" name="submit" value="Подать заявку">
            </form>
        </div>
    </div>
</section>
<section/>

</body>
</html>
