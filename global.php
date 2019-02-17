<?php 
  require_once('../../infra/config.php');
  
  spl_autoload_register(function($className){
    include 'classes/' . $className . '.php';
  });
    