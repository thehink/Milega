<?php

/**
 *
 */
class Guide
{
  public static $assets = [
    '<link href="/assets/css/guide.css" rel="stylesheet" />'
  ];

  public static function render($id){
    Flight::display( 'guide', [
      'assets' => self::$assets,
      'title' => Localization::get('INTRODUCTION'),
      'guide' => $id,
    ]);
  }

  public static function get($id){

    if(!$id){
      $id = 'intro';
    }

    Authentication::requireLoggedIn();
    self::render($id);
  }
}
