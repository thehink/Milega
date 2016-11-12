<?php
/**
 *
 */
class Pages
{
  public static function __callStatic($method_name, $args) {
     require_once "pages/$method_name.php";

     if(in_array($_SERVER['REQUEST_METHOD'], ['POST', 'GET', 'PUT', 'DELETE'])){
       try{
         call_user_func_array([$method_name, $_SERVER['REQUEST_METHOD']], $args);
       }catch(Exception $ex){
        Flight::set('general.error', $ex->getMessage());
        call_user_func_array([$method_name, 'render']);
       }
     }

     echo 'Calling method ',$method_name,'<br />';
     print_r($args);
  }
}
