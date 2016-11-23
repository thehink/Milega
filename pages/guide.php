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
    $subHeader = [
      'BOSS_ROLES' => [
        'url' => '/material',
        'selected' => false,
      ],
      'CONFLICT_MANAGEMENT' => [
        'url' => '/material/conflicts',
        'selected' => false
      ],
      'LECTURES' => [
        'url' => '/material/lectures',
        'selected' => false
      ],
      'INTRO' => [
        'url' => '/guide',
        'selected' => true
      ]
    ];

    Flight::display( 'guide', [
      'assets' => self::$assets,
      'title' => Localization::get('INTRODUCTION'),
      'guide' => $id,
      'page' => 'material',
      'subHeader' => $subHeader
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
