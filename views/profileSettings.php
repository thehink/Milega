<div class="content">
  <div class="modal-form form-wrapper">
    <form action="/profile/settings" method="POST">
      <label><?=Localization::get('NOTIFICATIONS_METHOD')?></label>

      <select class="select" name="method">
          <option value="email" <?=$user->notificationMethod === 'email' ? 'selected' : ''?>><?=Localization::get('EMAIL')?></option>
          <option value="sms" <?=$user->notificationMethod === 'sms' ? 'selected' : ''?>><?=Localization::get('SMS')?></option>
      </select>
      <?=Flight::getError('settings.form.error.method')?>

      <label><?=Localization::get('HOW_OFTEN')?></label>
      <select class="select" name="frequency">
          <option value="week" <?=$user->notificationFrequency === 'week' ? 'selected' : ''?>><?=Localization::get('ONE_TIME_A_WEEK')?></option>
          <option value="month" <?=$user->notificationFrequency === 'month' ? 'selected' : ''?>><?=Localization::get('ONE_TIME_A_MONTH')?></option>
          <option value="quarter" <?=$user->notificationFrequency === 'quarter' ? 'selected' : ''?>><?=Localization::get('ONE_TIME_A_QUARTER')?></option>
          <option value="year" <?=$user->notificationFrequency === 'year' ? 'selected' : ''?>><?=Localization::get('ONE_TIME_A_YEAR')?></option>
      </select>
      <?=Flight::getError('settings.form.error.frequency')?>

      <div class="button-group">
        <button type="submit"><?=Localization::get('SAVE')?></button>
      </div>
      <?=Flight::getError('settings.error')?>
      <?=Flight::getSuccess('settings.success')?>
    </form>
  </div>
</div>
