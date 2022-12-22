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
    $query = "SELECT COUNT(*) FROM \"user\" WHERE email='$email' AND password='$pwd'";
    $result = pg_query($conn, $query);

    if (pg_num_rows($result) == 0) {
        header('Location: error404.php');
        die;
    }

    $query = "SELECT access_level FROM manager WHERE user_id=(SELECT user_id FROM \"user\" WHERE email='$email' AND password='$pwd' LIMIT 1);";
    $result = pg_query($conn, $query);
    $role = pg_fetch_result($result, 0, 0);

    $query = "SELECT surname, name, patronymic FROM \"user\" WHERE email='$email' AND password='$pwd';";
    $result = pg_query($conn, $query);
    $name = pg_fetch_result($result, 0, 0) . ' ' . pg_fetch_result($result, 0, 1) . ' ' . pg_fetch_result($result, 0, 2);

    $dom = new domDocument();
    $dom->loadHTMLFile('lms_page.php');
    $dom->getElementById('name')->nodeValue = $name;
    $dom->getElementById('role')->nodeValue = "Уровень доступа: " . $role;

    if(isset($_GET['remove'])) {
        $param = $_GET['remove'];
        $query = "DELETE FROM \"user\" WHERE user_id = '$param';";
        pg_query($conn, $query);
    }

    if(isset($_GET['sort'])) {
        $param = $_GET['sort'];
        if ($param == 'surname')
            $query = "SELECT surname, name, patronymic, user_id FROM \"user\" ORDER BY surname;";
        else if ($param == 'name')
            $query = "SELECT surname, name, patronymic, user_id FROM \"user\" ORDER BY name;";
        else if ($param == 'patronymic')
            $query = "SELECT surname, name, patronymic, user_id FROM \"user\" ORDER BY patronymic;";
        else
            $query = "SELECT surname, name, patronymic, user_id FROM \"user\";";
    } else {
        $query = "SELECT surname, name, patronymic, user_id FROM \"user\";";
    }
    $result = pg_query($conn, $query);
    while ($row_users = pg_fetch_array($result)) {
        $user_id = $row_users['user_id'];
        $checkquery = "SELECT COUNT(*) FROM candidate WHERE user_id='$user_id';";
        $checkresult = pg_query($conn, $checkquery);
        if (pg_fetch_result($checkresult, 0, 0) == 0)
            continue;

        $subquery1 = "SELECT candidate_id, city, university, grade, phone, telegram FROM candidate WHERE user_id='$user_id';";
        $subresult1 = pg_query($conn, $subquery1);
        $candidate_id = pg_fetch_result($subresult1, 0, 0);

        $subquery2 = "SELECT skills_summary, project_summary, reason_summary, questions FROM form WHERE candidate_id='$candidate_id';";
        $subresult2 = pg_query($conn, $subquery2);

        $fio = $row_users['surname'].' '.$row_users['name'].' '.$row_users['patronymic'];
        $got = ' ';

        $city = pg_fetch_result($subresult1, 0, 1);
        $university = pg_fetch_result($subresult1, 0, 2);
        $grade = pg_fetch_result($subresult1, 0, 3);
        $phone = pg_fetch_result($subresult1, 0, 4);
        $telegram = pg_fetch_result($subresult1, 0, 5);

        $skills_summary = pg_fetch_result($subresult2, 0, 0);
        $project_summary = pg_fetch_result($subresult2, 0, 1);
        $reason_summary = pg_fetch_result($subresult2, 0, 2);
        $questions = pg_fetch_result($subresult2, 0, 3);

        $fragment = $dom->createDocumentFragment();
        $fragment->appendXML('<div class="form-item">
                    <div class="form-item-div">
                        <h3>' . $fio . '</h3>
                        <a class="btn-erase" href="lms.php?remove=' . $user_id . '">удалить</a>
                    </div>
                    <div class="edu-div">
                        <p>Город: ' . $city . '</p>
                        <p>Место обучения: ' . $university . '</p>
                        <p>Класс обучения: ' . $grade . '</p>
                        <p>Телефон: ' . $phone . '</p>
                        <p>Телеграм: ' . $telegram . '</p>
                    </div>
                    <div>
                        <p>Скилы: ' . $skills_summary . '</p>
                        <p>Проект: ' . $project_summary . '</p>
                        <p>Причина участия: ' . $reason_summary . '</p>
                        <p>Вопросы: ' . $questions . '</p>
                    </div>
                </div>');
        $dom->getElementById('forms')->appendChild($fragment);
    }


    echo $dom->saveXML();
}