<h2>Добавьте себе дел</h2>
<form action="/todo/add" method="post">
  <table>
    <tr>
      <td>
        <input type="text" name="name" placeholder="Название" id="list_add_input">
      </td>
      <td id="list_add_name_error"><?php echo @$error['name']; ?></td>
    </tr>
    <tr>
      <td>
        <textarea  rows="7" cols="40" name="description" class="list_add_description" placeholder="Опишите дело" id="list_add_text"></textarea>
      </td>
      <td id="list_add_desc_error"><?php echo @$error['description']; ?></td>
    </tr>
  </table>
  <input type="submit" name="submit" value="Добавить" class="list_add" id="list_add_submit" onclick="return checkListAdd();">
</form>