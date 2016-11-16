<?php
require_once 'lib/autoload.php';
require_once 'pages/login.php';

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
    return '<span class="error">' . Localization::get(Flight::get($error)) . '</span>';
  }
});

Flight::map('getSuccess', function($success){
  if(Flight::has($success)){
    return '<span class="success">' . Localization::get(Flight::get($success)) . '</span>';
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
Flight::route('/', ['Pages', 'Profile']);
Flight::route('GET /profile', ['Pages', 'Profile']);
Flight::route('GET /profile/graph', ['Pages', 'ProfileGraph']);
Flight::route('GET /profile/settings', ['Pages', 'ProfileSettings']);
Flight::route('POST /profile/settings', ['Pages', 'ProfileSettings']);

//endpoint for register page
Flight::route('GET /register', ['Pages', 'Register']);
Flight::route('POST /register', ['Pages', 'Register']);

Flight::route('GET /test2', ['Pages', 'profile']);

//endpoint for login page
Flight::route('GET /login', ['Pages', 'Login']);
Flight::route('POST /login', ['Pages', 'Login']);

Flight::route('GET /forgot_password', ['Pages', 'ForgotPassword']);
Flight::route('POST /forgot_password', ['Pages', 'ForgotPassword']);

Flight::route('GET /logout', ['Login', 'logout']);

Flight::route('GET /course(/@day)', ['Pages', 'Course']);

Flight::start();
