<?php
if(count($reqFiles)) { ?>
  <h2>В папке data найдены следующие файлы:</h2>
<?php
  foreach($reqFiles as $v) {
      echo $v.'<br>';
  }
} else { ?>
    <h2>В папке data не найдено ни одного файла, удовлетворяющего результатам поиска.</h2>
<?php
}
