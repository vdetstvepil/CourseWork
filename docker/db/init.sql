CREATE TABLE candidate(
                          candidate_id serial NOT NULL,
                          age integer NOT NULL,
                          city character varying(50) NOT NULL,
                          university character varying(50) NOT NULL,
                          grade integer NOT NULL,
                          phone character varying(10) NOT NULL,
                          telegram character varying(50) NOT NULL,
                          personal_info_approval boolean NOT NULL,
                          status_id integer NOT NULL,
                          user_id uuid UNIQUE NOT NULL,
                          PRIMARY KEY(candidate_id)
);

CREATE TABLE interview(
                          interview_id serial NOT NULL,
                          motivation_points integer NOT NULL DEFAULT 0,
                          theory_points integer NOT NULL DEFAULT 0,
                          favorite_points integer NOT NULL DEFAULT 0,
                          candidate_id integer NOT NULL,
                          PRIMARY KEY(interview_id)
);

CREATE TABLE interview_manager(
                                  interview_id integer NOT NULL,
                                  manager_id integer NOT NULL,
                                  PRIMARY KEY(interview_id, manager_id)
);

CREATE TABLE manager(
                        manager_id serial NOT NULL,
                        access_level integer NOT NULL DEFAULT 0,
                        user_id uuid UNIQUE NOT NULL,
                        PRIMARY KEY(manager_id)
);

CREATE TABLE form(
                     candidate_id integer NOT NULL,
                     skills_summary character varying(2000) NOT NULL,
                     project_summary character varying(2000) NOT NULL,
                     reason_summary character varying(2000) NOT NULL,
                     questions character varying(2000),
                     PRIMARY KEY(candidate_id)
);

CREATE TABLE individual_variant(
                                   individual_variant_id serial NOT NULL,
                                   candidate_id integer NOT NULL,
                                   task_id integer NOT NULL,
                                   points integer NOT NULL DEFAULT 0,
                                   PRIMARY KEY (individual_variant_id, candidate_id, task_id)
);

CREATE TABLE task(
                     task_id serial NOT NULL,
                     caption character varying(100) NOT NULL,
                     description character varying(5000) NOT NULL,
                     picture bytea[],
                     "input" character varying(1000),
                     output character varying(1000),
                     example character varying(1000),
                     complexity integer NOT NULL,
                     category character varying(200) NOT NULL,
                     PRIMARY KEY(task_id)
);

CREATE TABLE status(
                       status_id integer NOT NULL,
                       "name" character varying(50) NOT NULL,
                       description character varying(500),
                       PRIMARY KEY(status_id)
);

CREATE TABLE "user"(
                       user_id uuid NOT NULL,
                       surname character varying(50) NOT NULL,
                       "name" character varying(50) NOT NULL,
                       patronymic character varying(50),
                       email character varying(100) UNIQUE NOT NULL,
                       "password" character varying(64) NOT NULL,
                       PRIMARY KEY(user_id)
);

ALTER TABLE interview
    ADD CONSTRAINT interview_candidate_id_fkey
        FOREIGN KEY (candidate_id) REFERENCES candidate (candidate_id) ON DELETE Cascade
            ON UPDATE Cascade;

ALTER TABLE interview_manager
    ADD CONSTRAINT interview_manager_interview_id_fkey
        FOREIGN KEY (interview_id) REFERENCES interview (interview_id) ON DELETE Cascade
            ON UPDATE Cascade;

ALTER TABLE interview_manager
    ADD CONSTRAINT interview_manager_manager_id_fkey
        FOREIGN KEY (manager_id) REFERENCES manager (manager_id) ON DELETE Cascade
            ON UPDATE Cascade;

ALTER TABLE form
    ADD CONSTRAINT form_candidate_id_fkey
        FOREIGN KEY (candidate_id) REFERENCES candidate (candidate_id) ON DELETE Cascade
            ON UPDATE Cascade;

ALTER TABLE individual_variant
    ADD CONSTRAINT individual_variant_candidate_id_fkey
        FOREIGN KEY (candidate_id) REFERENCES candidate (candidate_id) ON DELETE Cascade
            ON UPDATE Cascade;

