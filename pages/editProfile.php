<?php

/**
 *
 */
class EditProfile
{

  public static function render($data = []){
    Flight::display( 'editProfile', [
      'data' => $data
    ]);
  }

  public static function get(){
    Authentication::requireLoggedIn();
    self::render();
  }

  public static function post(){
    Authentication::requireLoggedIn();
    self::render();
  }
}
