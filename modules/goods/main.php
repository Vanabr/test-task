<?php
$goods = q("
    	 	SELECT *
    	 	FROM `goods`
    	 	ORDER BY `id` 
			ASC
		 ");
if(!$goods->num_rows){
    $_SESSION['info'] = 'Нет ни одного товара.';
    header("Location: /goods");        
    exit();
}

