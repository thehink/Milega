<?php

/**
 *
 */
class ProfileGraph
{

  static $assets = [
    '<link href="/assets/css/profile.css" rel="stylesheet" />',
    '<link href="/assets/css/profileGraph.css" rel="stylesheet" />'
  ];

  public static function render(){
    Flight::display( 'profileGraph', [
      'title' => 'PROFILE',
      'page' => 'profile',
      'assets' => self::$assets,
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
