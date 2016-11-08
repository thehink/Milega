<div class="content">
  <h2>Login</h2>
  <form action="/login" method="POST">
    <label>Email</label>
    <input type="email" name="email" value="<?=isset($data['email']) ? $data['email'] : ''?>"/>
    <?=Flight::get('login.form.error.email')?>

    <label>Password</label>
    <input type="password" name="password" value=""/>
    <?=Flight::get('login.form.error.password')?>

    <input type="submit" value="Login" />
    <?=Flight::get('login.error')?>
  </form>
</div>
