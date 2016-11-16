<?php
require_once 'user.model.php';
require_once 'token.model.php';

Flight::register('db', 'PDO', array('sqlite:db/milega.sqlite'));


/**
 *
 */
class Database
{

}
