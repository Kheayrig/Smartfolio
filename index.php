<?php
require_once "Database.php";
$in_btn = "";
if(Auth::isLogged()) {
    $in_btn = true;
} else {
    $in_btn = false;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/index.css">

</head>
<body>

<header class="header">
    <div class="container">
        <div class="header__inner">

            <a href="#" class="logo">
                <img class="logo__img" src="images/logo-name.png" alt="logo">
            </a>

            <nav class="menu">

                <div class="menu__btn">
                    <span></span>
                </div>

                <ul class="menu__list">
                    <li class="menu__list-item">
                        <a class="menu__list-link link-main" href="#">Главная</a>
                    </li>
                    <li class="menu__list-item">
                        <a class="menu__list-link" href="#">Примеры</a>
                    </li>
                    <li class="menu__list-item">
                        <a class="menu__list-link" href="#">Создать резюме</a>
                    </li>
                    <li class="menu__list-item">
                        <a class="menu__list-link" href="#">Мои резюме</a>
                    </li>
                </ul>

            </nav>

            <div class="user-nav">
                <?php
                if($in_btn) {
                    echo "<a class='user-nav__link' href='./logout.php'>Выйти</a>";
                } else {
                    echo "<a class='user-nav__link' href='./auth.php'>Войти</a>";
                }
                ?>
            </div>
        </div>
    </div>
</header>

<section class="top">
    <div class="container top__cont">
        <div class="top__inner">

            <h1 class="top__title title">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit ut aliquam
            </h1>
            <p class="top__text">
                Lorem ipsum dolor sit amet
            </p>
            <button class="top__btn">Создать</button>
            <!-- <a href="#" class="top__link">Watch the video</a> -->
        </div>
        <!-- <div class="top__image">
          <img src="/images/vector-image.jpg" height="550px" width="550px" alt="">
        </div> -->
    </div>
</section>
</body>
</html>