<?php

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
      Flight::set('login.form.error.' . $key, $value);
    }

    if(!$formErrors){
      try{
          $userId = Authentication::login($_POST['email'], $_POST['password']);
      } catch(Exception $ex){
          Flight::set('login.error', $ex->getMessage());
      }
    }

    if(isset($userId)){
      if(isset($_POST['remember_me'])){
        $timestamp = time() + 60 * 60 * 24 * 30;
        $expire = date("Y-m-d H:i:s", $timestamp);
        $token = Token::create($userId, 'login', $expire);
        setcookie("token", $token->toString(), strtotime($token->expires));
      }

      //success
      Flight::redirect('/');
    }

    self::render($_POST);
  }
}
