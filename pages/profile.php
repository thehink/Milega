<?php

/**
 *
 */
class Profile
{

  public static function render($data = []){
    Flight::display( 'profile', [
      'data' => $data,
      'subHeader' => [
        'Title' => [
          'url' => 'http://google.se',
          'selected' => true
        ],
        'Edit Profile' => [
          'url' => 'profile/edit',
          'selected' => false
        ]
      ]
    ]);
  }

  public static function get(){
    Authentication::requireLoggedIn();
    self::render();
  }

  public static function post(){
    self::render();
  }
}
