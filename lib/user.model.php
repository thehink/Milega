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

  public static function add($email, $password, $firstname, $lastname, $role = 'user'){
    $db = Flight::db();

    $stmt = $db->prepare("
        INSERT INTO users (
                  firstName,
                  lastName,
                  email,
                  password,
                  role
                )
        VALUES (
                  :firstName,
                  :lastName,
                  :email,
                  :password,
                  :role
                )
    ");

    $stmt->setFetchMode(PDO::FETCH_CLASS, 'User');
    $stmt->execute([
      'email' => $email,
      'password' => password_hash($password, PASSWORD_BCRYPT),
      'firstName' => $firstname,
      'lastName' => $lastname,
      'role' => $role
    ]);

    return $db->lastInsertId();
  }

  public static function exists($email){
    $db = Flight::db();

    $stmt = $db->prepare("
      SELECT count(*)
      FROM users
      WHERE email = :email
    ");

    $stmt->execute([
      'email' => $email
    ]);

    return $stmt->fetchColumn();
  }

  public static function getUserByEmail($email){
    $db = Flight::db();

    $stmt = $db->prepare("
      SELECT
        id,
        email,
        password,
        role,
        firstName,
        lastName
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
      SELECT
        id,
        email,
        role,
        firstName,
        lastName
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
