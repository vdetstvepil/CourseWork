<?php
// Объявляем переменные
$err = "";
$email = $pwd = "";

// Если сервер вернул результат, то обрабатываем пришедшие данные
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Флаг толерантности
    $check = true;

    // Ошибка в поле "Пароль"
    if (empty($_POST["pwd"])) {
        $err = "Необходим пароль";
        $check = false;
    } else {
        $pwd = test_input($_POST["pwd"]);
    }

    // Ошибка в поле "Почта"
    if (empty($_POST["email"])) {
        $err = "Неверно указана почта";
        $check = false;
    } else {
        $email = test_input($_POST["email"]);

        // Валидируем адрес
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $err = "Неверно указан адрес электронной почты";
            $check = false;
        }
    }
    if ($check) {
        $conn_string = "host=pg_container port=5432 dbname=test_db user=root password=root";
        $conn = pg_connect($conn_string);
        $query = "SELECT * FROM \"user\" WHERE email='$email' AND \"password\"='$pwd'";
        $result = pg_query($conn, $query);

        if (pg_num_rows($result) == 0) {
            $err = "Неверные учетные данные";
        }
        else {
            session_start();
            $_SESSION["flag"] = true;
            $_SESSION["email"] = $email;
            $_SESSION["password"] = $pwd;
            header('Location: lms.php');
            exit();
        }
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
    <title>Авторизация</title>
    <link rel="stylesheet" href="styles/auth.css">
    <link rel="icon" type="image/x-icon" href="/Resources/favicon.ico">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:100,200,300,400,500,600,700,800,900" rel="stylesheet">
</head>
<body>
<section class="main-section" style="display: flex; flex-direction: column" id="main">
   <div class="rectangle-outside">
       <div class="rectangle-inside">
           <div class="header">
               <img id="logo" src="Resources/wasp-logo.png" />
               <h3>Личный кабинет</h3>
           </div>
           <div class="auth-field">
               <h4>Вход в систему</h4>
               <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?> ">
                   <input type="email" id="email-name" name="email" placeholder="Логин" value="<?php echo $email;?>">
                   <input type="password" id="pwd-name" name="pwd" placeholder="Пароль" value="<?php echo $pwd;?>">
                    <div style="display: flex; flex-direction: column;">
                        <span class="error"><?php echo $err;?></span>
                        <input type="submit" name="submit" value="Войти">
                    </div>
               </form>
           </div>
       </div>
   </div>
</section>

</body>
</html>
