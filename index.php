<?php
require_once 'lib/header.php';

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

Flight::route('GET /register', function(){
  Flight::render( 'header', []);
  Flight::render( 'register', []);
  Flight::render( 'footer', []);
});

Flight::route('POST /login', function(){
  $request = Flight::request();
  print_r($request);
});

Flight::route('POST /register', function(){
  $request = Flight::request();
  print_r($request);
});



Flight::start();
