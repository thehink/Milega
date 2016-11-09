<div class="content">
  <h2>Login</h2>
  <form action="/login" method="POST">
    <label>Email</label>
    <input type="email" name="email" value="<?=isset($data['email']) ? $data['email'] : ''?>"/>
    <?=Flight::get('login.form.error.email')?>

    <label>Password</label>
    <input type="password" name="password" value=""/>
    <?=Flight::get('login.form.error.password')?>

    <label for="remember_me">Remember me</label>
    <input id="remember_me" type="checkbox" name="remember_me"/>

    <button type="submit">Login</button>
    <?=Flight::get('login.error')?>
  </form>
</div>
