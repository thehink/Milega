<div class="content">
  <div class="modal-form form-wrapper">
    <h2><?=Localization::get('LOGIN')?></h2>
    <form action="/login" method="POST">
      <input type="email" placeholder="<?=Localization::get('EMAIL')?>" name="email" value="<?=$data['email'] ?? ''?>"/>
      <?=Flight::getError('login.form.error.email')?>

      <input type="password" placeholder="<?=Localization::get('PASSWORD')?>" name="password" value=""/>
      <?=Flight::getError('login.form.error.password')?>

      <label for="remember_me"><?=Localization::get('REMEMBER_ME')?></label>
      <input id="remember_me" type="checkbox" name="remember_me"/>

      <button type="submit"><?=Localization::get('LOGIN')?></button>
      <?=Flight::getError('login.error')?>
    </form>
    <a href="/forgot_password"><?=Localization::get('FORGOT_PASSWORD')?></a>
  </div>
</div>
