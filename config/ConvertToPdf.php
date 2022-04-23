<?php
//$html = file_get_contents("./index.php");
$pdf = exec('C:\xampp\htdocs\tula\wkhtmltopdf\bin\wkhtmltopdf.exe  -O landscape "https://localhost/tula/index.php" "C:\xampp\htdocs\tula\pdf\test.pdf"');
//$pdf = exec("C:\xampp\htdocs\tula\wkhtmltopdf\bin\wkhtmltopdf.exe  -O landscape $html 'C:\xampp\htdocs\tula\pdf\test.pdf'");