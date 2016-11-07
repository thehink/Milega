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
  $email = $_POST['email'];
  $password = $_POST['password'];
  print_r($_POST);
});

Flight::route('POST /register', function(){
  print_r($_POST);
});



Flight::start();
