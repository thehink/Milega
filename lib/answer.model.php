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
      date = :date
    WHERE id = :id
    ");

    return $stmt->execute([
      'id' => $this->id,
      'answer' => $this->answer,
      'date' => date('', time()),
    ]);
  }


  public static function get($userId, $questionId){
    $db = Flight::db();

    $stmt = $db->prepare("
      SELECT id, userId, answer, date
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
                  answer,
                  date
                )
        VALUES (
                  :questionId,
                  :userId,
                  :answer,
                  :date
                )
    ");

    $stmt->execute([
      'questionId' => $questionId,
      'userId' => $userId,
      'answer' => $answer,
      'date' => date('', time())
    ]);

    return self::get($userId, $questionId);
  }

}
