<div class="content">
  <div class="modal-form form-wrapper">
    <?php if(!Flight::has('password.success')) : ?>
    <form action="" method="POST">
      <input type="password" placeholder="<?=Localization::get('PASSWORD')?>" name="password" value=""/>
      <?=Flight::getError('password.form.error.password')?>

      <input type="password" placeholder="<?=Localization::get('PASSWORD_CONFIRM')?>" name="password_confirm" value=""/>
      <?=Flight::getError('password.form.error.password_confirm')?>

      <div class="button-group">
        <button class="wide" type="submit"><?=Localization::get('RESET_PASSWORD')?></button>
      </div>
      <?=Flight::getError('password.error')?>
    </form>
  <?php endif; ?>
    <?=Flight::getSuccess('password.success')?>
  </div>
</div>
