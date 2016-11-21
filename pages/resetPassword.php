<?php

/**
 *
 */
class ResetPassword
{
  public static $assets = [
  ];

  public static function render(){
    Flight::display( 'resetPassword', [
      'assets' => self::$assets,
      'title' => Localization::get('RESET_PASSWORD')
    ]);
  }

  public static function validateResetToken(){
    if(!isset($_GET['token'])){
      Flight::display('404');
      exit;
    }

    $token = Token::get(base64url_decode($_GET['token']));

    if(!$token){
      Flight::display('404');
      exit;
    }

    if($token->type !== 'reset'){
      Flight::display('404');
      exit;
    }
    return $token;
  }

  public static function get(){
    self::validateResetToken();
    self::render();
  }

  public static function post(){
    $token = self::validateResetToken();
    if(Authentication::$isLoggedIn){
      Flight::redirect('/profile');
    }

    $postData = [

    ];

    //Validate form with the FormValidator class
    $formErrors = FormValidator::validate($_POST, [
      'password' => 'required|password',
      'password_confirm' => 'required|confirm:password'
    ]);

    foreach ($formErrors as $key => $value) {
      Flight::set('password.form.error.' . $key, Localization::get($value));
    }

    if(!$formErrors){
      try{
          $success = Authentication::resetPassword($token->userId, $_POST['password']);
          if($success){
            Flight::set('password.success', 'PASSWORD_RESET');
            $token->delete();
          }
      } catch(Exception $ex){
          //Set error var
          Flight::set('password.error', $ex->getMessage());
      }
    }

    self::render();
  }
}
