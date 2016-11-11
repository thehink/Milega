<?php

/**
 *
 */
class Register
{

  public static function render($data = [], $errors = []){
    Flight::display( 'register', [
      'data' => $data,
      'errors' => $errors
    ]);
  }

  public static function get(){
    self::render();
  }

  public static function post(){
    $formErrors = FormValidator::validate($_POST, [
      'email' => 'required|email',
      'password' => 'required|password',
      'first_name' => 'required|string',
      'last_name' => 'required|string'
    ]);

    foreach ($formErrors as $key => $value) {
      Flight::set('register.form.error.' . $key, Localization::get($value));
    }

    try{
      if(!$formErrors){
        $userId = Authentication::register($_POST['email'], $_POST['password'], $_POST['first_name'], $_POST['last_name']);
      }
    } catch(Exception $ex){
      Flight::set('register.error', $ex->getMessage());
    }

    if(isset($userId)){
      //success
      Flight::redirect('/');
    }

    self::render($_POST, $formErrors);
  }
}
