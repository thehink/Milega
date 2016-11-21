<?php

/**
 *
 */
class ForgotPassword
{
  public static $assets = [

  ];

  public static function render($data = []){
    Flight::display( 'forgotPassword', [
      'assets' => self::$assets,
      'title' => Localization::get('FORGOT_PASSWORD'),
      'data' => $data,
    ]);
  }

  public static function get(){
    if(Authentication::$isLoggedIn){
      Flight::redirect('/profile');
    }
    self::render();
  }

  public static function post(){
    if(Authentication::$isLoggedIn){
      Flight::redirect('/profile');
    }

    $postData = [
      'email' => htmlspecialchars($_POST['email'] ?? '')
    ];

    //Validate form with the FormValidator class
    $formErrors = FormValidator::validate($_POST, [
      'email' => 'required|email'
    ]);

    foreach ($formErrors as $key => $value) {
      Flight::set('password.form.error.' . $key, Localization::get($value));
    }

    if(!$formErrors){
      try{
          $success = Authentication::requestPasswordReset($_POST['email']);
          if($success){
            Flight::set('password.success', 'PASSWORD_RESET_LINK_SENT');
          }


      } catch(Exception $ex){
          //Set error var
          Flight::set('password.error', $ex->getMessage());
      }
    }

    self::render($postData);
  }
}
