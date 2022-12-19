<?php
//проверка повторения почты
$Mail=filter_input(INPUT_POST, 'Mail', FILTER_VALIDATE_EMAIL) or $err=true;

$link=mysqli_connect('localhost', 'Flower', '123', 'flower');

$mysqli_set_charset = mysqli_set_charset($link, "utf8")
or handl_error("Возникла ошибка при подключении к базе данных", mysqli_connect_error($link));

$stmt= mysqli_prepare($link, 'SELECT id FROM custom WHERE Mail=(?)');
mysqli_stmt_bind_param($stmt, 's', $Mail);
$answ= mysqli_stmt_execute($stmt);
mysqli_stmt_bind_result($stmt, $id);
mysqli_stmt_fetch($stmt);
if ($id) {
    $result='false';
}
else {
    $result='true';
}
echo $result;
?>
