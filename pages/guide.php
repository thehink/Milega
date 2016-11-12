<?php

/**
 *
 */
class Guide
{
  public static $assets = [
    '<link href="/assets/css/guide.css" rel="stylesheet" />'
  ];

  public static function render(){
    Flight::display( 'guide', [
      'assets' => self::$assets,
      'title' => Localization::get('INTRODUCTION')
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
