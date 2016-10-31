<?php
require 'lib/flight/Flight.php';

Flight::route('/', function(){
    Flight::render( 'index', [
      'variable' => 'OMG it works!'
    ]);
});


Flight::route('/test', function(){
    echo 'test';
});

Flight::start();
