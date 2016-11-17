<?php

/**
 *
 */
class ProfileSettings
{

  public static function render($postData = []){
    Flight::display( 'profileSettings', [
      'title' => 'PROFILE',
      'page' => 'profile',
      'user' => Flight::get('user'),
      'subHeader' => [
        'JIT_TEST' => [
          'url' => '/profile',
          'selected' => false
        ],
        'LEADERSHIP_GRAPH' => [
          'url' => '/profile/graph',
          'selected' => false
        ],
        'SETTINGS' => [
          'url' => '/profile/settings',
          'selected' => true
        ]
      ]
    ]);
  }

  public static function get(){
    Authentication::requireLoggedIn();
    self::render();
  }

  public static function post(){
    Authentication::requireLoggedIn();

    $user = Flight::get('user');

    $formErrors = FormValidator::validate($_POST, [
      'method' => 'required|option:email,sms',
      'frequency' => 'required|option:week,month,quarter,year'
    ]);

    foreach ($formErrors as $key => $value) {
      Flight::set('settings.form.error.' . $key, Localization::get($value));
    }

    if(!$formErrors){
      try {
        $user->updateNotificationSettings($_POST['method'], $_POST['frequency']);
        Flight::set('settings.success', 'UPDATED_NOTIFICATION_SUCCESSFULLY');
      } catch (Exception $e) {
        Flight::set('settings.error', $ex->getMessage());
      }


    }

    self::render();
  }
}
