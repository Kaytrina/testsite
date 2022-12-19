<?php
$php_errors=array(1 => 'Превышен максимальный размер файла',
    2 => 'Превышен максимальный размер файла',
    3 => 'Была отправлена только часть файла',
    4 => 'Файл для отправки не был выбран');

//чтение
$Name= filter_input(INPUT_POST, 'Name', FILTER_VALIDATE_REGEXP, array('options'=> array('regexp'=>'/(^[А-ЯЁа-яё]{2,30})/u')));
$Tel= filter_input(INPUT_POST, 'Tel', FILTER_VALIDATE_REGEXP, array('options'=> array('regexp'=>'/(^[0-9]{11,11})/u')));
$Address= filter_input(INPUT_POST, 'Address', FILTER_VALIDATE_REGEXP, array('options'=> array('regexp'=>'/(^[А-ЯЁа-яё\d\s]{3,50})/u')));
$Password_hash= Password_hash($_POST['Password'], PASSWORD_DEFAULT);
$Img='Img';
//Проверка загрузки файла и является ли он изображением
($_FILES[$Img]['error']==0) or
handl_error("Сервер не может получить выбранное Вами изображение", $php_errors[$_FILES[$Img]['error']]);
@is_uploaded_file($_FILES[$Img]['tmp_name']) or
handl_error("Укажите путь к файлу", "Неопределен путь" . $_FILES[$Img]['tmp_name']);
$b=@getimagesize($_FILES[$Img]['tmp_name']) or
handl_error("Вы выбрали файл, не являющийся изображением", $_FILES[$Img]['tmp_name'] . "is not image");

//запись
$cn=mysqli_connect('localhost', 'Flower', '123', 'flower')
    or handl_error("Возникла ошибка при подключении к базе данных", mysqli_connect_error($cn));
mysqli_set_charset($cn, "utf8");

//Добавление пользователя при помощи подготовленного выражения
$stmt= mysqli_prepare($cn, 'INSERT INTO custom(Name, Tel, Mail, Address, Img, Password) VALUES((?), (?), (?), (?), (?), (?))');
mysqli_stmt_bind_param($stmt, 'sissss', $Name, $Tel, $Mail, $Address, $Img, $Password_hash);
$answ= mysqli_stmt_execute($stmt)
    or handl_error("Ошибка кода оказалась критической", error_get_last()['message']);
$num=strval(mysqli_insert_id($cn));

//Создание имени файла и перемещение в папку profile на сервере
$upload_filename='profile/avatar_' . $num . '_' . $_FILES[$Img]['name'];
//имя файла=avatar_ID_Имя загруженного файла
@move_uploaded_file($_FILES[$Img]['tmp_name'], $upload_filename) or
handl_error("Ошибка перемещения файла", "Ошибка доступа: " );
$qery="UPDATE custom set Img='{$upload_filename}' WHERE id={$num}";
$ans= mysqli_query($cn, $qery);

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
<a href='http://mysite5.rus/submit_user.php'>
    Подтвердить почту</a></p>
<footer>С уважением, администрация, DizzyDee (･ω<)☆</footer>
</body>
</html>";
$headers = "Content-type: text/html; charset=iso-8859-1\r\n";
$headers .= "From: Administrator <kaytrinabuk@gmail.com>\r\n";
$mail=mail($Mail, $subject, $message, $headers);

//перенаправление
mysqli_close($cn);
header('Location: show_user.php?id='. $num) or handl_error;

//ошибка
function handl_error($error_message, $system_error_message){
    header("Location: error.php?" . "error_message={$error_message}&" .
        "system_error_message={$system_error_message}");
    exit();}

?>
