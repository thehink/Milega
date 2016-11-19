<?php
require_once 'model.php';
require_once 'questions.php';
require_once 'models/user.model.php';
require_once 'models/token.model.php';
require_once 'models/question.model.php';
require_once 'models/answer.model.php';

Flight::register('db', 'PDO', _PDO_DATABASE_);


/**
 *
 */
class Database
{
  static function save($table, $values, $where){
    $sql = "UPDATE $table SET ";
    foreach ($values as $key => $value) {
      $sql .= "$key = :$key, ";
    }
    $sql = rtrim($sql, ", ");
    $sql .= "  WHERE ";
    foreach ($where as $key => $value) {
      $sql .= "$key = :$key AND ";
    }
    $sql = rtrim($sql, "AND ");

    $db = Flight::db();
    $stmt = $db->prepare($sql);

    return $stmt->execute(array_merge($values, $where));
  }

  static function delete($table, $where){
    $sql = "DELETE FROM $table WHERE ";
    foreach ($where as $key => $value) {
      $sql .= "$key = :$key AND ";
    }
    $sql = rtrim($sql, "AND ");


    $db = Flight::db();
    $stmt = $db->prepare($sql);

    return $stmt->execute($where);
  }

  static function get($table, $values, $where, $class){
    $sql = "SELECT ";
    foreach ($values as $key) {
      $sql .= "$key, ";
    }
    $sql = rtrim($sql, ", ");
    $sql .= " FROM $table  WHERE ";
    foreach ($where as $key => $value) {
      $sql .= "$key = :$key AND ";
    }
    $sql = rtrim($sql, "AND ");

    $db = Flight::db();
    $stmt = $db->prepare($sql);

    $stmt->setFetchMode(PDO::FETCH_CLASS, $class);
    $stmt->execute(array_merge($values, $where));

    return $stmt->fetch();
  }

  static function create($table, $values){
    $sql = "INSERT INTO $table (";

    foreach ($values as $key => $value) {
      $sql .= "$key, ";
    }

    $sql = rtrim($sql, ", ");

    $sql .= ") VALUES (";
    foreach ($values as $key => $value) {
      $sql .= ":$key, ";
    }
    $sql = rtrim($sql, ", ");
    $sql .= ")";


    $db = Flight::db();
    $stmt = $db->prepare($sql);

    $stmt->execute($values);
    return $db->lastInsertId();
  }
}
