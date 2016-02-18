<?php
Core::$JS[] = '<script src="/skins/default/js/todo.js"></script>';
Core::$META['title'] = 'Добавление дела';

if(isset($_POST['name'],$_POST['description'],$_POST['submit'])) {
    $error = array();
    if(empty($_POST['name'])) {
        $error['name'] = 'Укажите название дела';
    }
    if(empty($_POST['description'])) {
        $error['description'] = 'Опишите, что хотите сделать';
    }

    if(!$error) {
        q("
            INSERT INTO `info`
            SET
            `name` ='".ms($_POST['name'])."',
            `description` ='".ms($_POST['description'])."'
        ");
        header("Location: /todo");
        exit();
    }
}