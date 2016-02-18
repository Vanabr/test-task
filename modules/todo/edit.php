<?php
Core::$META['title'] = 'Редактирование дела';

if(isset($_GET['id'])) {

    $query = q("
        SELECT *
        FROM `info`
        WHERE `id` = ".(int)$_GET['id']."
        LIMIT 1
    ");

    if(!$query->num_rows) {
        $_SESSION['info'] = 'Запись не найдена';
        header("Location: /todo");
        exit();
    }
    $row = $query->fetch_assoc();
    $query->close();

    if(isset($_GET['action']) && $_GET['action'] == 'delete') {
        q("
            DELETE
            FROM `info`
            WHERE `id` = ".(int)$_GET['id']."
        ");
        $_SESSION['info'] = 'Запись '.hc($row['name']).' была удалена.';
        header("Location: /todo");
        exit();
    }

}

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
            UPDATE `info`
            SET
            `name`         ='".ms($_POST['name'])."',
            `description`  ='".ms($_POST['description'])."'
            WHERE `id`     = ".(int)$_GET['id']."
        ");
        $_SESSION['info'] = 'Запись '.hc($_POST['name']).' изменена.';
        header("Location: /todo");
        exit();
    }
}