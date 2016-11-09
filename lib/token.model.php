<?php

class Token
{

  function __construct()
  {
    $data = json_encode([
      'id' => $this->id,
      'userId' => $this->userId,
      'expires' => $this->expires
    ]);

    $encrypted = openssl_encrypt($data, _TOKEN_ENCRYPTION_ALG_, base64_decode(_TOKEN_ENCRYPTION_KEY_), OPENSSL_RAW_DATA, base64_decode(_TOKEN_ENCRYPTION_IV_));
    $encryptedBase64 = base64_encode($encrypted);

    $this->base64String = $encryptedBase64;
  }

  public function toString(){
    return $this->base64String;
  }

  public function checkExpired(){

  }

  public function delete(){
    $db = Flight::db();

    $stmt = $db->prepare("
    DELETE FROM tokens WHERE id = :id
    ");

    return $stmt->execute([
      'id' => $this->id
    ]);
  }

  static function create($userId, $type, $expires){
    $db = Flight::db();

    $stmt = $db->prepare("
        INSERT INTO tokens (
                  userId,
                  type,
                  expires
                )
        VALUES (
                  :userId,
                  :type,
                  :expires
                )
    ");


    $stmt->execute([
      'userId' => $userId,
      'expires' => $expires,
      'type' => $type
    ]);

    return self::getById($db->lastInsertId());
  }

  static function getById($id){
    $db = Flight::db();

    $stmt = $db->prepare("
      SELECT id, userId, type, expires
      FROM tokens
      WHERE id = :id
    ");

    $stmt->setFetchMode(PDO::FETCH_CLASS, 'Token');
    $stmt->execute([
      'id' => $id
    ]);

    return $stmt->fetch();
  }

  static function get($token){
    $data = openssl_decrypt($token , _TOKEN_ENCRYPTION_ALG_, base64_decode(_TOKEN_ENCRYPTION_KEY_), false, base64_decode(_TOKEN_ENCRYPTION_IV_));
    if(!$data){
      //throw new Exception("Couldn't decrypt token");
      return false;
    }

    $data = json_decode($data);

    $expires = strtotime($data->expires);
    if(time() > $expires){
      return false;
    }

    $token = self::getById($data->id);
    if(!$token){
      return false;
    }

    $expires = strtotime($token->expires);
    if(time() > $expires){
      return false;
    }

    return $token;
  }

}
