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
    $errors = FormValidator::validate($_POST, [
      'email' => 'required|email',
      'password' => 'required|password',
      'first_name' => 'required|string',
      'last_name' => 'required|string'
    ]);

    if(!$errors){
      $errors = Authentication::register($_POST['email'], $_POST['password'], $_POST['first_name'], $_POST['last_name']);
    }

    if(!$errors){
      //success
    }
    
    self::render($_POST, []);
  }
}
