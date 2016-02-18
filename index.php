<?php
error_reporting(-1);
ini_set('display_errors',1);
header('Content-Type: text/html; charset=utf-8');
session_start();

// Конфиг сайта
include_once './config.php';
include_once './libs/default.php';
include_once './variables.php';

// Роутер
if(file_exists('./'.Core::$CONT.'/'.$_GET['module'].'/'.$_GET['page'].'.php') &&
file_exists('./skins/'.Core::$SKIN.'/'.$_GET['module'].'/'.$_GET['page'].'.tpl')) {
    ob_start();
    include './'.Core::$CONT.'/'.$_GET['module'].'/'.$_GET['page'].'.php';
    include './skins/'.Core::$SKIN.'/'.$_GET['module'].'/'.$_GET['page'].'.tpl';
    $content = ob_get_contents();
    ob_end_clean();
} else {
    header("Location: /errors/404");
    exit();
}


include './skins/'.Core::$SKIN.'/index.tpl';


