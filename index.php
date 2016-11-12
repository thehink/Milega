<?php
require_once 'lib/header.php';
require_once 'pages/register.php';
require_once 'pages/login.php';
require_once 'pages/profile.php';

/*
Flight::map('error', function(Exception $ex){
    // Handle error
    //echo '<pre>' . $e->getMessage() . '</pre>';
    if($ex->getCode() === 9000){
      Flight::set('error', $ex->getMessage());
    }else{
      Flight::set('general.error', $ex->getMessage());
      Flight::set('general.error.trace', $ex->getTraceAsString());
      //display error page
      Flight::display('error');
    }
});*/


//set a function to get error with html tag
Flight::map('getError', function($error){
  if(Flight::has($error)){
    return '<span class="error">' . Flight::get($error) . '</span>';
  }
});

//map general 404s
Flight::map('notFound', function(){
    // Handle not found
    Flight::display('404');
});

//function to display a page
Flight::map('display', function($name, $data = []){
  $data['page'] = $data['page'] ?? $name;
  Flight::render( 'header', $data);
  Flight::render( $name, $data);
  Flight::render( 'footer', $data);
});

//endpoint for test
Flight::route('/test', function(){
    Authentication::requireLoggedIn();
    Flight::render( 'header', []);
    Flight::render( 'index', []);
    Flight::render( 'footer', []);
});

//endpoint for php info
Flight::route('/php_info', function(){
    //require the user to have admin role to access phpinfo()
    Authentication::requireRole('admin');
    phpinfo();
});

//endpoint for introduction
Flight::route('GET /guide(/@id)', ['Pages', 'Guide']);

//endpoint for profile
Flight::route('/', ['Profile', 'get']);
Flight::route('GET /profile', ['Profile', 'get']);

//endpoint for register page
Flight::route('GET /register', ['Register', 'get']);
Flight::route('POST /register', ['Register', 'post']);

Flight::route('GET /test2', ['Pages', 'profile']);

//endpoint for login page
Flight::route('GET /login', ['Login', 'get']);
Flight::route('POST /login', ['Login', 'post']);
Flight::route('GET /logout', ['Login', 'logout']);



Flight::start();
