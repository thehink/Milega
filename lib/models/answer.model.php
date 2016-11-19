<?php

class Answer{
  function __construct()
  {

  }

  public function save(){
    $db = Flight::db();

    $stmt = $db->prepare("
    UPDATE answers SET
      answer = :answer,
      dateUpdated = :dateUpdated
    WHERE id = :id
    ");

    return $stmt->execute([
      'id' => $this->id,
      'answer' => $this->answer,
      'dateUpdated' => date('Y-m-d H:i:s', time()),
    ]);
  }


  public static function get($userId, $questionId){
    $db = Flight::db();

    $stmt = $db->prepare("
      SELECT id, userId, answer, dateUpdated, dateCreated
      FROM answers
      WHERE
        questionId = :questionId AND
        userId = :userId
    ");

    $stmt->setFetchMode(PDO::FETCH_CLASS, 'Answer');
    $stmt->execute([
      'questionId' => $questionId,
      'userId' => $userId
    ]);

    return $stmt->fetch();
  }

  public static function create($userId, $questionId, $answer){
    $db = Flight::db();

    $stmt = $db->prepare("
        INSERT INTO answers (
                  questionId,
                  userId,
                  answer
                )
        VALUES (
                  :questionId,
                  :userId,
                  :answer
                )
    ");

    $stmt->execute([
      'questionId' => $questionId,
      'userId' => $userId,
      'answer' => $answer
    ]);

    return self::get($userId, $questionId);
  }

}
