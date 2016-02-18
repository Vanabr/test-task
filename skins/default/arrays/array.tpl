
<?php
if(isset($_GET['keyboard'])) { ?>
    <h3>Введите элементы массивов через запятую.</h3>
    <form action="" method="post">
      <table>
        <tr>
          <td>
              <textarea  rows="7" cols="40" name="first"  placeholder="Введите первый массив"></textarea>
          </td>
          <td>
              <?php echo @$error['first']; ?>
          </td>
        </tr>
        <tr>
          <td>
            <textarea  rows="7" cols="40" name="second"  placeholder="Введите второй массив"></textarea>
          </td>
          <td>
            <?php echo @$error['second']; ?>
          </td>
        </tr>
      </table>
      <input type="submit" name="keyboard_compare" value="Сравнить">
    </form>
<?php
}
if(isset($_GET['file'])) { ?>
    <h3>Выберите файлы для массивов.</h3>
    <p>Каждый элемент массива должен начинаться с новой строки, допускаются файлы с расширением .txt</p>
    <form action="" method="post" enctype="multipart/form-data">
      <input type="file" name="file1">
      <input type="file" name="file2"><br><br>
      <input type="submit" name="file_compare" value="Сравнить">
    </form>
<?php
}

if(isset($answer)) {
    echo $answer;
}