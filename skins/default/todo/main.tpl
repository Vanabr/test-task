<h1>Список дел</h1>
<?php
if(isset($_SESSION['info'])) {
    echo '<h3>'.hc($_SESSION['info']).'</h3>';
    unset($_SESSION['info']);
}
?>
<div class="list">
</div>
<a href="/todo/add" class="list_add">Добавить</a>
