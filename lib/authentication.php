<?php

/**
 *
 */
class Authentication
{
  public static $isLoggedIn = false;

  public static function checkLogin(){
    if(!isset($_SESSION['userId'])){
      //todo: check cookie
      return;
    }

    $user = User::getUser($_SESSION['userId']);

    if(!$user){
      throw new Exception("Couldn't find logged in user!");
    }
    Flight::set('user', $user);
  }

  public static function register($email, $password, $firstName, $lastName){
    if(User::exists($email)){
      throw new Exception("User already exists in database!");
    }

    $userId = User::add($email, $password, $firstName, $lastName);
    return $userId;
  }

  public static function login($email, $password){
    $user = User::getUserByEmail($email);

    if(!$user){
      throw new Exception("Email or password is incorrect!");
    }

    if(!password_verify($password, $user->password)){
      throw new Exception("Email or (password) is incorrect!");
    }

    $_SESSION['userId'] = $user->id;
    Flight::set('user', $user);
    return $user->id;
  }

  public static function logInByCookie(){

  }

  public static function logout(){
    unset($_SESSION['userId']);
    Flight::clear('user');
  }

  public static function requireLoggedIn(){
    if(!Authentication::$isLoggedIn){
      Flight::redirect('/');
      exit;
    }
  }
}
