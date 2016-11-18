<?php

class Questions{
  public static function get($day){
    $db = Flight::db();

    $stmt = $db->prepare("
      SELECT id, groupId, question, day FROM questions
      WHERE day = :day
    ");

    $stmt->setFetchMode(PDO::FETCH_CLASS, 'Question');

    $stmt->execute([
      'day' => $day
    ]);

    return $stmt->fetchAll();
  }
}