ALTER TABLE individual_variant
    ADD CONSTRAINT individual_variant_task_id_fkey
        FOREIGN KEY (task_id) REFERENCES task (task_id) ON DELETE Restrict
            ON UPDATE Cascade;

ALTER TABLE candidate
    ADD CONSTRAINT candidate_status_id_fkey
        FOREIGN KEY (status_id) REFERENCES status (status_id) ON DELETE Restrict
            ON UPDATE Cascade;

ALTER TABLE candidate
    ADD CONSTRAINT candidate_user_id_fkey
        FOREIGN KEY (user_id) REFERENCES "user" (user_id) ON DELETE Cascade
            ON UPDATE Cascade;

ALTER TABLE manager
    ADD CONSTRAINT manager_user_id_fkey
        FOREIGN KEY (user_id) REFERENCES "user" (user_id) ON DELETE Cascade
            ON UPDATE Cascade;

--- Вставка значений в таблицу user
INSERT INTO "user" (user_id, surname, "name", patronymic, email, password)
VALUES ('42f7b3dd-8450-4dc1-bf74-6726b8b281a0', 'Кисляков', 'Антон', 'Юрьевич', 'kislyakov@wasp-academy.com', '4wcuO2E8');
INSERT INTO "user" (user_id, surname, "name", patronymic, email, password)
VALUES ('e1e4760d-4485-4e5b-aeac-035acc7724d5', 'Васильченко', 'Дмитрий', 'Дмитриевич', 'vasilchenko@wasp-academy.com', '0gXl92SC');
INSERT INTO "user" (user_id, surname, "name", patronymic, email, password)
VALUES ('04f7c4c3-2470-403a-86e0-3bbc3742f63f', 'Морозова', 'Евгения', 'Геннадьевна', 'morozova@wasp-academy.com', 'D6hY7q11');
INSERT INTO "user" (user_id, surname, "name", patronymic, email, password)
VALUES ('c77c4a01-7a37-4eac-9af7-4f2196641d01', 'Павлов', 'Павел', 'Валерьевич', 'pavlov0201@gmail.com', '7e0CuD23');
INSERT INTO "user" (user_id, surname, "name", patronymic, email, password)
VALUES ('f8375ad9-51b3-4d4d-8d21-046724b396e2', 'Хромов', 'Олег', 'Анатольевич', 'chromikadze@yandex.ru', 'x7U88O1g');
INSERT INTO "user" (user_id, surname, "name", patronymic, email, password)
VALUES ('f3c5ab74-0bd9-43a0-ad52-ebf1233183dd', 'Иващенко', 'Марина', 'Павловна', 'ivaschenko@gmail.com', 'B4VP90nm');
INSERT INTO "user" (user_id, surname, "name", patronymic, email, password)
VALUES ('d3b9a154-f6dd-44b8-84f6-0138f4b630c7', 'Гаевский', 'Сергей', 'Дмитриевич', 'sergayevskiy@gmail.com', '8ZE8ZVhR');
INSERT INTO "user" (user_id, surname, "name", patronymic, email, password)
VALUES ('658fccba-392c-4c05-9fee-36affe6c75ac', 'Тысяцкий', 'Данил', 'Зурабович', 'tysya1000@gmail.com', 'fjS68GEc');
INSERT INTO "user" (user_id, surname, "name", patronymic, email, password)
VALUES ('b9ef15c5-e849-49af-99df-35ab5bc66c18', 'Логачев', 'Данил', 'Дмитриевич', 'loga1535@ya.ru', '84kdhk6u');
INSERT INTO "user" (user_id, surname, "name", patronymic, email, password)
VALUES ('9a57bf1f-d0f8-443f-b47a-17681bffa711', 'Горелик', 'Евген', 'Антонович', 'gorhormor@gmail.com', 'UxjurBDb');
INSERT INTO "user" (user_id, surname, "name", patronymic, email, password)
VALUES ('dd848563-bff1-4c47-a41c-d496b818818e', 'Шиганов', 'Жека', 'Игоревич', 'pububupururu@mail.ru', 'pjspXPR3');
INSERT INTO "user" (user_id, surname, "name", patronymic, email, password)
VALUES ('10a9fda0-8bb3-4cc6-89b9-b4d9f5ef563a', 'Деревлев', 'Глеб', 'Глебович', 'gomohleb@yandex.ru', 'Dt2s5YXW');
INSERT INTO "user" (user_id, surname, "name", patronymic, email, password)
VALUES ('04da1d46-08c6-43af-8df2-7b495d553ebd', 'Селезнева', 'Алиса', 'Игоревна', 'alice1919@yandex.ru', 'cP9WRyu9');
INSERT INTO "user" (user_id, surname, "name", patronymic, email, password)
VALUES ('57fe1976-df20-414f-bba9-4e1b107f2216', 'Мажарова', 'Сабина', 'Айзаковна', 'aizaksabin@yahoo.com', 'hyAR7rhJ');
INSERT INTO "user" (user_id, surname, "name", patronymic, email, password)
VALUES ('59275775-84da-48c9-982b-78f112b64815', 'Шибуина', 'Айзак', 'Евгеньевна', 'shibushi@mail.ru', 'U78MNjWC');
INSERT INTO "user" (user_id, surname, "name", patronymic, email, password)
VALUES ('9b2fee3d-4d03-48bf-a0fa-fb3b68e8078f', 'Домбровская', 'Катерина', 'Ивановна', 'katebest@hotmail.com', 'wmwDqZZ9');
INSERT INTO "user" (user_id, surname, "name", patronymic, email, password)
VALUES ('7122c992-27a9-4007-8959-378ce3e96205', 'Земляничкова', 'Дарья', 'Дмитриевна', 'kukumber@gmail.com', 'HGHrFbY5');
INSERT INTO "user" (user_id, surname, "name", patronymic, email, password)
VALUES ('0cbeb408-875b-400a-86ac-2522f4199c1e', 'Заболотникова', 'Маргарита', 'Евгеньевна', 'bukavmukah@hotmail.com', 'Pq94NRCc');

