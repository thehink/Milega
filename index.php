<?php
require_once 'lib/header.php';
require_once 'pages/register.php';
require_once 'pages/login.php';

Flight::map('error', function(Exception $ex){
    // Handle error
    //echo '<pre>' . $e->getMessage() . '</pre>';
    if($ex->getCode() === 9000){
      Flight::set('error', $ex->getMessage());
    }else{
      Flight::render( 'header');
      echo $ex->getTraceAsString();
      Flight::render( 'footer');
    }
});

Flight::map('notFound', function(){
    // Handle not found
    Flight::display('404');
});

Flight::map('display', function($name, $data = []){
  Flight::render( 'header');
  Flight::render( $name, $data);
  Flight::render( 'footer');
});

Flight::route('/', function(){
    Flight::render( 'header', []);
    Flight::render( 'index', []);
    Flight::render( 'footer', []);
});

Flight::route('/test', function(){
    Authentication::requireLoggedIn();
    Flight::render( 'header', []);
    Flight::render( 'index', []);
    Flight::render( 'footer', []);
});

Flight::route('GET /register', ['Register', 'get']);
Flight::route('POST /register', ['Register', 'post']);

Flight::route('GET /login', ['Login', 'get']);
Flight::route('POST /login', ['Login', 'post']);



Flight::start();
