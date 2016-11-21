<?php

/**
 *
 */
class Days
{
  public static function get(){
    return Database::get('days', ['id', 'description'], [], 'Day');
  }
}
