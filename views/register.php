<div class="content">
  <h2>Register</h2>
  <form action="/register" method="POST">
    <label>Email</label>
    <input type="email" name="email" value="<?=isset($data['email']) ? $data['email'] : ''?>"/>
    <label>First Name</label>
    <input type="text" name="first_name" value="<?=isset($data['first_name']) ? $data['first_name'] : ''?>"/>
    <label>Last Name</label>
    <input type="text" name="last_name" value="<?=isset($data['last_name']) ? $data['last_name'] : ''?>"/>
    <label>Password</label>
    <input type="password" name="password" value=""/>
    <label>Confirm Password</label>
    <input type="password" name="confirm_password" value=""/>
    <?=isset($errors) && isset($errors['confirm_password']) ? $errors['confirm_password'] : ''?>
    <input type="submit" value="Register" />

    <?=Flight::has('error') ? Flight::get('error') : ''?>
  </form>
</div>
