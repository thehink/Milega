<?php

/**
 *
 */
class Model
{

  static $table = "";

  function __construct()
  {
  }

  function __save($values){
    return Database::save(get_class($this)::$table, $values, ['id' => $this->id]);
  }

  function __delete(){
    return Database::delete(get_class($this)::$table, ['id' => $this->id]);
  }

}
