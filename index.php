<?php
require_once 'lib/header.php';
require_once 'pages/register.php';
require_once 'pages/login.php';
require_once 'pages/profile.php';

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

Flight::map('getError', function($error){
  if(Flight::has($error)){
    return '<span class="error">' . Flight::get($error) . '</span>';
  }
});

Flight::map('notFound', function(){
    // Handle not found
    Flight::display('404');
});

Flight::map('display', function($name, $data = []){
  $data['page'] = $data['page'] ?? $name;
  Flight::render( 'header', $data);
  Flight::render( $name, $data);
  Flight::render( 'footer', $data);
});

Flight::route('/test', function(){
    Authentication::requireLoggedIn();
    Flight::render( 'header', []);
    Flight::render( 'index', []);
    Flight::render( 'footer', []);
});

Flight::route('GET /guide(/@id)', ['Pages', 'Guide']);

Flight::route('/', ['Profile', 'get']);
Flight::route('GET /profile', ['Profile', 'get']);

Flight::route('GET /register', ['Register', 'get']);
Flight::route('POST /register', ['Register', 'post']);

Flight::route('GET /test2', ['Pages', 'profile']);

Flight::route('GET /login', ['Login', 'get']);
Flight::route('POST /login', ['Login', 'post']);
Flight::route('GET /logout', ['Login', 'logout']);



Flight::start();
