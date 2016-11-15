<?php

/**
 *
 */
class ProfileGraph
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
          'selected' => true
        ],
        'SETTINGS' => [
          'url' => '/profile/settings',
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
