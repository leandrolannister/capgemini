<?php 
  require_once '../../views/cabecalho.php';  
  require_once '../../global.php';  

  try{
    if(isset($_GET['id'])):
      $pt = new PostoTrabalho($_GET['id']);  
      $pt->seek(); 
    endif;   
  }catch(Exception $e){
    Erro::Tratar($e);
    exit;
  }  

  if(isset($_POST['setor'])):
    $pt = new PostoTrabalho();
    $pt->setId($_POST['id']);
    $pt->setSetor($_POST['setor']);
    $pt->setNome($_POST['nome']);
    $pt->setTipo($_POST['tipo']);
    $pt->update();    
    
    header('location: http://localhost/capgemini/views/postoTrabalho/postoTrabalho.php');
    die();
  endif;
?>

<div class="row">
  <div class="col-md-12">
    <h2>Editar Postos</h2>
  </div>
</div>
<form action="?" method="post">
  <div class="row">
    <div class="col-md-6 col-md-offset-3">
      <input type="hidden" name="id" value="<?=$pt->getId()?>">

      <div class="form-group">        
        <label for="setor">Setor</label>
        <input name="setor" type="text" id="setor" class="form-control" 
               value="<?=$pt->getSetor()?>"
               required maxlength="70"       
               placeholder="Nome do Setor"
               autofocus/>
      </div>  
      
      <div class="form-group">        
        <label for="nome">Nome</label>
        <input type="text" value="<?=$pt->getNome()?>" 
               class="form-control" 
                placeholder="Nome do Posto de Trabalho" name="nome">
      </div>

      <div class="form-group">        
        <label for="tipo">Tipo</label>
        <input name="tipo" type="text" id="tipo" class="form-control" 
               required maxlength="70" 
               value="<?=$pt->getTipo()?>"      
               placeholder="Tipo do Posto de Trabalho"
               autofocus/>
      </div>  
      <input type="submit" class="btn btn-primary btn-block" value="EDITAR">
    </div>
 </div>
</form>
<script type="text/javascript" src="../../public/js/valid/postoTrabalho.js">
</script>  
<?php require_once '../../views/rodape.php' ?>
