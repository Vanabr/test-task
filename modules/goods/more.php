<?php
if(isset($_GET['id'])) {
	$goods = q("
    	 	SELECT *
    	 	FROM `goods`
    	 	WHERE
			`id` = ".(int)$_GET['id']."
			LIMIT 1
		    ");
if(!$goods->num_rows){
    $_SESSION['info'] = 'Такого товара не существует.';
    header("Location: /goods");        
    exit();
}

}

$row = $goods->fetch_assoc();
$goods->close();