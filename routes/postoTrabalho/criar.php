<?php 
  require_once '../../views/cabecalho.php';
  require_once '../../global.php';  
  
  if(isset($_POST['nome'])):
    try{
      $pt = new PostoTrabalho();
      $pt->setSetor($_POST['setor']);
      $pt->setNome($_POST['nome']);
      $pt->setTipo($_POST['tipo']);
      $pt->insert(); 
    } catch(Exception $e){
      Erro::tratar($e);
    }  
    header('Location: http://localhost/capgemini/views/postoTrabalho/postoTrabalho.php');
    die();    
  endif;  
?>

<div class="row">
  <div class="col-md-12">
    <h2>Criar novo Posto</h2>
  </div>
</div>
<form action="?" method="post">
  <div class="row">
    <div class="col-md-6 col-md-offset-3">      
      <div class="form-group">        
        <label for="setor">Setor</label>
        <input name="setor" type="text" id="setor" class="form-control" 
               required maxlength="70"       
               placeholder="Nome do Setor"
               autofocus/>
      </div>            

      <div class="form-group">        
        <label for="nome">Nome</label>
        <input name="nome" type="text" id="nome" class="form-control" 
               required minlength="3" maxlength="70"       
               placeholder="Nome do Posto de Trabalho"
               autofocus/>
      </div>            

      <div class="form-group">        
        <label for="tipo">Tipo</label>
        <input name="tipo" type="text" id="tipo" class="form-control" 
               required maxlength="70"       
               placeholder="Tipo do Posto de Trabalho"
               autofocus/>
      </div>            
      
      <input type="submit" class="btn btn-success btn-block" 
             value="Salvar"/>        
    </div>
  </div>   
</form>         
<script type="text/javascript" src="../../public/js/valid/postoTrabalho.js">
</script>  

<?php require_once '../../views/rodape.php' ?>

