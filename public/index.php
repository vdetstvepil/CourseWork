<!DOCTYPE html>
<html lang="en" style="scroll-behavior: smooth;">
<head>
  <meta charset="UTF-8">
  <title>Практический курс по C#</title>
  <link rel="stylesheet" href="styles/index.css">
  <link rel="icon" type="image/x-icon" href="/Resources/favicon.ico">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:100,200,300,400,500,600,700,800,900" rel="stylesheet">
</head>
<body>
    <header id="navbar">
        <div>
        <img id="logo" src="Resources/wasp-logo.png" />
        <ul>
            <li class="btn-link"><a class="active" href="#about">&#62; о курсе</a></li>
            <li class="btn-link"><a href="#steps">&#62; этапы</a></li>
            <li class="btn-link"><a href="#faq">&#62; FAQ</a></li>
            <li class="btn-link"><a href="#contacts">&#62; контакты</a></li>
            <li class="btn-reg"><a href="reg.php">подать заявку</a></li>
        </ul>
        </div>
    </header>
    <section class="main-section" style="display: flex; flex-direction: column" id="main">
        <div style="flex: 2">

        </div>
        <div style="flex: 3" class="content">
            <div style="display: flex; flex-direction: row; margin: 0; align-items: center; gap: 20px">
                <p><span style="background-color: #FFB800; color: black; padding: 10px;">онлайн</span></p>
                <p>бесплатный курс для старшеклассников<br> и студентов по изучению языка C#</p>
            </div>
            <h1><span style="-webkit-background-clip: text; -webkit-text-fill-color: transparent; background-image: linear-gradient(-45deg, #FFB800, #2f2f2f); background-size: 400% 400%; animation: gradient 5s ease infinite alternate;">&#60; WASP</span>-Academy '23 /&#62;</h1>
            <div style="display: flex; flex-direction: row; margin: 0; align-items: center; gap: 20px">
                <a class="btn-reg" href="reg.php">> START</a>
                <p style="opacity: 75%; animation-fill-mode: backwards;">для 9-11 классов · студентов 1-2 курса</p>
            </div>
        </div>
        <img class="hex-grid" src="Resources/hex-grid.svg" style="flex: 1; width: 100%">
    </section>
    <section class="advantage-section">
        <div class="content">
            <h1>Что <span style="color: #FFB800;">тебя</span> ждет?</h1>
            <div style="display: flex; flex-direction: row; align-items: center; gap: 50px">
                <div style="display: flex; flex-direction: column; align-items: center; gap: 10px;">
                    <img src="Resources/advantage1.svg" style="width: 15vw">
                    <p>Разработка на C#</p>
                </div>
                <div style="display: flex; flex-direction: column; align-items: center; gap: 10px;">
                    <img src="Resources/advantage2.svg" style="width: 15vw">
                    <p>Проект в портфолио</p>
                </div>
                <div style="display: flex; flex-direction: column; align-items: center; gap: 10px;">
                    <img src="Resources/advantage3.svg" style="width: 15vw">
                    <p>Практика и домашка</p>
                </div>
            </div>
        </div>
    </section>
    <section class="description-section" id="about">
        <div class="content" style="display: flex; flex-direction: column; align-items: center; gap: 10px;">
            <div class="rectangle">
                <div class="rectangle-inside">
                    <h3>Авторский курс</h3>
                    <h2>"Разработка мобильных приложений на языке C#"</h2>
                </div>
                <div class="rectangle-content" style="display: flex; flex-direction: column; align-items: center; gap: 15px;">
                    <p>За 10 занятий ты познакомишься с основами синтаксиса языка программирования C#, научишься делать простые мобильные приложения на платформе MAUI (кроссплатформенная технология от компании Microsoft), а также выполнишь индивидуальный или проект в команде, которое сможешь добавить в свое портфолио.</p>
                    <p>Практические занятия, лекции и домашка уже в комплекте, так что времени скучать не будет! Билл Гейтс говорил, что “много спать - признак лени”, поэтому тех, кто не умеет укладываться в дедлайны, отчисляем.</p>
                    <p>Чтобы пройти отбор, тебе необходимо знать как минимум один язык программирования на уровне понимания работы циклов, условных конструкций и массивов. Мы не учим программировать с нуля.</p>
                    <p>Ждем школьников 9-11 классов и студентов 1-2 курса, которые по-настоящему замотивированы и нацелены на крутой результат! Будет сложно, но интересно.</p>
                </div>
            </div>
            <img src="Resources/hex-mini-row.svg" style="transform: translateY(-30px); width: 100%">
            <div class="details" style="display: flex; flex-direction: row; align-items: center; gap: 50px">
                <div class="rectangle-mini" style="display: flex; flex-direction: row; gap: 10px">
                    <img src="Resources/detail1.svg">
                    <h3>с 15 октября</br>по 24 декабря</h3>
                </div>
                <div class="rectangle-mini" style="display: flex; flex-direction: row; gap: 10px">
                    <img src="Resources/detail2.svg">
                    <h3>каждую субботу</br>с 18.00 до 20.45</h3>
                </div>
                <div class="rectangle-mini" style="display: flex; flex-direction: row; gap: 10px">
                    <img src="Resources/detail3.svg">
                    <h3>онлайн<br>в Discord</h3>
                </div>
            </div>
        </div>
    </section>
    <section class="theme-section" id="steps">
        <div class="content">
            <h1>Темы <span style="color: #FFB800;">занятий</span></h1>
            <div style="display: flex; flex-direction: row; align-items: flex-start; gap: 50px">
                <div style="display: flex; flex-direction: column; align-items: flex-start; gap: 10px; width: 30vw;">
                    <div class="block-content">
                        <h2 class="num">1</h2>
                        <img src="Resources/dot.svg"/>
                        <h3 class="descr">Введение в язык C#, среду разработки Visual Studio</h3>
                    </div>
                    <div class="block-content">
                        <h2 class="num">2</h2>
                        <img src="Resources/dot.svg"/>
                        <h3 class="descr">Система контроля версий Git</h3>
                    </div>
                    <div class="block-content">
                        <h2 class="num">3</h2>
                        <img src="Resources/dot.svg"/>
                        <h3 class="descr">Возвратные и невозвратные функции. Коллекции в C#</h3>
                    </div>
                    <div class="block-content">
                        <h2 class="num">4</h2>
                        <img src="Resources/dot.svg"/>
                        <h3 class="descr">Объектно-ориентированное программирование. Классы и объекты</h3>
                    </div>
                    <div class="block-content">
                        <h2 class="num">5</h2>
                        <img src="Resources/dot.svg"/>
                        <h3 class="descr">Создание каркаса мобильного приложения на платформе .NET MAUI</h3>
                    </div>
                </div>
                <div style="display: flex; flex-direction: column; align-items: flex-start; gap: 10px; width: 30vw; ">
                    <div class="block-content">
                        <h2 class="num">6</h2>
                        <img src="Resources/dot.svg"/>
                        <h3 class="descr">Контейнеры компоновки</h3>
                    </div>
                    <div class="block-content">
                        <h2 class="num">7</h2>
                        <img src="Resources/dot.svg"/>
                        <h3 class="descr">Навигация в приложении</h3>
                    </div>
                    <div class="block-content">
                        <h2 class="num">8</h2>
                        <img src="Resources/dot.svg"/>
                        <h3 class="descr">Работа с пользовательским интерфейсом</h3>
                    </div>
                    <div class="block-content">
                        <h2 class="num">9</h2>
                        <img src="Resources/dot.svg"/>
                        <h3 class="descr">Сериализация и десереализация. Обработка исключений</h3>
                    </div>
                    <div class="block-content">
                        <h2 class="num">10</h2>
                        <img src="Resources/dot.svg"/>
                        <h3 class="descr">Создание базы данных при помощи ADO.NET, язык запросов SQL</h3>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="conditions-section">
        <div class="content">
            <div style="display: flex; flex-direction: row; align-items: center; gap: 25px">
                <h1>Курс для тебя, если ты...</h1>
            </div>
            <div style="display: flex; flex-direction: row; align-items: center; gap: 10px;">
                <img src="Resources/open-bracket.svg" style="align-self: flex-start; transform: translateY(-20px)">
                <div class="rectangle">
                    <div class="rectangle-inside">
                        <h2>// Учишься в старшей школе или городском университете</h2>
                        <h2>// Живешь в Москве и имеешь возможность каждую неделю посещать занятия онлайн</h2>
                        <h2>// Понимаешь основы программирования на уровне циклов, условных конструкций, и массивов</h2>
                    </div>
                </div>
                <img src="Resources/close-bracket.svg" style="align-self: flex-end; transform: translateY(20px)">
            </div>
        </div>
    </section>
    <section class="steps-section">
        <div class="content">
            <h1>Хочу стать <span style="color: #FFB800;">участником</span> проекта!</h1>
            <div style="display: flex; flex-direction: row; align-items: flex-start; gap: 50px">
                <div style="display: flex; flex-direction: column; align-items: center; gap: 10px;">
                    <img src="Resources/num1.svg" style="width: 15vw">
                    <p>Заполни анкету и<br>выполни тестовое<br>задание</p>
                </div>
                <div style="display: flex; flex-direction: column; align-items: center; gap: 10px;">
                    <img src="Resources/num2.svg" style="width: 15vw">
                    <p>Приходи на<br>вступительные<br>в офисе</p>
                </div>
                <div style="display: flex; flex-direction: column; align-items: center; gap: 10px;">
                    <img src="Resources/num3.svg" style="width: 15vw">
                    <p>Ты зачислен<br>на курс! 🥳</p>
                </div>
            </div>
            <div style="display: flex; flex-direction: column; align-items: center; gap: 20px">
                <h3>Успей подать заявку на <span style="color: #FFB800;">участие</span> в проекте!</h3>
                <a class="btn-reg" href="reg.php">Подать заявку</a>
            </div>
        </div>
    </section>
    <section class="faq-section" id="faq">
        <div class="content">
            <div style="flex: 1; align-self: flex-start">
                <h1>FAQ</h1>
                <img src="Resources/faq.svg"/>
            </div>
            <div style="flex: 3">
                <div class="rectangle" style="display: flex; flex-direction: column; align-items: center; gap: 0; padding: 10px 30px">
                    <button class="collapsible">Это официальный курс?</button>
                    <div class="collapsible-content">
                        <p>Да, это бесплатный официальный курс, организованный студентами международной студенческой партнерской программы Microsoft Learn Student Ambassadors (в прошлом Microsoft Student Partners). Курс будут вести спикеры примерно твоего возраста. Большинство из них - это выпускники проекта и студенты-амбассадоры компании Microsoft, у которых есть немалый опыт работы с технологиями Microsoft.</p>
                    </div>
                    <button class="collapsible">Входной порог навыков</button>
                    <div class="collapsible-content">
                        <p>Достаточно знания одного языка программирования (например, C/C++/Python/Java и т.д.) на уровне понимания работы функций, циклов, условных конструкций, массивов.</p>
                    </div>
                    <button class="collapsible">Вступительные испытания</button>
                    <div class="collapsible-content">
                        <p>После регистрации на указанный тобой адрес электронной почты поступит тестовое задание. Сделай его как можно скорее. При хорошем результате мы пригласим тебя на площадку для решения нескольких простых задач на любом языке программирования. Нам лишь нужно убедиться в том, что этот курс точно тебе подходит и твоих знаний достаточно для участия, так что бояться не нужно :)</p>
                    </div>
                    <button class="collapsible">Со мной не связались @#%&/*</button>
                    <div class="collapsible-content">
                        <p>Бип-буп. Проверь папку "Спам", там должно лежать письмо с подтверждением твоей регистрации (приходит в течение часа после подачи заявки) и ссылкой на тестовое задание. Проверка тестового задания занимает 7 дней. Если ты не получил приглашение на вступительное испытание и хорошо написал тест, свяжись с нами как можно скорее, написав письмо на почту support@wasp-academy.</p>
                    </div>
                    <button class="collapsible">Где занимаемся?</button>
                    <div class="collapsible-content">
                        <p>Обучение начнется 15 октября. Занятия будут проходить онлайн на платформе Discord каждую неделю по субботам с 18.00 до 20.45.</p>
                    </div>
                    <button class="collapsible">Что я получу?</button>
                    <div class="collapsible-content">
                        <p>Классный experience, возможность изучить новые инструменты разработки (Visual Studio, GitHub, Azure и др.), новых знакомых и друзей в лице участников проекта и менторов. А участники Академии, успешно выполнившие финальное тестирование и не пропустившие почти ни одного занятия, получат ценные сертификаты от сообщества Microsoft Learn Student Ambassadors.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="contact-section" id="contacts">
        <div class="content">
            <h1>Команда организаторов</h1>
            <div style="display: flex; flex-direction: row; align-items: flex-start; justify-content: center; gap: 50px; width: 100%">
                <div style="display: flex; flex-direction: column; align-items: flex-start; gap: 20px; width: 50%;">
                    <div class="block-content">
                        <img src="Resources/Tutors/Кисляков.png"/>
                        <div class="contact-info">
                            <h3 class="name">Антон Кисляков</h3>
                            <p class="vacancy">Руководитель программы</p>
                            <p class="email"><a href="mailto:antonkislyakov@studentambassadors.com" style="text-decoration: none">
                                antonkislyakov@studentambassadors.com</a></p>
                        </div>
                    </div>
                    <div class="block-content">
                        <img src="Resources/Tutors/Корсаков.jpg"/>
                        <div class="contact-info">
                            <h3 class="name">Максим Корсаков</h3>
                            <p class="vacancy">Старший преподаватель</p>
                        </div>
                    </div>
                    <div class="block-content">
                        <img src="Resources/Tutors/Васильченко.jpg"/>
                        <div class="contact-info">
                            <h3 class="name" style="font-size: 24px">Дмитрий Васильченко</h3>
                            <p class="vacancy">Преподаватель</p>
                        </div>
                    </div>
                    <div class="block-content">
                        <img src="Resources/Tutors/Штей.png"/>
                        <div class="contact-info">
                            <h3 class="name">Алексей Штей</h3>
                            <p class="vacancy">Ментор</p>
                        </div>
                    </div>
                </div>
                <div style="display: flex; flex-direction: column; align-items: flex-start; gap: 20px; width: 50%; ">
                    <div class="block-content">
                        <img src="Resources/Tutors/Морозова.png"/>
                        <div class="contact-info">
                            <h3 class="name">Евгения Морозова</h3>
                            <p class="vacancy">Координатор программы</p>
                            <p class="email"><a href="mailto:morozovazhenya2005@gmail.com" style="text-decoration: none">
                                morozovazhenya2005@gmail.com</a></p>
                        </div>
                    </div>
                    <div class="block-content">
                        <img src="Resources/Tutors/Булгаков.jpg"/>
                        <div class="contact-info">
                            <h3 class="name">Тимофей Булгаков</h3>
                            <p class="vacancy">Старший преподаватель</p>
                        </div>
                    </div>
                    <div class="block-content">
                        <img src="Resources/Tutors/Збанок.jpg"/>
                        <div class="contact-info">
                            <h3 class="name" style="font-size: 24px">Евгений Збанок</h3>
                            <p class="vacancy">Ментор</p>
                        </div>
                    </div>
                    <div class="block-content">
                        <img src="Resources/Tutors/Олянишин.jpg"/>
                        <div class="contact-info">
                            <h3 class="name">Иван Олянишин</h3>
                            <p class="vacancy">Ментор</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <footer class="footer-section">
        <div class="content">
            <h1 style="margin-bottom: 30px">Остались <span style="color: #FFB800;">вопросы</span>?</h1>
            <div style="display: flex; flex-direction: row; align-items: center; gap: 20px; ">
                <img src="Resources/email.png" style="width: 80px;">
                <p>Скорее пиши на адрес  <a href="mailto:support@wasp-academy.com" style="text-decoration: none; color: #FFB800">
                    support@wasp-academy.com</a>, и мы обязательно тебе ответим!</p>
            </div>
            <div style="display: flex; flex-direction: row; align-items: center; gap: 20px; ">
                <img src="Resources/badge-mlsa.svg" style="width: 80px;">
                <p style="opacity: 0.5; font-size: 20px">Курс организован при поддержке международной студенческой программы “Microsoft Learn Student Ambassadors”</p>
            </div>
            <p style="margin-top: 30px; margin-bottom: 15px; font-size: 20px; opacity: 0.5; font-weight: 500">Вы партнер? Свяжитесь с нами по адресу hr@wasp-academy.com.</p>
            <div>
            <p style="margin-top: 30px; margin-bottom: 15px; font-size: 20px; opacity: 0.5; font-weight: 500"><a style="text-decoration: none" href="https://stdntpartners-my.sharepoint.com/:b:/g/personal/antonkislyakov_studentambassadors_com/EdPxZMjCY-BInfpOWE3jezMBM6mkejL29CYmYy9Y39li0w?e=k7sWhf">Положение о программе</a></p>
                <p style="margin-top: 30px; margin-bottom: 15px; font-size: 20px; opacity: 0.5; font-weight: 500"><a style="text-decoration: none" href="auth.php">Админ-панель</a></p>
            </div>
            <div style="display: flex; flex-direction: row; align-items: center; gap: 20px; width: 100% "><p style="font-size: 20px; opacity: 0.5; font-weight: 400; width: 50%">WASP-Academy</p><p style="font-size: 20px; opacity: 0.5; font-weight: 400; width: 50%; text-align: right">2022</p>
            </div>
        </div>
    </footer>

    <script>
        var prevScrollpos = window.pageYOffset;
        window.onscroll = function() {
            var currentScrollPos = window.pageYOffset;
            if (prevScrollpos > currentScrollPos) {
                document.getElementById("navbar").style.top = "0";
            } else {
                document.getElementById("navbar").style.top = "-80px";
            }
            prevScrollpos = currentScrollPos;
        }
    </script>
    <script>
        var coll = document.getElementsByClassName("collapsible");
        var i;

        for (i = 0; i < coll.length; i++) {
            coll[i].addEventListener("click", function() {
                this.classList.toggle("active");
                var content = this.nextElementSibling;
                if (content.style.maxHeight){
                    content.style.maxHeight = null;
                } else {
                    content.style.maxHeight = content.scrollHeight + "px";
                }
            });
        }
    </script>
    <!-- Yandex.Metrika counter -->
    <script type="text/javascript" >
        (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
            m[i].l=1*new Date();
            for (var j = 0; j < document.scripts.length; j++) {if (document.scripts[j].src === r) { return; }}
            k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
        (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

        ym(91455544, "init", {
            clickmap:true,
            trackLinks:true,
            accurateTrackBounce:true,
            webvisor:true
        });
    </script>
    <noscript><div><img src="https://mc.yandex.ru/watch/91455544" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
    <!-- /Yandex.Metrika counter -->
</body>
</html>