--- Вставка значений в таблицу status
INSERT INTO status (status_id, "name", description)
VALUES (0, 'Новый', 'Прошел регистрацию');
INSERT INTO status (status_id, "name", description)
VALUES (1, 'Заполнил личные данные', 'Заполнил личные данные');
INSERT INTO status (status_id, "name", description)
VALUES (2, 'Выполнил тест', 'Выполнил успешно онлайн-тест');
INSERT INTO status (status_id, "name", description)
VALUES (3, 'Приглашен на очный этап', 'Приглашен на очный этап для написания тестового задания');
INSERT INTO status (status_id, "name", description)
VALUES (4, 'Ожидает проверки тестового задания', 'Написал тестовое задание, которое ожидает проверки');
INSERT INTO status (status_id, "name", description)
VALUES (5, 'Тестовое задание проверено', 'Тестовое задание кандидата проверено');
INSERT INTO status (status_id, "name", description)
VALUES (6, 'Приглашен на интервью', 'Приглашен на собеседование');
INSERT INTO status (status_id, "name", description)
VALUES (7, 'Ожидает результатов', 'Прошел интервью и ожидает зачисления');
INSERT INTO status (status_id, "name", description)
VALUES (8, 'Предварительно зачислен', 'По итогам интервью предварительно зачислен');
INSERT INTO status (status_id, "name", description)
VALUES (9, 'Зачислен', 'По итогам мероприятий зачислен');
INSERT INTO status (status_id, "name", description)
VALUES (-1, 'Не зачислен', 'Не прошел отбор');

