<?php
/**
 *
 */
class Pages
{
  public static function __callStatic($method_name, $args) {
    //check if we got a valid request method
     if(in_array($_SERVER['REQUEST_METHOD'], ['POST', 'GET', 'PUT', 'DELETE'])){
       try{
         //try and require the page file and call the appropriate method
         $method_name = lcfirst($method_name);
         require_once "pages/$method_name.php";
         call_user_func_array([$method_name, $_SERVER['REQUEST_METHOD']], $args);
       }catch(Exception $ex){
        //if something went wrong
        //set error message
        Flight::set('general.error', $ex->getMessage());
        Flight::set('general.error.trace', $ex->getTraceAsString());
        //display error page
        Flight::display('error');
        //call_user_func_array([$method_name, 'render']);
       }
     }
  }
}
