<?php

/**
 *
 */
class Course
{

  public static $assets = [
    '<link href="/assets/css/guide.css" rel="stylesheet" />',
    '<link href="/assets/css/course.css" rel="stylesheet" />'
  ];

  public static function render($day = 1, $questions = []){
    Flight::display( 'course', [
      'assets' => self::$assets,
      'page' => 'course',
      'day' => $day,
      'questions' => $questions,
      'subHeader' => [
        'Dag 1' => [
          'url' => '/course/1',
          'selected' => $day === 1
        ],
        'Dag 2' => [
          'url' => '/course/2',
          'selected' => $day === 2
        ],
        'Dag 3' => [
          'url' => '/course/3',
          'selected' => $day === 3
        ],
        'Dag 4' => [
          'url' => '/course/4',
          'selected' => $day === 4
        ],
        'Dag 5' => [
          'url' => '/course/5',
          'selected' => $day === 5
        ],
        'Dag 6' => [
          'url' => '/course/6',
          'selected' => $day === 6
        ]
      ]
    ]);
  }

  public static function get($day){
    Authentication::requireLoggedIn();
    $day = (int)($day ?? 1);

    $userId = Flight::get('user')->id;

    $questions = Questions::get($day);

    foreach ($questions as $question) {
      $question->answer = Answer::get($userId, $question->id);
    }

    self::render($day, $questions);
  }

  public static function post(){
    Authentication::requireLoggedIn();
    $userId = Flight::get('user')->id;

    $id = (int)Flight::request()->data->id;
    $text = htmlspecialchars(Flight::request()->data->text);

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
