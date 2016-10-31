<?php
require 'lib/flight/Flight.php';

Flight::route('/', function(){
    echo 'hello world!';
});


Flight::route('/test', function(){
    echo 'test';
});

Flight::start();
