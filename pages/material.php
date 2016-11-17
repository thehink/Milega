<?php

/**
 *
 */
class Material
{

  static $assets = [
    '<link href="/assets/css/material.css" rel="stylesheet" />'
  ];

  public static function render($material){
    $subHeader = [
      'BOSS_ROLES' => [
        'url' => '/material',
        'selected' => $material === NULL,
      ],
      'CONFLICT_MANAGEMENT' => [
        'url' => '/material/conflicts',
        'selected' => $material === 'conflicts'
      ],
      'LECTURES' => [
        'url' => '/material/lectures',
        'selected' => $material === 'lectures'
      ]
    ];

    if($material === 'conflicts'){
      Flight::display( '404', [
        'title' => 'MATERIAL',
        'page' => 'material',
        'assets' => self::$assets,
        'subHeader' => $subHeader
      ]);
    }else if($material === 'lectures'){
      Flight::display( '404', [
        'title' => 'MATERIAL',
        'page' => 'material',
        'assets' => self::$assets,
        'subHeader' => $subHeader
      ]);
    }else{
      Flight::display( 'materialRoles', [
        'title' => 'MATERIAL',
        'page' => 'material',
        'assets' => self::$assets,
        'subHeader' => $subHeader
      ]);
    }
  }

  public static function get($material){
    Authentication::requireLoggedIn();
    self::render($material);
  }
}
