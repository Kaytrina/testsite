<!DOCTYPE html>
<html lang="en">

<?php
$id=$_GET['id'];
$select_query='SELECT * FROM custom WHERE id=' . $id;//* означает выбрать все
$cn=mysqli_connect('localhost', 'Flower', '123', 'flower');
mysqli_set_charset($cn, "utf8");
$result=mysqli_query($cn, $select_query);
if ($result){
$row=mysqli_fetch_array($result);
$Img=$row['Img'];
$Name=$row['Name'];
$Tel=$row['Tel'];
$Mail=$row['Mail'];
$Address=$row['Address']; }
?>

<head>
    <meta charset="UTF-8">
    <title>Пользователи</title>

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
    <img src="./img/logo.png" alt="Caped logo"/>
    Цветочный
    <div class="input-group">
        <input class="form-control me-2" type="search" placeholder="Поиск" aria-label="Поиск">
        <button class="btn btn-outline-success" type="submit">Поиск</button>
    </div>
</div>

<center><h3 class="p-3">Спасибо за регистрацию!</h3></center>

<!--Выводимые данные-->
<center><img width="130" height="130"  src="<? echo $Img?>" class="rounded-circle mb-2"/></center>
<table class='New table'>
    <tr><th>Имя</th><td><? echo $Name?></td></tr>
    <tr><th>Телефон</th><td><? echo $Tel?></td></tr>
    <tr><th>Телефон</th><td><? echo $Mail?></td></tr>
    <tr><th>Адрес</th><td><? echo $Address?></td></tr>
</table>


<footer>
    <nav class="navbar sticky-bottom bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Я внизу</a><a href="index.html">Назад</a>
        </div>
    </nav>
</footer>

</body>

</html>
