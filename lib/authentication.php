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

      if(isset($_COOKIE['token'])){
        $token = Token::get($_COOKIE['token']);
        if($token){
          $_SESSION['userId'] = $token->userId;
        }else{
          return;
        }
      }else{
        return;
      }
    }

    $user = User::getUser($_SESSION['userId']);

    if(!$user){
      throw new Exception("Couldn't find logged in user!");
    }
    self::$isLoggedIn = true;
    Flight::set('user', $user);
  }

  public static function register($email, $password, $firstName, $lastName){
    if(User::exists($email)){
      throw new Exception("User already exists in database!");
    }

    $userId = User::add($email, $password, $firstName, $lastName);
    return $userId;
  }

  public static function login($email, $password, $rememberMe = false){
    $user = User::getUserByEmail($email);

    if(!$user){
      throw new Exception("Email or password is incorrect!");
    }

    if(!password_verify($password, $user->password)){
      throw new Exception("Email or (password) is incorrect!");
    }

    if($rememberMe){
      $timestamp = time() + 60 * 60 * 24 * 30;
      $expire = date("Y-m-d H:i:s", $timestamp);
      $token = Token::create($user->id, 'login', $expire);
      setcookie("token", $token->toString(), strtotime($token->expires));
    }

    $_SESSION['userId'] = $user->id;
    Flight::set('user', $user);
    return $user->id;
  }

  public static function logout(){
    if(isset($_SESSION['userId'])){
      unset($_SESSION['userId']);
    }

    if(isset($_COOKIE['token'])){
      $token = Token::get($_COOKIE['token']);
      if($token){
        $token->delete();
      }
      setcookie("token", false, time() - 1000*60);
    }

    Flight::clear('user');
  }

  public static function requireLoggedIn(){
    if(!self::$isLoggedIn){
      Flight::redirect('/login');
      exit;
    }
  }
}
