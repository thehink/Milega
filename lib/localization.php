<?php
/**
 *
 */
class Localization
{

  static $strings = [];
  static $language = '';

  public static function load($language){
    if(file_exists("./lib/localization/$language.php")){
      require 'localization/' . $language . '.php';
    }else{
      require 'localization/' . _LOCALIZATION_DEFAULT_ . '.php';
    }
  }

  public static function register($arr){
    self::$strings = $arr;
  }

  public static function get($id, ...$params){
    if(isset(self::$strings[$id])){
      return sprintf(self::$strings[$id], ...$params);
    }
    return $id;
  }

}
