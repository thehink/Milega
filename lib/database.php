<?php
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

}
