<h2>Hide Post Contet Form</h2>
<form name="form" method="POST" action="<?php echo str_replace('%7E', '~', $_SERVER['REQUEST_URI']);?>">
  本文を非表示にしたい場合はチェックして、保存ボタンを押して下さい。
  <table class="form-table">
    <tr>
      <th valign="top">本文フォーム表示</th>
      <td>
        <input type="checkbox" name="blogs" value="1" <?php if($this->is_hide()){ echo 'checked=checked'; } ?> />非表示<br />
      </td>
    </tr>
  </table>
  <p class="submit">
  <input type="submit" name="Submit" value="設定を保存" class="button-primary" />
<?php echo $message ?>
  </p>
</form>
