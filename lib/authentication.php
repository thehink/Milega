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

    if(!_EMAIL_ACTIVATED_){
      throw new Exception("EMAIL_SERVICE_NOT_ACTIVE");
    }

    require_once 'vendor/swiftmailer/lib/swift_required.php';

    //create a reset token that is valid for 10 minutes
    $token = Token::create($user->id, 'reset', date("Y-m-d H:i:s", time() + 60 * 10));

    $transport = Swift_SmtpTransport::newInstance(_EMAIL_SMTP_HOST_, _EMAIL_SMTP_PORT_, _EMAIL_SMTP_SECURITY_)
    ->setUsername(_EMAIL_SMTP_USERNAME_) // Your Gmail Username
    ->setPassword(_EMAIL_SMTP_PASSWORD_); // Your Gmail Password

    // Mailer
    $mailer = Swift_Mailer::newInstance($transport);

    // Create a message
    $message = Swift_Message::newInstance('Password Reset')
        ->setFrom([_EMAIL_SMTP_USERNAME_ => 'Milega']) // can be $_POST['email'] etc...
        ->setTo([$email => $user->getFullName()]) // your email / multiple supported.
        ->setBody('Here is the password reset link: http://' . _DOMAIN_ . '/reset_password?token=' . base64url_encode($token->toString()), 'text/html');

    // Send the message
    if(!$mailer->send($message)){
      throw new Exception("EMAIL_NOT_SENT");
    }

    return true;
  }

  public static function resetPassword($userId, $newPassword){
    $user = User::getUser($userId);
    if(!$user){
      throw new Exception("COULD_NOT_FIND_USER");
    }

    $user->updatePassword($newPassword);
    return true;
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
