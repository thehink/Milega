<div class="content">
  <h2>Login</h2>
  <div class="modal-form form-wrapper">
    <form action="/login" method="POST">
      <input type="email" placeholder="Email" name="email" value="<?=isset($data['email']) ? $data['email'] : ''?>"/>
      <span class="error"><?=Flight::get('login.form.error.email')?></span>

      <input type="password" placeholder="Password" name="password" value=""/>
      <span class="error"><?=Flight::get('login.form.error.password')?></span>

      <label for="remember_me">Remember me</label>
      <input id="remember_me" type="checkbox" name="remember_me"/>

      <button type="submit">Login</button>
      <?=Flight::get('login.error')?>
    </form>
  </div>
</div>
