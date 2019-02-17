<?php   
  require_once '../cabecalho.php';
  require_once '../../global.php';
  
  try{
    $funcs = Funcionario::lista();
    $postos = PostoTrabalho::lista();
  }catch(Exception $e){
    Erro::tratar($e);
  }  

  if(isset($_POST['id'])):
    try{
      $pt = new Habilitar();      
      $pt->setPosto($_POST['id']);
      $pt->setFuncionario($_POST['funcionario_id']);
      $pt->setDataValidade($_POST['data_validade']);            
      $pt->insert();       

    } catch(Exception $e){
      Erro::tratar($e);
    }  
    header('Location: lista.php');
    die();    
  endif;  
?>

<div class="row">
  <div class="col-md-12">
    <h2>Habilitar</h2>
  </div>
</div>

<form action="?" method="post">
  <div class="row">
    <div class="col-md-6 col-md-offset-3">      
      <div class="form-group">        
        <label for="nome">Posto</label>        
        <select class="form-control" name="id">
          <?php foreach($postos as $p): ?>
            <option value="<?=$p['id']?>"><?=$p['setor']?></option>
          <?php endforeach ?>  
        </select>
      </div>    
      <div class="form-group">        
        <label for="nome">Funcionário</label>        
        <select class="form-control" name="funcionario_id">
          <?php foreach($funcs as $f): ?>
            <option value="<?=$f['id']?>"><?=$f['nome']?></option>
          <?php endforeach ?>  
        </select>
      </div>    
      <div class="form-group">
        <label for="data_validade">Validade</label>
        <input type="date" id="data_validade" class="form-control" 
               name="data_validade" required/>        
      </div>  
      
      <input type="submit" class="btn btn-danger btn-block" 
             value="Habilitar"/>        
    </div>
  </div>   
</form>         
<?php require_once '../../views/rodape.php' ?>



