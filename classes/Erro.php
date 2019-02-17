<?php 
class Erro{
  public static function tratar(Exception $e)
  {
    if(DEBUG):
      echo "<pre>";
      print_r($e);
      echo "</pre>";
      exit;
    else:
      echo $e->getMessage();
      exit;
    endif;   
  }   
}