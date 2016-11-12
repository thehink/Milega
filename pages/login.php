<?php
require 'lib/formValidator.php';
/**
 *
 */
class Login
{

  public static function render($data = []){
    Flight::display( 'login', [
      'data' => $data
    ]);
  }

  public static function logout(){
    Authentication::logout();
    Flight::redirect('/login');
    exit;
  }

  public static function get(){
    if(Authentication::$isLoggedIn){
      Flight::redirect('/profile');
      exit;
    }

    self::render();
  }

  public static function post(){
    if(Authentication::$isLoggedIn){
      Flight::redirect('/profile');
      exit;
    }

    $formErrors = FormValidator::validate($_POST, [
      'email' => 'required|email',
      'password' => 'required|password'
    ]);

    foreach ($formErrors as $key => $value) {
      Flight::set('login.form.error.' . $key, Localization::get($value));
    }

    if(!$formErrors){
      try{
          $userId = Authentication::login($_POST['email'], $_POST['password'], isset($_POST['remember_me']));
          if($userId){
            //success
            $user = User::getUser($userId);
            if(!$user->guideComplete){
              Flight::redirect('/guide');
            }else{
              Flight::redirect('/');
            }
            exit;
          }
      } catch(Exception $ex){
          Flight::set('login.error', $ex->getMessage());
      }

    }

    self::render($_POST);
  }
}
