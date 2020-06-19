<?php

//таблица - main_page
//поле - уникальный ключ - num
//поле - myimg

//по умолчанию будет
$opt = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

$dbh = new PDO('mysql:host=localhost;dbname=vampires;charset=utf8', 'root', '', $opt);

//удобное обращение к полям. хорошо возвращать одно поле у всех
//$stmt = $dbh->query('SELECT * FROM main_page');
//while ($row = $stmt->fetch())
//{
//    echo $row['myimg'] . "<br>";
//    echo $row['num'] . "<br>";
//}

//поиск всех с таким значением поля (плейсхолдер - только числа и строки!)
//$stmt = $dbh->prepare('SELECT * FROM main_page WHERE myimg = :img');
//$stmt->execute(array('img' => 'assets/images/4_1.jpg'));
//foreach ($stmt as $row)
//{
//    echo $row['num'] . "\n";
//}

//возвращает массив, в котором вся таблица, оч подходит
//$sth = $dbh->prepare("SELECT * FROM `main_page`");
//$sth->execute();
//$database = $sth->fetchAll();
//print_r ($database);
//foreach ($database as $val)
//{
//    echo $val['num'] ." _ ".$val['myimg']. "<br>" ;
//}

//получили массив с значениями конкретного поля
//$database = $dbh->query('SELECT myimg FROM main_page')->fetchAll(PDO::FETCH_COLUMN);
//print_r ($database);

//когда дохрена полей, удобно по значению уникального ключа (первый параметр) дёшево и сердито надёргать значения другого поля соответствующей строки
//$database = $dbh->query('SELECT num, myimg FROM main_page')->fetchAll(PDO::FETCH_KEY_PAIR);
//print_r ($database);