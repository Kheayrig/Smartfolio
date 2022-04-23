<?php
require_once "./config/Database.php";
require_once "./config/Portfolio.php";
$in_btn = "";
$notEnough = false;
if(Auth::isLogged()) {
    $in_btn = true;
} else {
    $in_btn = false;
    header("Location: auth.php");
    exit;
}
    if(isset($_POST['submit'])) {
        if(isset($_POST['fname']) && isset($_POST['lname']) && isset($_POST['mname']) && isset($_POST['city']) && isset($_POST['bdate'])
            && isset($_POST['gender']) && isset($_POST['img']) && isset($_POST['email']) && isset($_POST['phone']) && isset($_POST['tgname'])
            && isset($_POST['jname']) && isset($_POST['salary']) && isset($_POST['skills']) && isset($_POST['prog'])
            && isset($_POST['exp']) && isset($_POST['edulevel']) && isset($_POST['university'])
            && isset($_POST['faculty']) && isset($_POST['spec']) && isset($_POST['grad']) && isset($_POST['about']) && isset($_POST['achieve'])
            && isset($_POST['result'])) {
                $firstName = $_POST['fname'];
                $lastName = $_POST['lname'];
                $patronymic = $_POST['mname'];
                $email = $_POST['email'];
                $birthdate = $_POST['bdate'];
                $gender = $_POST['jname'];
                $phone = $_POST['phone'];
                $tg_name = $_POST['tgname'];
                $img = $_FILES['img'] ?? null;
                if($img) {
                    $img_name = $img['tmp_name'];
                    move_uploaded_file($img['tmp_name'], "./uploads/$email/$img_name");
                }
                $city = $_POST['city'];
                //"Место работы: " . $_POST['workplace'] . ", Компания: " . $_POST['company'] . "Должность: " . $_POST['post'];
                $profession = "Нет";
                $salary = $_POST['salary'];
                $skills = $_POST['skills'];
                $programs = $_POST['prog'];
                $exp = $_POST['exp'];
                $work_place = "no";
                $education = "Уровень: " . $_POST['edulevel'] . ", Университет: " . $_POST['university'] . ", Факультет: " . $_POST['faculty'] . ", Специализация: " . $_POST['spec'] . ",Год выпуска: " . $_POST['faculty'];
                $about = $_POST['about'];
                $achievements = $_POST['achieve'] . " " . $_POST['result'];
                Portfolio::create($email,$firstName,$lastName,$patronymic,$city,$birthdate,$gender,$phone,$tg_name,$img,$profession,$salary,$skills,$programs,$exp,$work_place,$education,$about,$achievements);
                //header("Location: index.php");exit;
        }
        else {
            $notEnough = true;
        }
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Smartfolio</title>
  <link rel="shortcut icon" href="./images/logo.png" type="image/png">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300&display=swap"
    rel="stylesheet">
  <link rel="stylesheet" href="./css/form.css">

</head>

<body>

<header class="header">
    <div class="container">
        <div class="header__inner">

            <a href="./index.php" class="logo">
                <svg class="icon__logo" xmlns="http://www.w3.org/2000/svg" width="223" height="48" viewBox="0 0 223 48" fill="none">
                    <path d="M71.904 18.232C71.7547 18.0827 71.4773 17.88 71.072 17.624C70.688 17.368 70.208 17.1227 69.632 16.888C69.0773 16.6533 68.4693 16.4507 67.808 16.28C67.1467 16.088 66.4747 15.992 65.792 15.992C64.5973 15.992 63.6907 16.216 63.072 16.664C62.4747 17.112 62.176 17.7413 62.176 18.552C62.176 19.1707 62.368 19.6613 62.752 20.024C63.136 20.3867 63.712 20.696 64.48 20.952C65.248 21.208 66.208 21.4853 67.36 21.784C68.8533 22.1467 70.144 22.5947 71.232 23.128C72.3413 23.64 73.184 24.3227 73.76 25.176C74.3573 26.008 74.656 27.1173 74.656 28.504C74.656 29.72 74.432 30.7653 73.984 31.64C73.536 32.4933 72.9173 33.1867 72.128 33.72C71.3387 34.2533 70.4427 34.648 69.44 34.904C68.4373 35.1387 67.3707 35.256 66.24 35.256C65.1093 35.256 63.9787 35.1387 62.848 34.904C61.7173 34.6693 60.6293 34.3387 59.584 33.912C58.5387 33.464 57.5787 32.9307 56.704 32.312L58.656 28.504C58.848 28.696 59.1893 28.952 59.68 29.272C60.1707 29.5707 60.768 29.88 61.472 30.2C62.176 30.4987 62.944 30.7547 63.776 30.968C64.608 31.1813 65.4507 31.288 66.304 31.288C67.4987 31.288 68.4053 31.0853 69.024 30.68C69.6427 30.2747 69.952 29.6987 69.952 28.952C69.952 28.2693 69.7067 27.736 69.216 27.352C68.7253 26.968 68.0427 26.6373 67.168 26.36C66.2933 26.0613 65.2587 25.7413 64.064 25.4C62.6347 24.9947 61.44 24.5467 60.48 24.056C59.52 23.544 58.8053 22.904 58.336 22.136C57.8667 21.368 57.632 20.408 57.632 19.256C57.632 17.6987 57.9947 16.3973 58.72 15.352C59.4667 14.2853 60.4693 13.4853 61.728 12.952C62.9867 12.3973 64.384 12.12 65.92 12.12C66.9867 12.12 67.9893 12.2373 68.928 12.472C69.888 12.7067 70.784 13.016 71.616 13.4C72.448 13.784 73.1947 14.2 73.856 14.648L71.904 18.232ZM103.531 35H99.2433V25.592C99.2433 24.2693 99.0086 23.2987 98.5393 22.68C98.0913 22.04 97.4619 21.72 96.6513 21.72C95.8193 21.72 95.0193 22.0507 94.2513 22.712C93.5046 23.352 92.9713 24.1947 92.6513 25.24V35H88.3633V25.592C88.3633 24.248 88.1286 23.2667 87.6593 22.648C87.2113 22.0293 86.5819 21.72 85.7713 21.72C84.9393 21.72 84.1393 22.04 83.3713 22.68C82.6246 23.32 82.0913 24.1627 81.7713 25.208V35H77.4833V18.232H81.3553V21.336C81.9953 20.248 82.8486 19.416 83.9153 18.84C84.9819 18.2427 86.2086 17.944 87.5953 17.944C88.9819 17.944 90.0593 18.2853 90.8273 18.968C91.6166 19.6507 92.1179 20.4933 92.3313 21.496C93.0139 20.344 93.8779 19.4693 94.9233 18.872C95.9899 18.2533 97.1846 17.944 98.5073 17.944C99.5526 17.944 100.395 18.136 101.035 18.52C101.697 18.8827 102.209 19.384 102.571 20.024C102.934 20.6427 103.179 21.3467 103.307 22.136C103.457 22.9253 103.531 23.7253 103.531 24.536V35ZM106.113 30.04C106.113 28.952 106.411 28.0027 107.009 27.192C107.627 26.36 108.481 25.72 109.569 25.272C110.657 24.824 111.905 24.6 113.312 24.6C114.017 24.6 114.731 24.6533 115.457 24.76C116.182 24.8667 116.811 25.0373 117.345 25.272V24.376C117.345 23.3093 117.025 22.488 116.385 21.912C115.766 21.336 114.838 21.048 113.601 21.048C112.683 21.048 111.809 21.208 110.977 21.528C110.145 21.848 109.27 22.3173 108.353 22.936L106.977 20.12C108.086 19.3947 109.217 18.8507 110.369 18.488C111.542 18.1253 112.769 17.944 114.049 17.944C116.438 17.944 118.294 18.5413 119.617 19.736C120.961 20.9307 121.633 22.6373 121.633 24.856V30.2C121.633 30.648 121.707 30.968 121.857 31.16C122.027 31.352 122.294 31.4693 122.657 31.512V35C122.273 35.064 121.921 35.1173 121.601 35.16C121.302 35.2027 121.046 35.224 120.833 35.224C119.979 35.224 119.329 35.032 118.881 34.648C118.454 34.264 118.187 33.7947 118.081 33.24L117.985 32.376C117.259 33.3147 116.353 34.04 115.265 34.552C114.177 35.064 113.067 35.32 111.937 35.32C110.827 35.32 109.825 35.096 108.929 34.648C108.054 34.1787 107.361 33.5493 106.849 32.76C106.358 31.9493 106.113 31.0427 106.113 30.04ZM116.545 30.904C116.779 30.648 116.971 30.392 117.121 30.136C117.27 29.88 117.345 29.6453 117.345 29.432V27.736C116.833 27.5227 116.278 27.3627 115.681 27.256C115.083 27.128 114.518 27.064 113.985 27.064C112.875 27.064 111.958 27.3093 111.233 27.8C110.529 28.2693 110.177 28.8987 110.177 29.688C110.177 30.1147 110.294 30.52 110.529 30.904C110.763 31.288 111.105 31.5973 111.553 31.832C112.001 32.0667 112.534 32.184 113.153 32.184C113.793 32.184 114.422 32.0667 115.041 31.832C115.659 31.576 116.161 31.2667 116.545 30.904ZM135.624 21.944C134.322 21.944 133.16 22.2 132.135 22.712C131.112 23.2027 130.376 23.9173 129.928 24.856V35H125.64V18.232H129.576V21.816C130.173 20.664 130.93 19.7573 131.848 19.096C132.765 18.4347 133.736 18.072 134.76 18.008C134.994 18.008 135.176 18.008 135.304 18.008C135.432 18.008 135.538 18.0187 135.624 18.04V21.944ZM148.063 34.136C147.7 34.2853 147.263 34.456 146.751 34.648C146.239 34.84 145.684 34.9893 145.087 35.096C144.511 35.224 143.924 35.288 143.327 35.288C142.537 35.288 141.812 35.1493 141.151 34.872C140.489 34.5947 139.956 34.1573 139.551 33.56C139.167 32.9413 138.975 32.1413 138.975 31.16V21.528H136.767V18.232H138.975V12.792H143.263V18.232H146.783V21.528H143.263V29.72C143.284 30.296 143.444 30.712 143.743 30.968C144.041 31.224 144.415 31.352 144.863 31.352C145.311 31.352 145.748 31.2773 146.175 31.128C146.601 30.9787 146.943 30.8507 147.199 30.744L148.063 34.136ZM150.712 35V12.28H165.976V16.152H155.128V22.008H164.152V25.592H155.128V35H150.712ZM175.415 35.32C174.049 35.32 172.823 35.096 171.735 34.648C170.647 34.1787 169.719 33.5387 168.951 32.728C168.204 31.9173 167.628 30.9893 167.223 29.944C166.817 28.8987 166.615 27.8 166.615 26.648C166.615 25.4747 166.817 24.3653 167.223 23.32C167.628 22.2747 168.204 21.3467 168.951 20.536C169.719 19.7253 170.647 19.096 171.735 18.648C172.823 18.1787 174.049 17.944 175.415 17.944C176.78 17.944 177.996 18.1787 179.063 18.648C180.151 19.096 181.079 19.7253 181.847 20.536C182.615 21.3467 183.191 22.2747 183.575 23.32C183.98 24.3653 184.183 25.4747 184.183 26.648C184.183 27.8 183.98 28.8987 183.575 29.944C183.191 30.9893 182.615 31.9173 181.847 32.728C181.1 33.5387 180.183 34.1787 179.095 34.648C178.007 35.096 176.78 35.32 175.415 35.32ZM171.031 26.648C171.031 27.6293 171.223 28.504 171.607 29.272C171.991 30.0187 172.513 30.6053 173.175 31.032C173.836 31.4587 174.583 31.672 175.415 31.672C176.225 31.672 176.961 31.4587 177.623 31.032C178.284 30.584 178.807 29.9867 179.191 29.24C179.596 28.472 179.799 27.5973 179.799 26.616C179.799 25.656 179.596 24.792 179.191 24.024C178.807 23.256 178.284 22.6587 177.623 22.232C176.961 21.8053 176.225 21.592 175.415 21.592C174.583 21.592 173.836 21.816 173.175 22.264C172.513 22.6907 171.991 23.288 171.607 24.056C171.223 24.8027 171.031 25.6667 171.031 26.648ZM187.045 11.64H191.333V29.624C191.333 30.392 191.461 30.9147 191.717 31.192C191.973 31.448 192.325 31.576 192.773 31.576C193.114 31.576 193.466 31.5333 193.829 31.448C194.192 31.3627 194.512 31.256 194.789 31.128L195.365 34.392C194.789 34.6693 194.117 34.8827 193.349 35.032C192.581 35.1813 191.888 35.256 191.269 35.256C189.925 35.256 188.88 34.904 188.133 34.2C187.408 33.4747 187.045 32.4507 187.045 31.128V11.64ZM197.233 35V18.232H201.521V35H197.233ZM197.233 15.896V11.64H201.521V15.896H197.233ZM213.134 35.32C211.768 35.32 210.542 35.096 209.454 34.648C208.366 34.1787 207.438 33.5387 206.67 32.728C205.923 31.9173 205.347 30.9893 204.942 29.944C204.536 28.8987 204.334 27.8 204.334 26.648C204.334 25.4747 204.536 24.3653 204.942 23.32C205.347 22.2747 205.923 21.3467 206.67 20.536C207.438 19.7253 208.366 19.096 209.454 18.648C210.542 18.1787 211.768 17.944 213.134 17.944C214.499 17.944 215.715 18.1787 216.782 18.648C217.87 19.096 218.798 19.7253 219.566 20.536C220.334 21.3467 220.91 22.2747 221.294 23.32C221.699 24.3653 221.902 25.4747 221.902 26.648C221.902 27.8 221.699 28.8987 221.294 29.944C220.91 30.9893 220.334 31.9173 219.566 32.728C218.819 33.5387 217.902 34.1787 216.814 34.648C215.726 35.096 214.499 35.32 213.134 35.32ZM208.75 26.648C208.75 27.6293 208.942 28.504 209.326 29.272C209.71 30.0187 210.232 30.6053 210.894 31.032C211.555 31.4587 212.302 31.672 213.134 31.672C213.944 31.672 214.68 31.4587 215.342 31.032C216.003 30.584 216.526 29.9867 216.91 29.24C217.315 28.472 217.518 27.5973 217.518 26.616C217.518 25.656 217.315 24.792 216.91 24.024C216.526 23.256 216.003 22.6587 215.342 22.232C214.68 21.8053 213.944 21.592 213.134 21.592C212.302 21.592 211.555 21.816 210.894 22.264C210.232 22.6907 209.71 23.288 209.326 24.056C208.942 24.8027 208.75 25.6667 208.75 26.648Z" fill="white"/>
                    <circle cx="24" cy="24" r="24" fill="white"/>
                    <path d="M11.8459 11.5144L26.2133 15.0534L27.1088 11.4177L12.7415 7.87874C11.573 7.96862 10.8792 10.8388 11.8459 11.5144Z" fill="#FDA22A"/>
                    <path d="M11.8459 11.5144L26.2133 15.0534L27.1088 11.4177L12.7415 7.87874C11.573 7.96862 10.8792 10.8388 11.8459 11.5144Z" fill="url(#paint0_radial_203_2)" fill-opacity="0.2"/>
                    <path d="M12.145 19.1532L22.8605 21.7927L23.756 18.157L13.0405 15.5175C11.5734 15.7924 11.454 18.3054 12.145 19.1532Z" fill="#FDA22A"/>
                    <path d="M12.145 19.1532L22.8605 21.7927L23.756 18.157L13.0405 15.5175C11.5734 15.7924 11.454 18.3054 12.145 19.1532Z" fill="url(#paint1_radial_203_2)" fill-opacity="0.2"/>
                    <path d="M33.8031 16.3079C33.3735 16.1642 32.8695 16.0339 32.291 15.9173C31.7401 15.8062 31.0405 15.7223 30.192 15.6655C29.3711 15.6142 28.495 15.6233 27.5638 15.6926C26.6656 15.7401 25.8912 15.9554 25.2407 16.3385C24.5902 16.7216 24.1929 17.2701 24.049 17.9839C23.9106 18.6703 24.1991 19.3714 24.9147 20.0871C25.6634 20.7809 26.5829 21.4807 27.6732 22.1862C28.769 22.8644 29.8509 23.6111 30.9191 24.4266C32.0147 25.2475 32.8622 26.3042 33.4615 27.5965C34.0939 28.8669 34.2524 30.2846 33.9368 31.8495C33.3776 34.6226 31.5655 36.7143 28.5007 38.1249C25.4689 39.5136 21.9285 39.7997 17.8795 38.9832C15.8412 38.5721 14.3485 38.1568 13.4012 37.7372C13.2031 37.4401 13.3754 35.9463 13.918 33.2556C14.4661 30.5375 14.8506 28.915 15.0715 28.3881C15.204 28.1577 15.7469 27.9529 16.7003 27.7737C17.6537 27.5945 18.5435 27.5882 19.3698 27.7549C18.7165 30.9946 18.665 33.0271 19.2151 33.8524C19.4352 34.1825 19.9309 34.4253 20.7021 34.5808C22.4649 34.9363 24.0933 34.7504 25.5872 34.023C27.1086 33.3012 28.005 32.2677 28.2763 30.9224C28.459 30.0163 28.1926 29.134 27.4771 28.2754C26.7617 27.4169 25.834 26.6155 24.6942 25.8713C23.5875 25.1053 22.4835 24.3255 21.3823 23.532C20.2866 22.711 19.4115 21.7203 18.757 20.5597C18.1024 19.3991 17.9108 18.1461 18.1821 16.8008C18.5863 14.7965 20.1526 13.2124 22.8811 12.0483C25.6427 10.8623 29.3097 10.7303 33.882 11.6523C34.9562 11.8689 35.5484 12.0598 35.6584 12.2248C35.6693 12.3127 35.6416 12.5214 35.5752 12.8509C35.5143 13.1529 35.296 13.7375 34.9205 14.6047C34.545 15.4718 34.1725 16.0396 33.8031 16.3079Z" fill="#3042E2"/>
                    <path d="M33.8031 16.3079C33.3735 16.1642 32.8695 16.0339 32.291 15.9173C31.7401 15.8062 31.0405 15.7223 30.192 15.6655C29.3711 15.6142 28.495 15.6233 27.5638 15.6926C26.6656 15.7401 25.8912 15.9554 25.2407 16.3385C24.5902 16.7216 24.1929 17.2701 24.049 17.9839C23.9106 18.6703 24.1991 19.3714 24.9147 20.0871C25.6634 20.7809 26.5829 21.4807 27.6732 22.1862C28.769 22.8644 29.8509 23.6111 30.9191 24.4266C32.0147 25.2475 32.8622 26.3042 33.4615 27.5965C34.0939 28.8669 34.2524 30.2846 33.9368 31.8495C33.3776 34.6226 31.5655 36.7143 28.5007 38.1249C25.4689 39.5136 21.9285 39.7997 17.8795 38.9832C15.8412 38.5721 14.3485 38.1568 13.4012 37.7372C13.2031 37.4401 13.3754 35.9463 13.918 33.2556C14.4661 30.5375 14.8506 28.915 15.0715 28.3881C15.204 28.1577 15.7469 27.9529 16.7003 27.7737C17.6537 27.5945 18.5435 27.5882 19.3698 27.7549C18.7165 30.9946 18.665 33.0271 19.2151 33.8524C19.4352 34.1825 19.9309 34.4253 20.7021 34.5808C22.4649 34.9363 24.0933 34.7504 25.5872 34.023C27.1086 33.3012 28.005 32.2677 28.2763 30.9224C28.459 30.0163 28.1926 29.134 27.4771 28.2754C26.7617 27.4169 25.834 26.6155 24.6942 25.8713C23.5875 25.1053 22.4835 24.3255 21.3823 23.532C20.2866 22.711 19.4115 21.7203 18.757 20.5597C18.1024 19.3991 17.9108 18.1461 18.1821 16.8008C18.5863 14.7965 20.1526 13.2124 22.8811 12.0483C25.6427 10.8623 29.3097 10.7303 33.882 11.6523C34.9562 11.8689 35.5484 12.0598 35.6584 12.2248C35.6693 12.3127 35.6416 12.5214 35.5752 12.8509C35.5143 13.1529 35.296 13.7375 34.9205 14.6047C34.545 15.4718 34.1725 16.0396 33.8031 16.3079Z" fill="url(#paint2_radial_203_2)" fill-opacity="0.3"/>
                    <path d="M33.8031 16.3079C33.3735 16.1642 32.8695 16.0339 32.291 15.9173C31.7401 15.8062 31.0405 15.7223 30.192 15.6655C29.3711 15.6142 28.495 15.6233 27.5638 15.6926C26.6656 15.7401 25.8912 15.9554 25.2407 16.3385C24.5902 16.7216 24.1929 17.2701 24.049 17.9839C23.9106 18.6703 24.1991 19.3714 24.9147 20.0871C25.6634 20.7809 26.5829 21.4807 27.6732 22.1862C28.769 22.8644 29.8509 23.6111 30.9191 24.4266C32.0147 25.2475 32.8622 26.3042 33.4615 27.5965C34.0939 28.8669 34.2524 30.2846 33.9368 31.8495C33.3776 34.6226 31.5655 36.7143 28.5007 38.1249C25.4689 39.5136 21.9285 39.7997 17.8795 38.9832C15.8412 38.5721 14.3485 38.1568 13.4012 37.7372C13.2031 37.4401 13.3754 35.9463 13.918 33.2556C14.4661 30.5375 14.8506 28.915 15.0715 28.3881C15.204 28.1577 15.7469 27.9529 16.7003 27.7737C17.6537 27.5945 18.5435 27.5882 19.3698 27.7549C18.7165 30.9946 18.665 33.0271 19.2151 33.8524C19.4352 34.1825 19.9309 34.4253 20.7021 34.5808C22.4649 34.9363 24.0933 34.7504 25.5872 34.023C27.1086 33.3012 28.005 32.2677 28.2763 30.9224C28.459 30.0163 28.1926 29.134 27.4771 28.2754C26.7617 27.4169 25.834 26.6155 24.6942 25.8713C23.5875 25.1053 22.4835 24.3255 21.3823 23.532C20.2866 22.711 19.4115 21.7203 18.757 20.5597C18.1024 19.3991 17.9108 18.1461 18.1821 16.8008C18.5863 14.7965 20.1526 13.2124 22.8811 12.0483C25.6427 10.8623 29.3097 10.7303 33.882 11.6523C34.9562 11.8689 35.5484 12.0598 35.6584 12.2248C35.6693 12.3127 35.6416 12.5214 35.5752 12.8509C35.5143 13.1529 35.296 13.7375 34.9205 14.6047C34.545 15.4718 34.1725 16.0396 33.8031 16.3079Z" fill="url(#paint3_radial_203_2)" fill-opacity="0.3"/>
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M19.3698 27.7549C18.7165 30.9946 18.665 33.0271 19.2151 33.8524C19.4352 34.1825 19.9309 34.4253 20.7021 34.5808C22.4649 34.9363 24.0933 34.7504 25.5872 34.023C27.1086 33.3012 28.005 32.2677 28.2763 30.9224C28.459 30.0163 28.1926 29.134 27.4771 28.2754C26.7617 27.4169 25.834 26.6155 24.6942 25.8713C23.5875 25.1053 22.4835 24.3255 21.3823 23.532C20.2866 22.711 19.4115 21.7203 18.757 20.5597C18.1024 19.3991 17.9108 18.1461 18.1821 16.8008C18.5863 14.7965 20.1526 13.2124 22.8811 12.0483C25.6427 10.8623 29.3097 10.7303 33.882 11.6523C32.3475 12.0986 30.7834 12.3535 29.3036 12.5946C25.6509 13.1898 22.5117 13.7013 21.6 16.8008C20.8764 19.2607 24.2544 22.3317 27.1469 24.9612C29.051 26.6923 30.7447 28.2321 30.9191 29.2801C31.68 36.7201 22.32 37.4401 19.2151 36.9601C15.84 36.1207 17.52 30.9223 19.3698 27.7549Z" fill="#FDA22A"/>
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M19.3698 27.7549C18.7165 30.9946 18.665 33.0271 19.2151 33.8524C19.4352 34.1825 19.9309 34.4253 20.7021 34.5808C22.4649 34.9363 24.0933 34.7504 25.5872 34.023C27.1086 33.3012 28.005 32.2677 28.2763 30.9224C28.459 30.0163 28.1926 29.134 27.4771 28.2754C26.7617 27.4169 25.834 26.6155 24.6942 25.8713C23.5875 25.1053 22.4835 24.3255 21.3823 23.532C20.2866 22.711 19.4115 21.7203 18.757 20.5597C18.1024 19.3991 17.9108 18.1461 18.1821 16.8008C18.5863 14.7965 20.1526 13.2124 22.8811 12.0483C25.6427 10.8623 29.3097 10.7303 33.882 11.6523C32.3475 12.0986 30.7834 12.3535 29.3036 12.5946C25.6509 13.1898 22.5117 13.7013 21.6 16.8008C20.8764 19.2607 24.2544 22.3317 27.1469 24.9612C29.051 26.6923 30.7447 28.2321 30.9191 29.2801C31.68 36.7201 22.32 37.4401 19.2151 36.9601C15.84 36.1207 17.52 30.9223 19.3698 27.7549Z" fill="url(#paint4_radial_203_2)" fill-opacity="0.2"/>
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M19.3698 27.7549C18.7165 30.9946 18.665 33.0271 19.2151 33.8524C19.4352 34.1825 19.9309 34.4253 20.7021 34.5808C22.4649 34.9363 24.0933 34.7504 25.5872 34.023C27.1086 33.3012 28.005 32.2677 28.2763 30.9224C28.459 30.0163 28.1926 29.134 27.4771 28.2754C26.7617 27.4169 25.834 26.6155 24.6942 25.8713C23.5875 25.1053 22.4835 24.3255 21.3823 23.532C20.2866 22.711 19.4115 21.7203 18.757 20.5597C18.1024 19.3991 17.9108 18.1461 18.1821 16.8008C18.5863 14.7965 20.1526 13.2124 22.8811 12.0483C25.6427 10.8623 29.3097 10.7303 33.882 11.6523C32.3475 12.0986 30.7834 12.3535 29.3036 12.5946C25.6509 13.1898 22.5117 13.7013 21.6 16.8008C20.8764 19.2607 24.2544 22.3317 27.1469 24.9612C29.051 26.6923 30.7447 28.2321 30.9191 29.2801C31.68 36.7201 22.32 37.4401 19.2151 36.9601C15.84 36.1207 17.52 30.9223 19.3698 27.7549Z" fill="url(#paint5_radial_203_2)" fill-opacity="0.2"/>
                    <defs>
                        <radialGradient id="paint0_radial_203_2" cx="0" cy="0" r="1" gradientUnits="userSpaceOnUse" gradientTransform="translate(24.96 8.88017) rotate(152.354) scale(11.3791 3.31106)">
                            <stop stop-color="#FFF510"/>
                            <stop offset="1" stop-color="#FDA22A"/>
                        </radialGradient>
                        <radialGradient id="paint1_radial_203_2" cx="0" cy="0" r="1" gradientUnits="userSpaceOnUse" gradientTransform="translate(21.8401 14.3999) rotate(139.686) scale(10.3868 3.84314)">
                            <stop stop-color="#FFF510"/>
                            <stop offset="1" stop-color="#FDA22A"/>
                        </radialGradient>
                        <radialGradient id="paint2_radial_203_2" cx="0" cy="0" r="1" gradientUnits="userSpaceOnUse" gradientTransform="translate(34.56 14.8801) rotate(138.9) scale(14.9688 9.66733)">
                            <stop stop-color="white"/>
                            <stop offset="1" stop-color="white" stop-opacity="0"/>
                        </radialGradient>
                        <radialGradient id="paint3_radial_203_2" cx="0" cy="0" r="1" gradientUnits="userSpaceOnUse" gradientTransform="translate(16.08 29.0401) rotate(-30.9638) scale(8.39657 5.42279)">
                            <stop/>
                            <stop offset="1" stop-opacity="0"/>
                        </radialGradient>
                        <radialGradient id="paint4_radial_203_2" cx="0" cy="0" r="1" gradientUnits="userSpaceOnUse" gradientTransform="translate(25.92 34.8001) rotate(-104.036) scale(5.93727 3.83449)">
                            <stop stop-color="#FF4A10"/>
                            <stop offset="1" stop-color="#FDA22A"/>
                        </radialGradient>
                        <radialGradient id="paint5_radial_203_2" cx="0" cy="0" r="1" gradientUnits="userSpaceOnUse" gradientTransform="translate(29.28 8.16012) rotate(136.302) scale(14.938 9.64743)">
                            <stop stop-color="#FFF510"/>
                            <stop offset="1" stop-color="#FDA22A"/>
                        </radialGradient>
                    </defs>
                </svg>

            </a>

            <nav class="menu">

                <div class="menu__btn">
                    <span></span>
                </div>

                <ul class="menu__list">
                    <li class="menu__list-item">
                        <a class="menu__list-link" href="index.php">Главная</a>
                    </li>
                    <li class="menu__list-item">
                        <a class="menu__list-link" href="./example.php">Примеры</a>
                    </li>
                    <li class="menu__list-item">
                        <a class="menu__list-link link-main" href="create-choose.php">Создать резюме</a>
                    </li>
                    <li class="menu__list-item">
                        <a class="menu__list-link" href="./my.php">Мои резюме</a>
                    </li>
                </ul>

            </nav>

            <div class="user-nav">
                <?php
                if($in_btn) {
                    echo "<a class='user-nav__link' href='./config/logout.php'>Выйти</a>";
                } else {
                    echo "<a class='user-nav__link' href='./auth.php'>Войти</a>";
                }
                ?>
            </div>
        </div>
    </div>
</header>

  <section class="top">
    <div class="container">
      <div class="cv-title">
        <h2>Ваше резюме</h2>
      </div>
      <form class="cv-form" action="" method="post">
        <div class="personal-info">
          <fieldset>
            <legend class="personal-info__title">Личная информация <?php if($notEnough) echo "Заполните все поля!"?></legend>
            <div class="input-group">
              <label for="fname">Имя</label>
              <input class="input-field" placeholder="Никита" type="text" id="fname" name="fname">
            </div>

            <div class="input-group">
              <label for="lname">Фамилия</label>
              <input class="input-field" placeholder="Баранов" type="text" id="lname" name="lname">
            </div>

            <div class="input-group">
              <label for="mname">Отчество</label>
              <input class="input-field" placeholder="Владимирович" type="text" id="mname" name="mname">
            </div>

            <div class="input-group">
              <label for="city">Город проживания</label>
              <input class="input-field" placeholder="Ярославль" type="text" id="city" name="city">
            </div>


            <div class="input-group">
              <label for="bdate">Дата рождения</label>
              <input class="input-field" type="date" id="bdate" name="bdate">
            </div>


            <div class="input-group gender-group">
              <label for="">Пол</label>
              <div class="gender-select">
                <div>
                  <input type="radio" checked="checked" id="male" name="gender" value="male">
                  <label for="male">Мужской</label>
                </div>
                <div>
                  <input type="radio" id="female" name="gender" value="female">
                  <label for="female">Женский</label>
                </div>

              </div>
            </div>



            <div class="input-group photo-upload">
              <label for="myImage">Фото</label>
              <input class="photo-upload" type="file" name="img" accept="image/png, image/gif, image/jpeg" />
            </div>

          </fieldset>

        </div>

        <div class="contact-info">
          <fieldset>
            <legend class="personal-info__title">Контактная информация</legend>
            <div class="input-group">
              <label for="email">Почта</label>
              <input class="input-field" placeholder="nick@gmail.com" type="text" id="email" name="email">
            </div>

            <div class="input-group">
              <label for="phone">Телефон</label>
              <input class="input-field" placeholder="+7(999)555-33-33" type="text" id="phone" name="phone">
            </div>

            <div class="input-group">
              <label for="tgname">Ник в телеграмме</label>
              <input class="input-field" placeholder="@nick8ram" type="text" id="tgname" name="tgname">
            </div>
        </div>

        <div class="job-info">
          <fieldset>
            <legend class="personal-info__title">Информация о должности</legend>
            <div class="input-group">
              <label for="jname">Название должности</label>
              <input class="input-field" placeholder="UX/UI Дизайнер" type="text" id="jname" name="jname">
            </div>

            <!-- ЗП -->
            <div class="input-group">
              <label for="salary">Зарплата</label>
              <input class="input-field" placeholder="35 000" type="number" id="salary" name="salary">
              <p><select class="money-select">
                <option value="1">руб</option>
                <option value="2">тенге</option>
                <option value="3">доллары США</option>
              </select></p>
            </div>

            <!-- Ключевые навыки -->
            <div class="input-group">
              <label for="skills">Ключевые навыки</label>
              <input class="input-field" placeholder="Навык, например, «Прототипирование»" type="text" id="skills" name="skills">
            </div>

            <!-- Программы -->
            <div class="input-group">
              <label for="prog">Программы</label>
              <input class="input-field" placeholder="Программа, например, «Figma»" type="prog" id="prog" name="prog">
            </div>

            <div class="input-group gender-group exp-group">
              <label for="">Опыт работы</label>
              <div class="gender-select">
                <div>
                  <input type="radio" checked="checked" id="yesexp" name="exp" value="true">
                  <label for="yesexp">Есть опыт работы</label>
                </div>
                <div>
                  <input type="radio" id="noexp" name="exp" value="false">
                  <label for="noexp">Нет опыта работы</label>
                </div>

              </div>
            </div>
          </fieldset>

        </div>


        <!-- ОПЫТ РАБОТЫ -->
        <div class="exp-info">
          <fieldset>
            <legend class="personal-info__title">Опыт работы</legend>
            <!-- "добавить места работы" -->
            <div class="input-group">
              <label for="workplace">Места работы</label>
              <button type="button" id="workplace" name="workplace">Добавить место работы</button>
            </div>
            <!-- после добавть место работы  -->
            <div class="accordion-panel">
              <div class="input-group">
                <label for="workstart">Начало работы</label>
                <p><select class="workstart-select" name="start-month">
                  <option selected="selected" value="0">Месяц</option>
                  <option value="1">Январь</option>
                  <option value="2">Февраль</option>
                  <option value="3">Март</option>
                  <option value="4">Апрель</option>
                  <option value="5">Май</option>
                  <option value="6">Июнь</option>
                  <option value="7">Июль</option>
                  <option value="8">Август</option>
                  <option value="9">Сентябрь</option>
                  <option value="10">Октябрь</option>
                  <option value="11">Ноябрь</option>
                  <option value="12">Декабрь</option>
                </select></p>
                <input class="start-year" placeholder="Год" type="number">
              </div>
  
              <div class="input-group">
                <label for="workend">Окончание работы</label>
                <p><select class="workend-select" name="end-month">
                  <option selected="selected" value="0">Месяц</option>
                  <option value="1">Январь</option>
                  <option value="2">Февраль</option>
                  <option value="3">Март</option>
                  <option value="4">Апрель</option>
                  <option value="5">Май</option>
                  <option value="6">Июнь</option>
                  <option value="7">Июль</option>
                  <option value="8">Август</option>
                  <option value="9">Сентябрь</option>
                  <option value="10">Октябрь</option>
                  <option value="11">Ноябрь</option>
                  <option value="12">Декабрь</option>
                </select></p>
                <input class="end-year" placeholder="Год" type="number">
              </div>
  
              <div class="input-group">
                <label for="organization">Организация</label>
                <input class="input-field" type="organization" id="organization" name="company">
              </div>
  
              <div class="input-group">
                <label for="post">Должность</label>
                <input class="input-field" type="post" id="post" name="post">
              </div>
            </div>
            
        </div>

        <div class="about-info">
          <fieldset>
            <legend class="personal-info__title">Образование</legend>

            <div class="input-group">
              <label for="edulevel">уровень</label>
              <input class="input-field" type="edulevel" id="edulevel" name="edulevel">
            </div>

            <div class="input-group">
              <label for="university">Учебное заведение</label>
              <input class="input-field" type="text" id="university" name="university">
            </div>

            <div class="input-group">
              <label for="faculty">факультет</label>
              <input class="input-field" type="text" id="faculty" name="faculty">
            </div>

            <div class="input-group">
              <label for="spec">Специализация</label>
              <input class="input-field" type="text" id="spec" name="spec">
            </div>

            <div class="input-group">
              <label for="graduation">Год окончания</label>
              <div class="graduation-end">
                <input placeholder="Год" class="input-field" type="number" id="graduation" name="grad">
                <!-- <div class="graduation-parargraph">
                  <p>Если учитесь в настоящее время — укажите год предполагаемого окончания</p>
                </div> -->
              </div>
            </div>
        </div>

        <div class="about-info">
          <fieldset>
            <legend class="personal-info__title">Расскажите о себе</legend>

            <div class="input-group about-group">
              <label class="about-label" for="about">О себе </label>
              <input class="input-field" type="text" id="about" name="about">
            </div>

            <div class="input-group achieve-group">
              <label for="achieve">Достижения</label>
              <div class="achieve-fields">
                <input class="input-field" type="text" id="achieve" name="achieve">
                <input class="input-field" type="text" id="result" name="result">
              </div>
            </div>
            <div class="another-achievement">
              <a href="">добавить еще одно достижение</a>
            </div>
        </div>

        <div class="another-info">
          <div class="personal-info__title">
            <h2>Другая важная информация</h2>
          </div>
          <div>
            <a href=""></a>
            <a href=""></a>
            <a href=""></a>
            <a href=""></a>
            <a href=""></a>
            <a href=""></a>
            <a href=""></a>
            <a href=""></a>
            <a href=""></a>
            <a href=""></a>
          </div>
        </div>
<div class="submit-btn">
  <input name="submit" type="submit" value="Сохранить и перейти далее">
</div>
      </form>
    </div>

  </section>



</body>

</html>