--- Вставка значений в таблицу candidate
INSERT INTO candidate (user_id, age, city, university, grade, phone, telegram, personal_info_approval, status_id)
VALUES ('c77c4a01-7a37-4eac-9af7-4f2196641d01', 18, 'Москва', 'РТУ МИРЭА', 1, '9264543824', 'evilboh', True, 0);
INSERT INTO candidate (user_id, age, city, university, grade, phone, telegram, personal_info_approval, status_id)
VALUES ('f8375ad9-51b3-4d4d-8d21-046724b396e2', 19, 'Москва', 'РТУ МИРЭА', 1, '9175275694', 'heart_of_frecles', True, 1);
INSERT INTO candidate (user_id, age, city, university, grade, phone, telegram, personal_info_approval, status_id)
VALUES ('f3c5ab74-0bd9-43a0-ad52-ebf1233183dd', 20, 'Москва', 'РТУ МИРЭА', 2, '9166563754', '_gogol_', True, 2);
INSERT INTO candidate (user_id, age, city, university, grade, phone, telegram, personal_info_approval, status_id)
VALUES ('d3b9a154-f6dd-44b8-84f6-0138f4b630c7', 18, 'Москва', 'НИУ ВШЭ', 1, '9264564345', '21xxx45', True, 2);
INSERT INTO candidate (user_id, age, city, university, grade, phone, telegram, personal_info_approval, status_id)
VALUES ('658fccba-392c-4c05-9fee-36affe6c75ac', 19, 'Москва', 'НИУ ВШЭ', 1, '9164956935', 'b0mber', True, 2);
INSERT INTO candidate (user_id, age, city, university, grade, phone, telegram, personal_info_approval, status_id)
VALUES ('b9ef15c5-e849-49af-99df-35ab5bc66c18', 20, 'Москва', 'МГТУ Станкин', 2, '9035456789', 'davalka123', True, 3);
INSERT INTO candidate (user_id, age, city, university, grade, phone, telegram, personal_info_approval, status_id)
VALUES ('9a57bf1f-d0f8-443f-b47a-17681bffa711', 19, 'Москва', 'РТУ МИРЭА', 2, '9175264838', 'gogogo313', True, 3);
INSERT INTO candidate (user_id, age, city, university, grade, phone, telegram, personal_info_approval, status_id)
VALUES ('dd848563-bff1-4c47-a41c-d496b818818e', 21, 'Москва', 'РТУ МИРЭА', 3, '9257375869', 'coolzheka', True, 4);
INSERT INTO candidate (user_id, age, city, university, grade, phone, telegram, personal_info_approval, status_id)
VALUES ('10a9fda0-8bb3-4cc6-89b9-b4d9f5ef563a', 20, 'Москва', 'МГУ', 3, '9997573853', 'sadlybones', True, 5);
INSERT INTO candidate (user_id, age, city, university, grade, phone, telegram, personal_info_approval, status_id)
VALUES ('04da1d46-08c6-43af-8df2-7b495d553ebd', 18, 'Москва', 'РТУ МИРЭА', 2, '9058493532', 'uthebest', True, 6);
INSERT INTO candidate (user_id, age, city, university, grade, phone, telegram, personal_info_approval, status_id)
VALUES ('57fe1976-df20-414f-bba9-4e1b107f2216', 18, 'Москва', 'НИУ ВШЭ', 2, '9175275432', 'hubbabubba', True, 7);
INSERT INTO candidate (user_id, age, city, university, grade, phone, telegram, personal_info_approval, status_id)
VALUES ('59275775-84da-48c9-982b-78f112b64815', 17, 'Москва', 'МГУ', 1, '9167583854', 'u23ghh56', True, 8);
INSERT INTO candidate (user_id, age, city, university, grade, phone, telegram, personal_info_approval, status_id)
VALUES ('9b2fee3d-4d03-48bf-a0fa-fb3b68e8078f', 19, 'Москва', 'МПГУ', 1, '9038584884', 'simpledimple', True, 8);
INSERT INTO candidate (user_id, age, city, university, grade, phone, telegram, personal_info_approval, status_id)
VALUES ('7122c992-27a9-4007-8959-378ce3e96205', 18, 'Москва', 'РТУ МИРЭА', 2, '9175627495', 'pokemon34', True, 9);
INSERT INTO candidate (user_id, age, city, university, grade, phone, telegram, personal_info_approval, status_id)
VALUES ('0cbeb408-875b-400a-86ac-2522f4199c1e', 20, 'Москва', 'РТУ МИРЭА', 3, '9175839547', 'zabolot12', True, -1);

