<?php
require_once "./config/Database.php";
//запрос на авторизацию
if(isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    if(Auth::checkPassword($email,$password)) {
        $key = Auth::getKey($email);
        setcookie('key', $key, time() + 604800, '/');
        header("Location: index.php");
        exit();
    }
    else {
        $wrong = "Неправильный email или пароль!";
    }
}
// проверка на вход на странице
if(Auth::isLogged()) {
    header("Location: index.php");exit;
    $isLogged = true;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tula-app</title>
    <link rel="stylesheet" href="./css/style.css">
</head>

<body>
    <div id="main" class="container">
        <form action="" method="post" class="form">
            <h2>Вход</h2>
            <div class="input-group">
                <input id="login_input" type="text" name="email" placeholder="Email">
            </div>
            <div class="input-group">
                <input id="password" type="password" name="password" placeholder="Password">
                <svg id="togglePassword" class="pass-eye" width="22" height="16" viewBox="0 0 22 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M11.0008 10.9091C12.6209 10.9091 13.9342 9.60666 13.9342 8.00002C13.9342 6.39337 12.6209 5.09093 11.0008 5.09093C9.38072 5.09093 8.06738 6.39337 8.06738 8.00002C8.06738 9.60666 9.38072 10.9091 11.0008 10.9091Z" fill="#3042E2"/>
                    <path d="M21.9563 7.75273C21.0938 5.54011 19.5964 3.62663 17.6492 2.24879C15.702 0.87095 13.3904 0.089144 11 0C8.60964 0.089144 6.29802 0.87095 4.35083 2.24879C2.40363 3.62663 0.906232 5.54011 0.0436893 7.75273C-0.0145631 7.91251 -0.0145631 8.08749 0.0436893 8.24727C0.906232 10.4599 2.40363 12.3734 4.35083 13.7512C6.29802 15.1291 8.60964 15.9109 11 16C13.3904 15.9109 15.702 15.1291 17.6492 13.7512C19.5964 12.3734 21.0938 10.4599 21.9563 8.24727C22.0146 8.08749 22.0146 7.91251 21.9563 7.75273ZM11 12.7273C10.0572 12.7273 9.1356 12.45 8.35171 11.9306C7.56781 11.4111 6.95684 10.6728 6.59605 9.80905C6.23526 8.94525 6.14086 7.99476 6.32479 7.07775C6.50872 6.16075 6.96271 5.31843 7.62936 4.65731C8.29601 3.99619 9.14537 3.54596 10.07 3.36356C10.9947 3.18116 11.9532 3.27477 12.8242 3.63257C13.6952 3.99037 14.4397 4.59627 14.9635 5.37367C15.4872 6.15106 15.7668 7.06503 15.7668 8C15.7649 9.25316 15.262 10.4544 14.3685 11.3406C13.475 12.2267 12.2636 12.7253 11 12.7273Z" fill="#3042E2"/>
                    </svg>
            </div>
            <div class="forgot-pass">
                <a class="forgot-link" href="#">Забыли пароль?</a>
            </div>
            <div class="pass">
                <input id="submit-btn" type="submit" name="submit">
                <a href="#">Нет аккаунта? <b>Зарегистрироваться</b></a>
            </div>
        </form>
    </div>


    <script>
        const togglePassword = document.querySelector("#togglePassword");
        const password = document.querySelector("#password");

        togglePassword.addEventListener("click", function () {
            const type = password.getAttribute("type") === "password" ? "text" : "password";
            password.setAttribute("type", type);
            
            this.classList.toggle("bi-eye");
        });





        
    </script>


</body>

</html>