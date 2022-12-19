<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Успешная регистрация</title>

    <!-- Библиотеки Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js" integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="./css/auth.css" />
</head>

<body>

<!--Поиск-->
<div class="header p-3 mb-2 bg-light text-dark">
    <img src="./img/logo.png" alt="Caped logo" />
    Цветочный
    <div class="input-group">
        <input class="form-control me-2" type="search" placeholder="Поиск" aria-label="Поиск">
        <button class="btn btn-outline-success" type="submit">Поиск</button>
    </div>
</div>

<?php
$link=mysqli_connect('localhost', 'Flower', '123', 'flower');
$mail= filter_input(INPUT_GET, 'Mail', FILTER_VALIDATE_EMAIL);
$message= filter_input(INPUT_GET, 'message', FILTER_VALIDATE_INT);
require 'user.php';
$stmt= mysqli_prepare($link, 'SELECT id FROM custom WHERE Mail=(?)');
mysqli_stmt_bind_param($stmt, 's', $mail, $message);
mysqli_stmt_execute($stmt);
mysqli_stmt_bind_result($stmt, $id);
mysqli_stmt_fetch($stmt);

if($id){
    $stmt='';
    $stmt= mysqli_prepare($link, 'UPDATE custom SET check_email=1 WHERE id=(?)');
    mysqli_stmt_bind_param($stmt, 'd', $id);
    $var=mysqli_stmt_execute($stmt);
    exit("<h3>Поздравляем!!!</h3>
<p>Электронный адрес успешно подтвержден!</p>
<a href='show_user.php'>Перейти на свою страницу</a>
<footer>┬┴┬┴┤･ω･)ﾉ</footer>");
}
else {
    exit("<p>Нам очень жаль! Ошибка подтверждения адреса электронной почты.</p>
<a href='show_user.php'>Перейти на свою страницу</a>
<footer>(*_ _)人</footer>");
}
mysqli_close($link);
?>

</body>
</html>