--- Вставка значений в таблицу form
INSERT INTO form (candidate_id, skills_summary, project_summary, reason_summary, questions)
VALUES (1, 'C#, C++, Python', 'Статический анализатор для Visual Studio', 'Нужны новые скиллы', NULL);
INSERT INTO form (candidate_id, skills_summary, project_summary, reason_summary, questions)
VALUES (2, 'Python', 'Сайт-визитка', 'Хочу научиться чему-то новому', NULL);
INSERT INTO form (candidate_id, skills_summary, project_summary, reason_summary, questions)
VALUES (3, 'C++, Python', 'Мобильное приложение по подбору одежды', 'Узнал от друга, захотелось принять участие', NULL);
INSERT INTO form (candidate_id, skills_summary, project_summary, reason_summary, questions)
VALUES (4, 'C#, C++', 'Мобильное приложение для кондитерской', 'Заинтересовала для мобильных устройств', NULL);
INSERT INTO form (candidate_id, skills_summary, project_summary, reason_summary, questions)
VALUES (5, 'Brainfuck', 'Шуточное приложение', 'Хочу чему-то научиться', 'Когда будет первое занятие?');
INSERT INTO form (candidate_id, skills_summary, project_summary, reason_summary, questions)
VALUES (6, 'Assembler', 'Консоль для Windows', 'Получить новые знания', 'Во сколько будут занятия?');
INSERT INTO form (candidate_id, skills_summary, project_summary, reason_summary, questions)
VALUES (7, 'Sql, JS', 'База данных для сайта', 'Хочу чему-то научиться', 'Будет ли проект?');
INSERT INTO form (candidate_id, skills_summary, project_summary, reason_summary, questions)
VALUES (8, 'HTML, CSS, JS', 'Сайт-визитка', 'Хочу делать мобилки', NULL);
INSERT INTO form (candidate_id, skills_summary, project_summary, reason_summary, questions)
VALUES (9, 'C#', 'Проектировщик жилых помещений', 'Хочу научиться делать мобилки', NULL);
INSERT INTO form (candidate_id, skills_summary, project_summary, reason_summary, questions)
VALUES (10, 'C++', 'Нет', 'Хочу сделать что-то полезное', NULL);
INSERT INTO form (candidate_id, skills_summary, project_summary, reason_summary, questions)
VALUES (11, 'Java', 'Нет', 'Научиться мобильной разработке', NULL);
INSERT INTO form (candidate_id, skills_summary, project_summary, reason_summary, questions)
VALUES (12, '.NET', 'Планировщик', 'Делать игры для телефона', NULL);
INSERT INTO form (candidate_id, skills_summary, project_summary, reason_summary, questions)
VALUES (13, 'JS', 'Скрипт для сайта', 'Разрабатывать мобильные приложения', NULL);
INSERT INTO form (candidate_id, skills_summary, project_summary, reason_summary, questions)
VALUES (14, 'C#, Java', 'Приложение по подбору дешевых товаров', 'Научиться делать мобильные приложения', NULL);
INSERT INTO form (candidate_id, skills_summary, project_summary, reason_summary, questions)
VALUES (15, 'Python', 'Анализ фотографий', 'Узнал от одногруппника, хочу учиться чему-то новому', NULL);

--- Вставка значений в таблицу manager
INSERT INTO manager (user_id, access_level) VALUES ('42f7b3dd-8450-4dc1-bf74-6726b8b281a0', 1);
INSERT INTO manager (user_id, access_level) VALUES ('e1e4760d-4485-4e5b-aeac-035acc7724d5', 2);
INSERT INTO manager (user_id, access_level) VALUES ('04f7c4c3-2470-403a-86e0-3bbc3742f63f', 3);

--- Вставка значений в таблицу task
INSERT INTO task (caption, description, complexity, category)
VALUES ('Минимальное число', 'Определите, в какой минимальной системе счисления может быть записано число 2537.
        Переведите число из этой системы счисления в десятичную',
        1, 'Системы счисления');
INSERT INTO task (caption, description, complexity, category)
VALUES ('Минимальное число', 'Определите, в какой минимальной системе счисления может быть записано число 7531.
        Переведите число из этой системы счисления в десятичную',
        1, 'Системы счисления');
INSERT INTO task (caption, description, complexity, category)
VALUES ('Минимальное число', 'Определите, в какой минимальной системе счисления может быть записано число 5464.
        Переведите число из этой системы счисления в десятичную',
        1, 'Системы счисления');
