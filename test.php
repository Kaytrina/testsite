<html>
<head>
    <meta charset="UTF-8">
    <title>Ведомость</title>
</head>
<body>
<style type="text/css">
    table{
        border-collapse: collapse;
    }
    td{
        width: 20%;
        border: 1px solid black;
    }
</style>
<h1>Учёт кассиров</h1>
<table>
    <tr>
        <td>№ п/п</td>
        <td>Имя кассира</td>
        <td>Месячная выручка, млн.руб</td>
        <td>Премиальные, руб</td>
    </tr>       <!--Это шапка таблицы-->
    <?php
    $student = array('Валентина'=>0.92, 'Тамара'=>1.02, 'Александра'=>1.6, 'Антон'=>1.3, 'Мария'=>0.65);
    //$sum=0;
    foreach ($student as $key => $value)    // Переберем созданный ранее массив $student
    {
        $j++;
        //$sum+=$value;
        if ($value > 1.0)
        {
            $pr=($value-1.0)*5000;

        }
        else
        {
            $pr=0;
        }

        $table .= "<tr> 
                <td>{$j}</td> 
                <td>{$key}</td>
                <td>{$value}</td>
                <td>{$pr}</td>
                </tr>";
    }

    echo $table; //Вывод переменной, содержащей заполнение таблицы на страницу
    echo '</table>';


    /*$mean=$sum/count($student);
    echo 'Среднее значение составляет: ' . $mean; //точка объединяет символьные переменные*/
    ?>

    <a href="index.html">Практ.1</a>
</body>
</html>
