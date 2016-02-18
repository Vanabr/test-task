<h2>Редактирование</h2>
<form action="" method="post">
  <table>
    <tr>
      <td>
        <input type="text" name="name" placeholder="Название" id="list_add_input" value="<?php
        echo (isset($_POST['name']) ? hc($_POST['name']) : hc($row['name'])); ?>">
      </td>
      <td id="list_add_name_error"><?php echo @$error['name']; ?></td>
    </tr>
    <tr>
      <td>
        <textarea  rows="7" cols="40" name="description" class="list_add_description" placeholder="Опишите дело" id="list_add_text"><?php echo (isset($_POST['description']) ? hc($_POST['description']) : hc($row['description'])); ?></textarea>
      </td>
      <td id="list_add_desc_error"><?php echo @$error['description']; ?></td>
    </tr>
  </table>
  <input type="submit" name="submit" value="Сохранить" class="list_add" id="list_add_submit">
</form>