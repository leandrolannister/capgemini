<?php 
  require_once '../../views/cabecalho.php';  
  require_once '../../global.php';  

  try{
    if(isset($_GET['id'])):
      $f = new Funcionario($_GET['id']);  
      $f->seek(); 
    endif;   
  }catch(Exception $e){
    Erro::TrataErro($e);
    exit;
  }  

  if(isset($_POST['nome'])):
    $funcionario = new Funcionario();
    $funcionario->setId($_POST['id']);
    $funcionario->setNome($_POST['nome']);
    $funcionario->setDataNascimento($_POST['data_nascimento']);
    $funcionario->setCidade($_POST['cidade']);
    $funcionario->setTelefone($_POST['telefone']);              
    $funcionario->update();
    
    header('location: http://localhost/capgemini/views/funcionario/funcionario.php');
    die();
  endif;

?>

<div class="row">
  <div class="col-md-12">
    <h2>Editar Funcionário</h2>
  </div>
</div>
<form action="?" method="post">
  <div class="row">
    <div class="col-md-6 col-md-offset-3">
      <input type="hidden" name="id" value="<?=$f->getId()?>">
      
      <div class="form-group">        
        <label for="nome">Nome</label>
        <input type="text" value="<?=$f->getNome()?>" 
               class="form-control" 
               placeholder="Nome do Funcionário" name="nome">
      </div>

      <div class="form-group">
        <label for="data_nascimento">Data Nascimento</label>
        <input type="date" id="data_nascimento" class="form-control" 
               name="data_nascimento" value="<?=$f->getDataNascimento()?>"
               required/>        
      </div>

      <div class="form-group">
        <label for="cidade">Cidade</label>
        <input type="text" id="cidade" class="form-control" 
               required minlength="3" maxlength="70"   
               name="cidade" placeholder="Nome da Cidade"
               value="<?=$f->getCidade()?>"/>
      </div>

      <div class="form-group">
        <label for="telefone">Telefone</label>
        <input type="text" name="telefone" class="form-control" 
               id="telefone"  inlength="14" maxlength="15" required 
               placeholder="(99)99999-9999"          
               pattern="\([0-9]{2}\)[\s][0-9]{4,5}-[0-9]{4}"      
               onkeyup="mascaraTelefone();"
               value="<?=$f->getTelefone()?>"/>
      </div>      
      <input type="submit" class="btn btn-primary btn-block" value="EDITAR">
    </div>
 </div>
</form>
<script type="text/javascript" src="../../public/js/mask/telefone.js">
</script>  
<script type="text/javascript" src="../../public/js/valid/validacoes.js">
</script>  
<?php require_once '../../views/rodape.php' ?>
