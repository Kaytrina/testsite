<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>404</title>

    <!-- Библиотеки Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js" integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="./css/auth.css" />
    <link rel="stylesheet" href="./css/cust.css" />
</head>
<body>

<!--Поиск-->
<div class="header p-3 mb-2 bg-light text-dark">
    <img src="./img/logo.png" alt="Caped logo" />
    Цветочный
</div>

<h4 class="p-2 m-2">Какой кошмар!</h4>

<table><tr>
        <td class="p-4"><img src="./img/chok.jpg" class="img-fluid rounded"></td>
        <td class="m-2">Уважаемый, Пользователь!<br>
            Наша система не смогла обработать Ваше последнее действие. Мы уже в курсе проблемы и предпримем все возможные действия, чтобы Вас не огорчать.<br>
            С уважением, группа поддержки ☆⌒(≧▽° ) <br>
            Если хотите вернуться назад, то можете <a href="javascript:history.go(-1)">щелкнуть здесь ❤</a><br>
    </tr></table>


<div class="p-4 m-3">
        <?php
        if (isset($_GET['error_message'])){
            $error_message=preg_replace("/\\\\/", '', $_GET['error_message']);}
        else {
            $error_message="Вы здесь оказались из-за сбоя в программе (｡•́︿•̀｡)";}

        if (isset($_GET['system_error_message'])){
            $system_error_message=preg_replace("/\\\\/", '', $_GET['system_error_message']);}
        else {$system_error_message="Сообщения о системных ошибках отсутствуют";}
        echo ("<p>" . $error_message . "</p>");
        echo("<p>Было получено сообщение системного характера:</p>
         <b>{$system_error_message}</b>");
        ?>
</div>

<footer>
    <nav class="navbar sticky-bottom bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Я внизу</a><a href="index.html">На главную</a>
        </div>
    </nav>
</footer>

</body>
</html>
