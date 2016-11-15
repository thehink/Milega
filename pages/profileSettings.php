<?php

/**
 *
 */
class ProfileSettings
{

  public static function render(){
    Flight::display( 'profile', [
      'title' => 'PROFILE',
      'subHeader' => [
        'JIT_TEST' => [
          'url' => '/profile',
          'selected' => false
        ],
        'LEADERSHIP_GRAPH' => [
          'url' => '/profile/graph',
          'selected' => false
        ],
        'SETTINGS' => [
          'url' => '/profile/settings',
          'selected' => true
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
