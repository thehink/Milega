<?php

class FormValidator {

  public static $validations = [
    'required' => 'FormValidator::validateRequired',
    'string' => 'FormValidator::validateString',
    'integer' => 'FormValidator::validateInteger',
    'email' => 'FormValidator::validateEmail',
    'password' => 'FormValidator::validatePassword'
  ];

  public static function validate($arr, $validation){
    $errors = [];

    foreach ($validation as $field => $value) {
      $validations = explode('|', $value);
      foreach ($validations as $validationType) {
        if(array_key_exists($validationType, self::$validations)){
          $func = self::$validations[$validationType];
          $error = call_user_func($func, $arr[$field]);
          if($error){
            $errors[$field] = $error;
            break;
          }
        }
      }
    }

    return $errors;
  }

  public static function validateRequired($value){
    if(!$value){
      return 'FIELD_REQUIRED';
    }


    return false;
  }

  public static function validateInteger(){

  }

  public static function validateString(){

  }

  public static function validateEmail($value){
    if(!$value){
      return false;
    }

    if(!filter_var($value, FILTER_VALIDATE_EMAIL)){
      return 'INVALID_EMAIL';
    }

    return false;
  }

  public static function validatePassword(){

  }

}
