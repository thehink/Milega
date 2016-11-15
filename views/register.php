<div class="content">
  <div class="modal-form form-wrapper">
    <form action="/register" method="POST">
      <input placeholder="Email" type="email" name="email" value="<?=isset($data['email']) ? $data['email'] : ''?>"/>
      <?=Flight::getError('register.form.error.email')?>

      <input placeholder="First Name" type="text" name="first_name" value="<?=isset($data['first_name']) ? $data['first_name'] : ''?>"/>
      <?=Flight::getError('register.form.error.first_name')?>

      <input placeholder="Last Name" type="text" name="last_name" value="<?=isset($data['last_name']) ? $data['last_name'] : ''?>"/>
      <?=Flight::getError('register.form.error.last_name')?>

      <input placeholder="Password" type="password" name="password" value=""/>
      <?=Flight::getError('register.form.error.password')?>

      <button type="submit">Register</button>
      <?=Flight::getError('register.error')?>
    </form>
  </div>
</div>
