<?php
require_once 'lib/formValidator.php';
/**
 *
 */
class Register
{

  public static function render($data = [], $errors = []){
    Flight::display( 'register', [
      'title' => 'REGISTER',
      'data' => $data,
      'errors' => $errors
    ]);
  }

  public static function get(){
    Authentication::requireRole('admin');
    self::render();
  }

  public static function post(){
    Authentication::requireRole('admin');
    //validate form
    $formErrors = FormValidator::validate($_POST, [
      'email' => 'required|email',
      'password' => 'required|password',
      'first_name' => 'required|string',
      'last_name' => 'required|string'
    ]);

    //set errors
    foreach ($formErrors as $key => $value) {
      Flight::set('register.form.error.' . $key, Localization::get($value));
    }

    if(!$formErrors){
      try{
          //call register function
          $userId = Authentication::register($_POST['email'], $_POST['password'], $_POST['first_name'], $_POST['last_name']);
          if($userId){
            //success
            Flight::redirect('/');
          }
      } catch(Exception $ex){
        Flight::set('register.error', $ex->getMessage());
      }
    }



    //render page
    self::render($_POST, $formErrors);
  }
}
