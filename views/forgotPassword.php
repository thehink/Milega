<div class="content">
  <div class="modal-form form-wrapper">
    <form action="/forgot_password" method="POST">
      <input type="email" placeholder="<?=Localization::get('EMAIL')?>" name="email" value="<?=$data['email'] ?? ''?>"/>
      <?=Flight::getError('password.form.error.email')?>
      <div class="button-group">
        <button type="submit"><?=Localization::get('REQUEST_NEW_PASSWORD')?></button>
      </div>
      <?=Flight::getError('password.error')?>
      <?=Flight::getSuccess('password.success')?>
    </form>
  </div>
</div>