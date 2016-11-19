<?php

class Question extends Model
{

  static $table = "questions";

  function __construct()
  {

  }

  public function save(){
    $values = [
      'groupId' => NULL,
    ];

    return $this->__save($values);
  }

}
