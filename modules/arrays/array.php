<?php
if(isset($_GET['keyboard'])) {
    Core::$META['title'] = 'Сравнение массивов, введенных с клавиатуры';
} elseif(isset($_GET['file'])) {
    Core::$META['title'] = 'Сравнение массивов из файлов';
}

if(isset($_POST['first'],$_POST['second'],$_POST['keyboard_compare'])) {
    $error = array();
    if(empty(trim($_POST['first']))) {
        $error['first'] = 'Заполните данные для первого массива.';
    }
    if(empty(trim($_POST['second']))) {
        $error['second'] = 'Заполните данные для второго массива.';
    }
    if(!$error) {
        $array1 = explode(',', $_POST['first']);
        $array2 = explode(',', $_POST['second']);
        $res1 = hc(implode(',',array_unique(array_diff($array2, $array1))));
        $res2 = hc(implode(',',array_unique(array_diff($array1, $array2))));

        $answer = 'a.  Массив ['.hc($_POST['first']).'] не содержит следующие элементы массива ['.hc($_POST['second']).']:'.
            '<strong>'.$res1.'</strong><br>'.
            'б.  Массив ['.hc($_POST['second']).'] не содержит следующие элементы массива ['.hc($_POST['first']).']:'.
            '<strong>'.$res2.'</strong><br>';
    }
}

if(isset($_POST['file_compare'])) {
    $error = array();
    if($_FILES['file1']['error'] != 0 || $_FILES['file2']['error'] != 0) {
        $error['upload'] = 'Произошла ошибка при загрузке файлов. Проверьте, что вы выбрали два файла.';
    }
    $preg_rule = '#\.txt$#ui';
    if(!preg_match($preg_rule,$_FILES['file1']['name']) || !preg_match($preg_rule,$_FILES['file2']['name'])) {
        $error['ext'] = 'Не подходит расширение файла. Допускаются только файлы с расширением .txt';
    }
    if($_FILES['file1']['size'] <= 0) {
        $error['size1'] = 'Первый файл пуст';
    } else if($_FILES['file2']['size'] <= 0) {
        $error['size2'] = 'Второй файл пуст';
    }

    if(!move_uploaded_file($_FILES['file1']['tmp_name'],'./data/tmp1.txt') ||
       !move_uploaded_file($_FILES['file2']['tmp_name'],'./data/tmp2.txt')) {
        $error['save'] = 'Произошла ошибка при сохранении файлов.';
    }

    if($error) {
        $answer = '';
        foreach($error as $v) {
            $answer.= $v.'<br>';
        }
    } else {
        $array1 = file('./data/tmp1.txt',FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        $array2 = file('./data/tmp2.txt',FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

        $res1 = hc(implode(',',array_unique(array_diff($array2, $array1))));
        $res2 = hc(implode(',',array_unique(array_diff($array1, $array2))));

        $answer = 'a.  Массив ['.hc(implode(',',$array1)).'] не содержит следующие элементы массива ['.hc(implode(',',$array2)).']: '.
            '<strong>'.$res1.'</strong><br><br>'.
            'б.  Массив ['.hc(implode(',',$array2)).'] не содержит следующие элементы массива ['.hc(implode(',',$array1)).']: '.
            '<strong>'.$res2.'</strong><br>';
        unlink('./data/tmp1.txt');
        unlink('./data/tmp2.txt');
    }
}