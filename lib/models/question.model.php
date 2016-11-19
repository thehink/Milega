<?php

class Question extends Model
{

  static $table = "questions";

  function __construct()
  {

  }

  public function save($values){
    $values = $values ?? [
      'groupId' => $this->groupId,
      'question' => $this->question,
      'day' => $this->day
    ];

    return $this->__save($values);
  }

}