INSERT INTO task (caption, description, complexity, category)
VALUES ('Минимальное число', 'Определите, в какой минимальной системе счисления может быть записано число 3421.
        Переведите число из этой системы счисления в десятичную.',
        1, 'Системы счисления');
INSERT INTO task (caption, description, complexity, category)
VALUES ('Логическое выражение', 'Напишите наименьшее целое число x, для которого истинно следующее высказывание:
        НЕ ((X < 2) И (X > 5)) ИЛИ (X > 10)',
        1, 'Логика');
INSERT INTO task (caption, description, complexity, category)
VALUES ('Логическое выражение', 'Напишите наименьшее целое число x, для которого истинно следующее высказывание:
        НЕ ((X < 5) И (X > 8)) ИЛИ (X > 2)',
        1, 'Логика');
INSERT INTO task (caption, description, complexity, category)
VALUES ('Логическое выражение', 'Напишите наименьшее целое число x, для которого истинно следующее высказывание:
        НЕ ((X < 0) И (X > 9)) ИЛИ (X > 9)',
        1, 'Логика');
INSERT INTO task (caption, description, complexity, category)
VALUES ('Логическое выражение', 'Напишите наименьшее целое число x, для которого истинно следующее высказывание:
        НЕ ((X < 3) И (X > 4)) ИЛИ (X > 3)',
        1, 'Логика');
INSERT INTO task (caption, description, complexity, category)
VALUES ('Работа с файлом', 'Школьник работал с файлом C:\Documents\Education\Math\Math-Homework1.pdf. Затем он
        поднялся на уровень вверх, создал там каталог Tasks, а в нем два каталога: Homeworks и
        Tests. Школьник перенес директорию Math в директорию Homeworks. Каким стало полное
        имя файла, с которым работал школьник, после сделанных им операций?',
        1, 'Директории');
INSERT INTO task (caption, description, complexity, category)
VALUES ('Работа с файлом', 'Сотрудник компании работал с файлом E:\Sheets\Departments\Cloud\Salary.xlsx. Затем он
        поднялся на два уровня вверх, создал там каталог Accounts, а в нем четыре каталога: Cloud, IT,
        Sales, Marketing. Сотрудник скопировал файл в директорию Accounts. Каким стало полное
        имя скопированного файла?',
        1, 'Директории');
INSERT INTO task (caption, description, "input", output, complexity, category)
VALUES ('Параллельные прямые', 'Любую прямую на плоскости можно описать следующим уравнением: ax + by + c = 0.
        На вход поступает 5 чисел: коэффициенты a1, b1, c1 первой прямой, коэффициенты a2, b2, c2 второй прямой
        и координаты точки (x, y). Необходимо выяснить, являются ли прямые параллельными и проходит ли хотя бы
        одна из прямых через точку (x, y).',
        'Коэффициенты a1, b1, c1 первой прямой, коэффициенты a2, b2, c2 второй прямой и координаты точки',
        'Вывести true или false',
        2, 'Условные операторы');
INSERT INTO task (caption, description, "input", output, complexity, category)
VALUES ('Монеты', 'Вася пришёл в магазин и после оплаты получил сдачу в n рублей. Всего существует 3 типа
        купюр номиналами m, k, l рублей соответственно (указаны по возрастанию). Гарантируется, что l делится
        нацело на k, k делится нацело на m. Васе очень хотелось бы получить сдачу так, чтобы у него было p купюр
        номиналом m, q купюр номиналом k и r купюр номиналом l. Сможет ли он разложить n рублей таким образом?',
        'На вход подаются числа n (всего рублей), номиналы купюр m, k, l и желаемое количество купюр p, q, r',
        'Вывести true или false',
        2, 'Условные операторы');

