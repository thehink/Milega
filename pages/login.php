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

  public static function get(){
    self::render();
  }

  public static function post(){
    $formErrors = FormValidator::validate($_POST, [
      'email' => 'required|email',
      'password' => 'required|password'
    ]);

    foreach ($formErrors as $key => $value) {
      Flight::set('login.form.error.' . $key, $value);
    }

    try{
      if(!$formErrors){
        $userId = Authentication::login($_POST['email'], $_POST['password']);
      }
    } catch(Exception $ex){
      Flight::set('login.error', $ex->getMessage());
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
