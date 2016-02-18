<?php
Core::$META['title'] = 'Задание по файлам.';

$dir = './data';
$reqFiles = array();
$pattern = '#^[A-Za-z0-9]+\.frt$#ui';

function mySort($first, $second) {
    $first  = filectime('./data/'.$first);
    $second = filectime('./data/'.$second);
    if($first == $second) {
        return 0;
    }
    return ($first < $second) ? -1 : 1;
}

$file = scandir($dir);
foreach($file as $v) {
    if(preg_match($pattern, $v)) {
        $reqFiles[] = $v;
    }
}

if(count($reqFiles)) {
    usort($reqFiles,"mySort");
    foreach($reqFiles as $k => $v) {
        $length = explode('.',$v);
        if(mb_strlen($length[0]) > 6) {
            $reqFiles[$k] = substr($v, 0, 6) . '*.frt';
        }
    }
}