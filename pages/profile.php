<?php

/**
 *
 */
class Profile
{

  static $assets = [
    '<link href="/assets/css/profile.css" rel="stylesheet" />'
  ];

  public static function render($guideComplete){
    Flight::display( 'profileJTI', [
      'title' => 'PROFILE',
      'page' => 'profile',
      'assets' => self::$assets,
      'guideComplete' => $guideComplete,
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

    $user = Flight::get('user');
    $guideComplete = $user->guideComplete;
    if(!$user->guideComplete){
      $user->guideComplete = true;
      $user->save();
    }

    self::render($guideComplete);
  }

  public static function post(){
    Authentication::requireLoggedIn();
    self::render();
  }
}
