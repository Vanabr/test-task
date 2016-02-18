<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title><?php echo hc(Core::$META['title']); ?></title>
  <meta http-equiv="keywords" content="<?php echo hc(Core::$META['keywords']); ?>">
  <meta http-equiv="description" content="<?php echo hc(Core::$META['description']); ?>">
  <link rel="stylesheet" type="text/css" href="/skins/default/css/style.css">
  <?php

  if(count(CORE::$CSS)){ echo implode("\n",CORE::$CSS);}
  if(count(CORE::$JS)){ echo implode("\n",CORE::$JS);}
  ?>
</head>
<body>
  <div class="main">
    <div class="header">
	  <a href ="/global">Переменные</a>
	  <a href="/files">Задание по файлам</a>
	  <a href="/todo">Список дел</a>
	  <a href="/arrays">Массивы</a>
	</div>
    <div class="content">
	  <?php echo $content; ?>
    </div>
  </div>
</body>
</html>