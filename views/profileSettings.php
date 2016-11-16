<div class="content">
  <div class="modal-form form-wrapper">
    <form action="/profile/settings" method="POST">
      <label><?=Localization::get('NOTIFICATIONS_METHOD')?></label>
      <input type="text" placeholder="<?=Localization::get('PHONE_NUMBER')?>" name="phone" value="<?=$data['email'] ?? ''?>"/>
      <?=Flight::getError('settings.form.error.phone')?>

      <input type="text" placeholder="<?=Localization::get('EMAIL')?>" name="email" value=""/>
      <?=Flight::getError('settings.form.error.email')?>

      <select class="select" name="frequency">
          <option selected><?=Localization::get('HOW_OFTEN')?></option>
          <option value="week"><?=Localization::get('ONE_TIME_A_WEEK')?></option>
          <option value="month"><?=Localization::get('ONE_TIME_A_MONTH')?></option>
          <option value="quarter"><?=Localization::get('ONE_TIME_A_QUARTER')?></option>
          <option value="year"><?=Localization::get('ONE_TIME_A_YEAR')?></option>
      </select>

      <div class="button-group">
        <button type="submit"><?=Localization::get('UPDATE')?></button>
      </div>
      <?=Flight::getError('settings.error')?>
      <?=Flight::getSuccess('settings.success')?>
    </form>
  </div>
</div>
