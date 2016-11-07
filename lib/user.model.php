<?php

class User
{

  function __construct()
  {

  }

  public function update(){

  }

  public function updatePassword($oldPassword, $password){

  }

  public function remove(){
    //return self::remove($this->id);
  }

  public static function addUser(){

  }

  public static function getUserByEmail($email){
    $db = Flight::db();

    $stmt = $db->prepare("
      SELECT id, email, firstname, password
      FROM users
      WHERE email = :email
    ");

    $stmt->setFetchMode(PDO::FETCH_CLASS, 'User');
    $stmt->execute([
      'email' => $email
    ]);

    return $stmt->fetch();
  }

  public static function getUser($id){
    $db = Flight::db();

    $stmt = $db->prepare("
      SELECT id, email, firstname, password
      FROM users
      WHERE id = :id
    ");

    $stmt->setFetchMode(PDO::FETCH_CLASS, 'User');
    $stmt->execute([
      'id' => $id
    ]);

    return $stmt->fetch();
  }
}
