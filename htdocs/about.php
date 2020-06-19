<?php
require_once 'vendor/autoload.php';
$loader = new \Twig\Loader\FilesystemLoader('templates');
$twig = new \Twig\Environment($loader);

$value = $_GET['val'];

$db_name = 'vampires';
$dsn = "mysql:host=localhost;dbname=$db_name;charset=utf8";

$opt = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

$dbh = new PDO($dsn, 'root', '', $opt);

$database = $dbh->prepare('SELECT * FROM about WHERE val = :param');
$database->execute(array('param' => $value));

$template = $twig->load('about.html');
if ($value == 0)
    echo $twig->render('about.html', ['contdata'=>$database, 'num_page'=>0]);
else
    echo $twig->render('about.html', ['contdata'=>$database, 'num_page'=>1]);