<?php 
  require_once '../../views/cabecalho.php';
  require_once '../../global.php';  
  
  if(isset($_POST['nome'])):
    try{
      $funcionario = new Funcionario();
      $funcionario->setNome($_POST['nome']);
      $funcionario->setDataNascimento($_POST['data_nascimento']);
      $funcionario->setCidade($_POST['cidade']);
      $funcionario->setTelefone($_POST['telefone']);      
      $funcionario->insert(); 
    } catch(Exception $e){
      Erro::tratar($e);
    }  
    header('Location: http://localhost/capgemini/views/funcionario/funcionario.php');
    die();    
  endif;  
?>

<div class="row">
  <div class="col-md-12">
    <h2>Criar novo Funcionário</h2>
  </div>
</div>

<form action="?" method="post">
  <div class="row">
    <div class="col-md-6 col-md-offset-3">      
      <div class="form-group">        
        <label for="nome">Nome</label>
        <input name="nome" type="text" id="nome" class="form-control" 
               required minlength="3" maxlength="70"       
               placeholder="Nome do Funcionário"
               autofocus/>
      </div>            

      <div class="form-group">
        <label for="data_nascimento">Data Nascimento</label>
        <input type="date" id="data_nascimento" class="form-control" 
               name="data_nascimento" required/>        
      </div>

      <div class="form-group">
        <label for="cidade">Cidade</label>
        <input type="text" id="cidade" class="form-control" 
               required minlength="3" maxlength="70"   
               name="cidade" placeholder="Nome da Cidade"/>
      </div>

      <div class="form-group">
        <label for="telefone">Telefone</label>
        <input type="text" name="telefone" class="form-control" 
               id="telefone"  inlength="14" maxlength="15" required 
               placeholder="(99)99999-9999"          
               pattern="\([0-9]{2}\)[\s][0-9]{4,5}-[0-9]{4}"      
               onkeyup="mascaraTelefone();"/>
      </div>
      <input type="submit" class="btn btn-success btn-block" 
             value="Salvar"/>        
    </div>
  </div>   
</form>         
<script type="text/javascript" src="../../public/js/mask/telefone.js">
</script>  
<script type="text/javascript" src="../../public/js/valid/funcionarios.js">
</script>  

<?php require_once '../../views/rodape.php' ?>

