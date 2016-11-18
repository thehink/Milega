<?php

/**
 *
 */
class Course
{

  public static $assets = [
    '<link href="/assets/css/course.css" rel="stylesheet" />'
  ];

  public static function render($questions){
    Flight::display( 'course', [
      'assets' => self::$assets,
      'page' => 'course',
      'questions' => $questions,
      'subHeader' => [
        'Dag 1' => [
          'url' => '/course/1',
          'selected' => true
        ],
        'Dag 2' => [
          'url' => '/course/1',
          'selected' => false
        ],
        'Dag 3' => [
          'url' => '/course/1',
          'selected' => false
        ],
        'Dag 4' => [
          'url' => '/course/1',
          'selected' => false
        ],
        'Dag 5' => [
          'url' => '/course/1',
          'selected' => false
        ],
        'Dag 6' => [
          'url' => '/course/1',
          'selected' => false
        ]
      ]
    ]);
  }

  public static function get($day){
    Authentication::requireLoggedIn();
    $day = $day ?? 1;

    $userId = Flight::get('user')->id;

    $questions = Questions::get($day);
    foreach ($questions as $question) {
      $question->answer = Answer::get($userId, $question->id);
    }

    self::render($questions);
  }

  public static function post(){
    Authentication::requireLoggedIn();
    $userId = Flight::get('user')->id;

    $id = Flight::request()->data->id;
    $text = Flight::request()->data->text;

    $answer = Answer::get($userId, $id);

    if(!$answer){
      Answer::create($userId, $id, $text);
    }else{
      $answer->answer = $text;
      $answer->save();
    }

    Flight::json([
      'status' => 'ok'
    ]);

  }
}
