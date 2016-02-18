<?php
//ЧПУ
if(isset($_GET['route'])){
    $temp = explode('/',$_GET['route']);

    $i = 0;
    foreach($temp as $k => $v){
        if ($i == 0) {
            $_GET['module'] = $v;
        } elseif($i == 1) {
            if(!empty($v)){
                $_GET['page'] = $v;
            }    
        } else {
            $_GET['key'.($k-1)] = $v;
        }
		++$i;
    }
    unset($_GET['route']);
}

$allowed = array('global','files','todo','arrays','errors');
if(!isset($_GET['module'])) {
    $_GET['module'] = 'static';
} elseif(!in_array($_GET['module'],$allowed)) {
    header("Location: /errors/404");
    exit();
}

if(!isset($_GET['page'])) {
	$_GET['page'] = 'main';
}



