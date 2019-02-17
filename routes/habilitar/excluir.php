<?php   
  require_once '../../global.php';
  
  try{
    $id = $_GET['id'] ?? '';
    $h = new Habilitar($id);
    $h->delete();
  }catch(Exception $e){
    Erro::tratar($e);
    exit;  
  }  
  header('Location: http://localhost/capgemini/views/habilitar/lista.php');
  die();    

  
