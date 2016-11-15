<?php

/**
 *
 */
class Profile
{

  static $assets = [
    '<link href="/assets/css/profile.css" rel="stylesheet" />'
  ];

  public static function render(){
    Flight::display( 'profileJTI', [
      'title' => 'PROFILE',
      'page' => 'profile',
      'assets' => self::$assets,
      'subHeader' => [
        'JIT_TEST' => [
          'url' => '/profile',
          'selected' => true
        ],
        'LEADERSHIP_GRAPH' => [
          'url' => '/profile/graph',
          'selected' => false
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
    Authentication::requireLoggedIn();
    self::render();
  }
}
