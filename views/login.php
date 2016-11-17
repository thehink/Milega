<div class="content">
  <div class="modal-form form-wrapper">
    <form action="/login" method="POST">
      <input type="email" placeholder="<?=Localization::get('EMAIL')?>" name="email" value="<?=$data['email'] ?? ''?>"/>
      <?=Flight::getError('login.form.error.email')?>

      <input type="password" placeholder="<?=Localization::get('PASSWORD')?>" name="password" value=""/>
      <?=Flight::getError('login.form.error.password')?>

<!--
      <label for="remember_me"><?=Localization::get('REMEMBER_ME')?></label>
      <input id="remember_me" type="checkbox" name="remember_me"/>

    -->
      <div class="button-group">
        <button type="submit"><?=Localization::get('LOGIN')?></button>
        <button type="button" onclick="window.location='/forgot_password'"><?=Localization::get('FORGOT_PASSWORD')?></button>
      </div>
      <?=Flight::getError('login.error')?>
    </form>
  </div>
</div>
