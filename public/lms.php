<?php
session_start();
if (!array_key_exists("flag", $_SESSION)) {
    header('Location: error404.php');
    die;
}
else {
    $email = $_SESSION["email"];
    $pwd = $_SESSION["password"];
    $conn_string = "host=pg_container port=5432 dbname=test_db user=root password=root";
    $conn = pg_connect($conn_string);
    $query = "SELECT COUNT(*) FROM users WHERE email='$email' AND password='$pwd'";
    $result = pg_query($conn, $query);

    if (pg_num_rows($result) == 0) {
        header('Location: error404.php');
        die;
    }

    $query = "SELECT name, role FROM users WHERE email='$email' AND password='$pwd'";
    $result = pg_query($conn, $query);
    $name = pg_fetch_result($result, 0, 0);
    $role = pg_fetch_result($result, 0, 1);

    $dom = new domDocument();
    $dom->loadHTMLFile('lms_page.php');
    $dom->getElementById('name')->nodeValue = $name;
    $dom->getElementById('role')->nodeValue = $role;

    $query = "SELECT fio, city, university, grade, phone, telegram, skills_summary, project_summary, reason_summary, questions, got FROM candidate ORDER BY got DESC";
    $result = pg_query($conn, $query);
    while ($row_users = pg_fetch_array($result)) {
        $fio = $row_users['fio'];
        $got = $row_users['got'];
        $city = $row_users['city'];
        $university = $row_users['university'];
        $grade = $row_users['grade'];
        $phone = $row_users['phone'];
        $telegram = $row_users['telegram'];
        $skills_summary = $row_users['skills_summary'];
        $project_summary = $row_users['project_summary'];
        $reason_summary = $row_users['reason_summary'];
        $questions = $row_users['questions'];

        $fragment = $dom->createDocumentFragment();
        $fragment->appendXML('<div class="form-item">
                    <div class="form-item-div">
                        <h3>'.$fio.'</h3>
                        <p>'.$got.'</p>
                    </div>
                    <div class="edu-div">
                        <p>Город: '.$city.'</p>
                        <p>Место обучения: '.$university.'</p>
                        <p>Класс обучения: '.$grade.'</p>
                        <p>Телефон: '.$phone.'</p>
                        <p>Телеграм: '.$telegram.'</p>
                    </div>
                    <div>
                        <p>Скилы: '.$skills_summary.'</p>
                        <p>Проект: '.$project_summary.'</p>
                        <p>Причина участия: '.$reason_summary.'</p>
                        <p>Вопросы: '.$questions.'</p>
                    </div>
                </div>');
        $dom->getElementById('forms')->appendChild($fragment);
    }


    echo $dom->saveXML();
}