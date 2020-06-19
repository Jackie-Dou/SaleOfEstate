<?php
require_once 'vendor/autoload.php';
$loader = new \Twig\Loader\FilesystemLoader('templates');
$twig = new \Twig\Environment($loader);


$db_name = 'vampires';
$dsn = "mysql:host=localhost;dbname=$db_name;charset=utf8";

$opt = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

$dbh = new PDO($dsn, 'root', '', $opt);

$sth = $dbh->prepare("SELECT * FROM `lot_page`");
$sth->execute();
$mydata = $sth->fetchAll();

$num = $_GET['num'];

$finaldata = $mydata[$num];
$template = $twig->load('lot_page.html');
echo $twig->render('lot_page.html', ['mydata'=>$finaldata]);