<?php
//подтверждение почты
$subject='Регистрация на сайте DizzyDee';
$message="<html>
<head>
 <title>Регистрация на сайте «DizzyDee»</title>
 <style type='text/css'>
 *{
background-color: #F0FFF0;
font-family: Century Gothic;
padding-left: 2%;
}
 </style>
</head>
<body>
<h1>Приветствую на сайте DizzyDee!</h1>
<p>Для того чтобы завершить процесс регистрации перейдите по ссылке:
<a href=''>
    Подтвердить почту</a></p>
<footer>С уважением, администрация, DizzyDee (･ω<)☆</footer>
</body>
</html>";
$headers = "Content-type: text/html; charset=iso-8859-1\r\n";
$headers .= "From: Administrator <kaytrinabuk@gmail.com>\r\n";
//$mail=mail($email, $subject, $message, $headers);
header("Location: *.php");
?>