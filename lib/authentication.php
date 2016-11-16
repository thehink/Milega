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
      throw new Exception("WRONG_EMAIL_OR_PASSWORD");
    }

    if(!password_verify($password, $user->password)){
      throw new Exception("WRONG_EMAIL_OR_PASSWORD");
    }

    if($rememberMe){
      $timestamp = time() + _AUTHENTICATION_TOKEN_LIFETIME_;
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

  public static function requestPasswordReset($email){
    $user = User::getUserByEmail($email);

    if(!$user){
      throw new Exception("WRONG_EMAIL_OR_PASSWORD");
    }

    require_once 'vendor/swiftmailer/lib/swift_required.php';
    return true;
/*
    $transport = Swift_SmtpTransport::newInstance('ssl://smtp.gmail.com', 465)
    ->setUsername('username@gmail.com') // Your Gmail Username
    ->setPassword('my_secure_gmail_password'); // Your Gmail Password

    // Mailer
    $mailer = Swift_Mailer::newInstance($transport);

    // Create a message
    $message = Swift_Message::newInstance('Wonderful Subject Here')
        ->setFrom(array('sender@example.com' => 'Sender Name')) // can be $_POST['email'] etc...
        ->setTo(array('receiver@example.com' => 'Receiver Name')) // your email / multiple supported.
        ->setBody('Here is the <strong>message</strong> itself. It can be text or <h1>HTML</h1>.', 'text/html');

    // Send the message
    if ($mailer->send($message)) {
        echo 'Mail sent successfully.';
    } else {
        echo 'I am sure, your configuration are not correct. :(';
    }
    */
  }

  public static function isAdmin(){
    if(Authentication::$isLoggedIn && Flight::get('user')->role === 'admin'){
      return true;
    }
    return false;
  }

  public static function requireRole($role){
    if(!self::$isLoggedIn || Flight::get('user')->role !== $role){
      Flight::display('404');
      exit;
    }
  }

  public static function requireLoggedIn(){
    if(!self::$isLoggedIn){
      Flight::redirect('/login');
      exit;
    }
  }
}
