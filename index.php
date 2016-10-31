<?php
require 'lib/flight/Flight.php';

Flight::route('/', function(){
    Flight::render( 'header', []);
    Flight::render( 'index', []);
    Flight::render( 'footer', []);
});


Flight::route('/test', function(){



  Flight::render( 'header', []);
  Flight::render( 'test', ['variabel' => 'något']);
  Flight::render( 'footer', []);
});

Flight::start();
