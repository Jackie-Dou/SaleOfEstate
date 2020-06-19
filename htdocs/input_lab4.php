<?php
require_once 'vendor/autoload.php';
$loader = new \Twig\Loader\FilesystemLoader('templates');
$twig = new \Twig\Environment($loader);

if(isset($_POST['msg'])) {
    $text = htmlentities($_POST['msg']);
    $regexp='/ ?\(?\+?\(?[\d]+ ?\(?(-? ?[\d]*)+ ?\)? ?(-? ?[\d]+)+/';
    $regexp1='/\+ ?[\d]+ ?-/';
    $text = preg_replace_callback(
        $regexp,
        function ($matches) {
            return '<span style="color: red">' .$matches[0]. '</span>';
        },
        $text
    );
    $text = preg_replace_callback(
        $regexp1,
        function ($matches) {
            return '<span style> <u>' .$matches[0]. '</u> </span>';
            },
        $text
    );
    $template = $twig->load('lab4.html', ['mytxt'=>$text]);
}
else
    $text = "Что-то пошло не так, золотце";

$template = $twig->load('lab4.html');
echo $twig->render('lab4.html');

echo $text;