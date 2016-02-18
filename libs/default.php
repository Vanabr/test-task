<?php

function wtf($array, $stop = false) {
	echo '<pre>'.print_r($array,1).'</pre>';
	if(!$stop) {
            exit();
	}
}

function q($query,$key=0) {

    $res = DB::_($key)->query($query);
    if ($res===false) {
        $error = debug_backtrace($res);
        $error_report = "Query <strong>".$query."</strong><br>\n".DB::_($key)->error.
             "<br> Error was made in <strong>".$error[0]['file']."</strong><br>\n
              On line <strong>".$error[0]['line'].
             "</strong><br>On <strong>".date('l jS \of F Y h:i:s A')."</strong>";
        echo $error_report; 
        file_put_contents('./logs/mysql.log', strip_tags($error_report)."\n\n",FILE_APPEND);
        exit();
    }else {
        return $res;
    }   
}

function trimALL($el) {
    if(!is_array($el)) {
        $el = trim($el);
    }else {
        $el = array_map('trimALL', $el);
    }
    return $el;
}

function intAll($el) {
    if(!is_array($el)) {
        $el = (int)$el;
    }else {
        $el = array_map('intAll', $el);
    }
    return $el;
}

function floatAll($el) {
    if(!is_array($el)) {
        $el = (float)$el;
    }else {
        $el = array_map('floatAll', $el);
    }
    return $el;
}

function hc($el) {
    if(!is_array($el)) {
        $el = htmlspecialchars($el);
    }else {
        $el = array_map('hc', $el);
    }
    return $el;
}

function ms($el,$key=0) {
    if(!is_array($el)) {
        $el = DB::_($key)->real_escape_string($el);
    }else {
        $el = array_map('ms', $el);
    }
    return $el;
}

function __autoload($class){
    include './libs/class_'.$class.'.php';
}

