<?php
Core::$META['title'] = 'Работа с глобальной переменной.';
$a= 'Важные данные.';


function sum() {
    global $a;
    $b = 4;
    $a = $b * 2;
    $res = $a + $b;
    return $res;
}
echo 'Переменная "а" до изменения: <strong>'.$a.'</strong><br>';
sum();
echo 'Переменная "а" после вызова функции с объявлением переменной "а" глобальной: <strong>'.$a.'</strong>';
