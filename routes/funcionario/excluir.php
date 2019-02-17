<?php   
  require_once '../../global.php';
  
  try{
    $id = $_GET['id'] ?? '';
    $f = new Funcionario($id);
    $f->delete();
  }catch(Exception $e){
    Erro::trataErro($e);
    exit;  
  }  
  header('Location: http://localhost/capgemini/views/funcionario/funcionario.php');
    die();    

  
