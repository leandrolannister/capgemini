<?php   
  require_once '../../global.php';
  
  try{
    $id = $_GET['id'] ?? '';
    $pt = new PostoTrabalho($id);
    $pt->delete();
  }catch(Exception $e){
    Erro::tratar($e);
    exit;  
  }  
  header('Location: http://localhost/capgemini/views/PostoTrabalho/postoTrabalho.php');
    die();    

  