--- Вставка значений в таблицу individual_variant
INSERT INTO individual_variant (candidate_id, task_id) VALUES (1, (SELECT task_id FROM task WHERE complexity = 1 ORDER BY RANDOM() LIMIT 1));
INSERT INTO individual_variant (candidate_id, task_id) VALUES (1, (SELECT task_id FROM task WHERE complexity = 2 ORDER BY RANDOM() LIMIT 1));
INSERT INTO individual_variant (candidate_id, task_id) VALUES (2, (SELECT task_id FROM task WHERE complexity = 1 ORDER BY RANDOM() LIMIT 1));
INSERT INTO individual_variant (candidate_id, task_id) VALUES (2, (SELECT task_id FROM task WHERE complexity = 2 ORDER BY RANDOM() LIMIT 1));
INSERT INTO individual_variant (candidate_id, task_id) VALUES (3, (SELECT task_id FROM task WHERE complexity = 1 ORDER BY RANDOM() LIMIT 1));
INSERT INTO individual_variant (candidate_id, task_id) VALUES (3, (SELECT task_id FROM task WHERE complexity = 2 ORDER BY RANDOM() LIMIT 1));
INSERT INTO individual_variant (candidate_id, task_id) VALUES (4, (SELECT task_id FROM task WHERE complexity = 1 ORDER BY RANDOM() LIMIT 1));
INSERT INTO individual_variant (candidate_id, task_id) VALUES (4, (SELECT task_id FROM task WHERE complexity = 2 ORDER BY RANDOM() LIMIT 1));
INSERT INTO individual_variant (candidate_id, task_id) VALUES (5, (SELECT task_id FROM task WHERE complexity = 1 ORDER BY RANDOM() LIMIT 1));
INSERT INTO individual_variant (candidate_id, task_id) VALUES (5, (SELECT task_id FROM task WHERE complexity = 2 ORDER BY RANDOM() LIMIT 1));
INSERT INTO individual_variant (candidate_id, task_id) VALUES (6, (SELECT task_id FROM task WHERE complexity = 1 ORDER BY RANDOM() LIMIT 1));
INSERT INTO individual_variant (candidate_id, task_id) VALUES (6, (SELECT task_id FROM task WHERE complexity = 2 ORDER BY RANDOM() LIMIT 1));
INSERT INTO individual_variant (candidate_id, task_id) VALUES (7, (SELECT task_id FROM task WHERE complexity = 1 ORDER BY RANDOM() LIMIT 1));
INSERT INTO individual_variant (candidate_id, task_id) VALUES (7, (SELECT task_id FROM task WHERE complexity = 2 ORDER BY RANDOM() LIMIT 1));
INSERT INTO individual_variant (candidate_id, task_id) VALUES (8, (SELECT task_id FROM task WHERE complexity = 1 ORDER BY RANDOM() LIMIT 1));
INSERT INTO individual_variant (candidate_id, task_id) VALUES (8, (SELECT task_id FROM task WHERE complexity = 2 ORDER BY RANDOM() LIMIT 1));
INSERT INTO individual_variant (candidate_id, task_id) VALUES (9, (SELECT task_id FROM task WHERE complexity = 1 ORDER BY RANDOM() LIMIT 1));
INSERT INTO individual_variant (candidate_id, task_id) VALUES (9, (SELECT task_id FROM task WHERE complexity = 2 ORDER BY RANDOM() LIMIT 1));
INSERT INTO individual_variant (candidate_id, task_id) VALUES (10, (SELECT task_id FROM task WHERE complexity = 1 ORDER BY RANDOM() LIMIT 1));
INSERT INTO individual_variant (candidate_id, task_id) VALUES (10, (SELECT task_id FROM task WHERE complexity = 2 ORDER BY RANDOM() LIMIT 1));
INSERT INTO individual_variant (candidate_id, task_id) VALUES (11, (SELECT task_id FROM task WHERE complexity = 1 ORDER BY RANDOM() LIMIT 1));
INSERT INTO individual_variant (candidate_id, task_id) VALUES (11, (SELECT task_id FROM task WHERE complexity = 2 ORDER BY RANDOM() LIMIT 1));
INSERT INTO individual_variant (candidate_id, task_id) VALUES (12, (SELECT task_id FROM task WHERE complexity = 1 ORDER BY RANDOM() LIMIT 1));
INSERT INTO individual_variant (candidate_id, task_id) VALUES (12, (SELECT task_id FROM task WHERE complexity = 2 ORDER BY RANDOM() LIMIT 1));
INSERT INTO individual_variant (candidate_id, task_id) VALUES (13, (SELECT task_id FROM task WHERE complexity = 1 ORDER BY RANDOM() LIMIT 1));
INSERT INTO individual_variant (candidate_id, task_id) VALUES (13, (SELECT task_id FROM task WHERE complexity = 2 ORDER BY RANDOM() LIMIT 1));
INSERT INTO individual_variant (candidate_id, task_id) VALUES (14, (SELECT task_id FROM task WHERE complexity = 1 ORDER BY RANDOM() LIMIT 1));
INSERT INTO individual_variant (candidate_id, task_id) VALUES (14, (SELECT task_id FROM task WHERE complexity = 2 ORDER BY RANDOM() LIMIT 1));
INSERT INTO individual_variant (candidate_id, task_id) VALUES (15, (SELECT task_id FROM task WHERE complexity = 1 ORDER BY RANDOM() LIMIT 1));
INSERT INTO individual_variant (candidate_id, task_id) VALUES (15, (SELECT task_id FROM task WHERE complexity = 2 ORDER BY RANDOM() LIMIT 1));

