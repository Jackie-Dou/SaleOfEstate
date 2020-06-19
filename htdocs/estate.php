<?php
require_once 'vendor/autoload.php';
$loader = new \Twig\Loader\FilesystemLoader('templates');
$twig = new \Twig\Environment($loader);

$num_catalog = $_GET['est'];
$num_catalog++;

$db_name = 'vampires';
$dsn = "mysql:host=localhost;dbname=$db_name;charset=utf8";

$opt = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

$dbh = new PDO($dsn, 'root', '', $opt);

$database = $dbh->prepare('SELECT * FROM catalogs WHERE num_catalog = :param');
$database->execute(array('param' => $num_catalog));

$template = $twig->load('estate.html');
echo $twig->render('estate.html', ['estdata'=>$database]);