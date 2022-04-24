<?php
require_once "./config/Database.php";
require_once "./config/Portfolio.php";
    $email = Auth::getEmailByKey($_COOKIE['key']);
    
    $user = Portfolio::get($email);
    $ed = explode(', ', $user['education']);
    $ach = explode('^$', $user['achievements']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>PDF</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300&display=swap" rel="stylesheet">
  <style>
    *{
    box-sizing: border-box;
}
body {
    width: 1240px;
    height: 1754px;
    padding-top: 110px;
    font-family: 'Raleway', sans-serif;
    font-weight: 500;
    color: #ffffff;
    font-size: 16px;
    line-height: 26px;
    background: #EFEFEF;
}
h1{
    font-family: 'Raleway';
    font-size: 24px;
    color: #3042E2;
}
br{
    opacity: 0.8;
}
.cdvig{
    margin-left: 24px;
}
.stolb{
    gap: 32px;
}
.ocnova{
    margin: 431px 48px 48px 48px;
    padding-top: 0px;
    width: 1156px;
    height: auto;
    vertical-align: text-top;
    border-collapse: collapse;
}
.blok-inf{
    margin-bottom: 24px;
    margin-top: 0px;
    padding: 20px 24px 32px 24px;
    width: 360px;
    height: auto;
    background: #FFFFFF;
    border: 0px;
    border-radius: 13.9535px;
    color: #1D1C2A;
    font-family: 'Raleway';
    font-size: 16px;
    line-height: 26px;
}
.shapka{
    position: absolute;
    left: 0px;
    width: 376px;
    height: 273px;
    background: none;
    background-image: url(Rectangle.png);
    background-repeat: no-repeat;
}
.hoto{
    position: absolute;
    width: 270.03px;
    height: 273px;
    left: 89.97px;
    border-radius: 50%;
    background: #757272;
    background-image: url(Ellipse.png);
    background-repeat: no-repeat;
}
.form{
    position: absolute;
    width: 747px;
    height: 273px;
    left: 445px;
    background: #FFFFFF;
    border: 0px;
    border-radius: 13.9535px;
    color:black;
    align-items: center;
    text-align: left;
    vertical-align: center;
    border-collapse: collapse;

}
tr{
    height: 32px;
    vertical-align: center;
}
th{
    font-family: 'Evolventa';
    font-style: normal;
    font-weight: 700;
    font-size: 18px;
}
td{
    font-family: 'Evolventa';
    font-style: normal;
    font-size: 18px;
    vertical-align: top;
}
.fon-1{
    background: rgba(48, 66, 226, 0.13);
}
.stol-1{
    padding-left: 23px;
    padding-top: 7px;
    width: 287px;
    height: 32px;
}
.ots-1{
    padding-top: 23px;
}
.ots-2{
    padding-bottom: 23px;
}
  </style>
</head>
<body>

  <div class="shapka">
    <div class="hoto">
    </div>
  </div>
  <table class="form">
    <tr class="ots-1"><th class="stol-1">ФИО</th><th><?php echo $user['lastName'] . " " . $user['firstName'] . " " . $user['patronymic'] ?></th></tr>
    <tr class="fon-1"><th class="stol-1">Должность</th><td><?php echo $user['profession'] ?></td></tr>
    <tr><th class="stol-1">Дата рождения</th><td><?php echo $user['birthdate'] ?></td></tr>
    <tr class="fon-1"><th class="stol-1">Номер телефона</th><td><?php echo $user['phone'] ?></td></tr>
    <tr><th class="stol-1">E-mail</th><td><?php echo $user['email'] ?></td></tr>
    <tr class="fon-1"><th class="stol-1">Telegram</th><td><?php echo $user['tg_nick'] ?></td></tr>
    <tr class="ots-2"><th class="stol-1">Адрес</th><td><?php echo $user['city'] ?></td></tr>
  </table>
  <table class="ocnova">
    <tr>
      <td class="stolb">
        <div class="blok-inf">
          <h1><nobr>Информация о должности </nobr></h1>
          <p> 
            <br><b>Занятость:</b> стажировка
            <br><b>График работы:</b> удаленная работа
            <br><b>Зарплата от:</b> <?php echo $user['salary'] . "." ?>
            <br><b>Возможность командировки</b>: никогда
            <br><b>Переезд:</b> желателен
          </p>
        </div>
        <div class="blok-inf">
          <h1>Опыт работы</h1>
          <p>
            <br><b>Junior UX/UI Designer</b>
            <br>«Тензор»
            <br>Май 2021 — Декабрь 2021 (8 месяцев)</br>
            <br><b>Junior UX/UI Designer</b>
            <br>«Горячие Перцы»
            <br>Декабрь 2021 — Март 2022 (4 месяца)</br>
             </p>
        </div>
        <div class="blok-inf">
          <h1>Образование </h1>
          <p>
            <br><b><?php echo $ed[1] ?></b>
            <br><?php echo $ed[3] ?>
            <br><?php echo $ed[4] ?>
            <br>
          </p>
        </div>
        <div class="blok-inf">
          <h1>Доп. Образование </h1>
          <p>
            <br><b>Тензор</b>
            <br>Школа Frontend
            <br>2021
          </p>
        </div>
        <img src="Rectangle2.png" alt="">
      </td>
      <td class="stolb">
        <div class="blok-inf">
          <h1>Знание языков</h1>
          <p>
            <b>
              <br>Русский — Родной
            <br>Английский — B1 — Средний 
            </b>
             </p>
        </div>
        <div class="blok-inf">
          <h1>Достижения </h1>
          <p>
            <br><b><?php echo $ach[0] ?> </b>
              <br> <?php echo $ach[1] ?>
             </p>
        </div>
        <div class="blok-inf">
          <h1>Навыки </h1>
          <p>
            <br><b>Программы</b>
            <br><?php echo $user['programs'] ?></br>
            <br><b>Ключевые навыки</b>
            <br><?php echo $user['skills'] ?></br>
             </p>
        </div>
        <img src="Rectangle2.png" alt="">
      </td>
      <td class="stolb">
        <div class="blok-inf">
          <h1>Обо мне </h1>
          <p> 
            <br> <?php echo $user['about'] ?>
          </p>
        </div>
        <img src="Rectangle2.png" alt="">
      </td>
    </tr>
  </table>
</body>
</html>