--- Вставка значений в таблицу interview
INSERT INTO interview (candidate_id, motivation_points, theory_points, favorite_points) VALUES (11, 2, 1, 1);
INSERT INTO interview (candidate_id, motivation_points, theory_points, favorite_points) VALUES (12, 0, 1, 0);
INSERT INTO interview (candidate_id, motivation_points, theory_points, favorite_points) VALUES (13, 1, 2, 1);
INSERT INTO interview (candidate_id, motivation_points, theory_points, favorite_points) VALUES (14, 2, 2, 2);

--- Вставка значений в таблицу interview_manager
INSERT INTO interview_manager (interview_id, manager_id) VALUES (1, 1);
INSERT INTO interview_manager (interview_id, manager_id) VALUES (1, 2);
INSERT INTO interview_manager (interview_id, manager_id) VALUES (2, 1);
INSERT INTO interview_manager (interview_id, manager_id) VALUES (2, 3);
INSERT INTO interview_manager (interview_id, manager_id) VALUES (3, 2);
INSERT INTO interview_manager (interview_id, manager_id) VALUES (3, 3);
INSERT INTO interview_manager (interview_id, manager_id) VALUES (4, 2);

--- # Триггер на обновление временной метки
--- Добавление поля
ALTER TABLE interview ADD stamp TIMESTAMP;

--- Создание функции
CREATE OR REPLACE FUNCTION update_stamp_column()
RETURNS TRIGGER AS $$
BEGIN
   NEW.stamp = now();
RETURN NEW;
END;
$$ language 'plpgsql';

--- Создание триггера
CREATE OR REPLACE TRIGGER update_stamp BEFORE INSERT OR UPDATE ON interview
                                                               FOR EACH ROW EXECUTE PROCEDURE update_stamp_column();

--- # Триггер на внесение записи
--- Создание функции
CREATE OR REPLACE FUNCTION gen_tasks_for_individual_variant()
RETURNS TRIGGER AS $$
DECLARE
task_id_1 INT;
task_id_2 INT;
variant_id INT;
BEGIN
    -- Генерируем id задач разных сложностей
SELECT INTO task_id_1 task_id FROM task WHERE complexity = 1 ORDER BY RANDOM() LIMIT 1;
SELECT INTO task_id_2 task_id FROM task WHERE complexity = 2 ORDER BY RANDOM() LIMIT 1;

-- Получаем номер создаваемого варианта
SELECT INTO variant_id nextval(pg_get_serial_sequence('individual_variant', 'individual_variant_id'));

-- Производим вставку значений
INSERT INTO individual_variant (individual_variant_id, candidate_id, task_id) VALUES
                                                                                  (variant_id, NEW.candidate_id, task_id_1),
                                                                                  (variant_id, NEW.candidate_id, task_id_2);

RETURN NEW;
END;
$$ language 'plpgsql';

--- Создание триггера
CREATE OR REPLACE TRIGGER gen_individual_variant AFTER INSERT ON candidate
    FOR EACH ROW EXECUTE PROCEDURE gen_tasks_for_individual_variant();
