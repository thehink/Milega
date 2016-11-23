<?php
require_once 'lib/formValidator.php';
/**
 *
 */
class Login
{
  public static function render($data = []){
    Flight::display( 'login', [
      'title' => 'LOGIN',
      'data' => $data
    ]);
  }

  public static function logout(){
    //call logout method that will unset session and cookie
    Authentication::logout();
    Flight::redirect('/login');
    exit;
  }

  public static function get(){
    //Check if user is logged in else redirect to user profile page
    if(Authentication::$isLoggedIn){
      Flight::redirect('/profile');
      exit;
    }

    self::render();
  }

  public static function post(){
    //Check if user is logged in else redirect to user profile page
    if(Authentication::$isLoggedIn){
      Flight::redirect('/profile');
      exit;
    }

    $postData = [
      'email' => htmlspecialchars($_POST['email'] ?? ''),
      'password' => htmlspecialchars($_POST['password'] ?? '')
    ];

    //Validate form with the FormValidator class
    $formErrors = FormValidator::validate($_POST, [
      'email' => 'required|email',
      'password' => 'required'
    ]);

    foreach ($formErrors as $key => $value) {
      Flight::set('login.form.error.' . $key, Localization::get($value));
    }

    //if there werent any form errors try to login
    if(!$formErrors){
      try{
          $userId = Authentication::login($_POST['email'], $_POST['password'], isset($_POST['remember_me']));
          if($userId){
            //success
            $user = User::getUser($userId);

            //check if user completed intro, if not redirect to intro page
            if(!$user->guideComplete){
              Flight::redirect('/guide');
            }else{
              Flight::redirect('/course');
            }
            exit;
          }
      } catch(Exception $ex){
          //Set error var
          Flight::set('login.error', $ex->getMessage());
      }

    }

    self::render($postData);
  }
}
