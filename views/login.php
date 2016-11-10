<div class="content">
  <h2>Login</h2>
  <div class="modal-form form-wrapper">
    <form action="/login" method="POST">
      <input type="email" placeholder="Email" name="email" value="<?=$data['email'] ?? ''?>"/>
      <?=Flight::getError('login.form.error.email')?>

      <input type="password" placeholder="Password" name="password" value=""/>
      <?=Flight::getError('login.form.error.password')?>

      <label for="remember_me">Remember me</label>
      <input id="remember_me" type="checkbox" name="remember_me"/>

      <button type="submit">Login</button>
      <?=Flight::getError('login.error')?>
    </form>
  </div>
</div>
