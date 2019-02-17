<?php 
  require_once '../../views/cabecalho.php';
  require_once '../../global.php';  
  
  try{
    $funcionario = new Funcionario();
    $funcionarios = $funcionario->listar();      
  }catch(Exception $e){
    Erro::tratar($e);
  }  
?>  

<div class="row">
  <div class="col-md-12">
    <h2>Funcionário</h2>
  </div>
</div>

<div class="row">
  <div class="col-md-4">
    <a href="../../routes/funcionario/criar.php" class="btn btn-info btn-block">
      Crair 
    </a>
  </div>
</div>

<div class="row">
  <div class="col-md-12">
    <?php if(count($funcionarios) > 0) :?>
      <table class="table">
        <thead>
          <tr>
            <th>id</th>
            <th>Nome</th>
            <th>Data Nascimento</th>            
            <th>Cidade</th>
            <th>telefone</th>            
            <th class="acao">Editar</th>
            <th class="acao">Excluir</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($funcionarios as $f): ?>
            <tr>
              <td>
                <a href="/posto-detalhe.php" class="btn btn-link">
                  <?=$f['id']?>                    
                </a>
              </td>
              <td>
                <a href="/funcionario-detalhe.php" class="btn btn-link">
                  <?=$f['nome']?>                    
                </a>
              </td>
              <td>
                <a href="/funcionario-detalhe.php" class="btn btn-link">
                  <?= date("d/m/Y", strtotime($f['data_nascimento'])) ?>                    
                </a>
              </td>
              <td>
                <a href="/funcionario-detalhe.php" class="btn btn-link">
                  <?=$f['cidade'] ?>                    
                </a>
              </td>
              <td>
                <a href="/funcionario-detalhe.php" class="btn btn-link">
                  <?=$f['telefone']?>                     
                </a>
              </td>                            
              <td>
                <a href="../../routes/funcionario/editar.php?id=<?=$f['id'] ?>" class="btn btn-info">Editar
                </a>
              </td>
              <td>
                <a href="../../routes/postoTrabalho/excluir.php?id=<?=$f['id'] ?>" class="btn btn-danger">Excluir
                </a>
              </td>
            </tr>
          <?php endforeach ?>
        </tbody>
      </table>
    <?php else: ?>
      <p>Nenhum funcionário está cadastrado</p>
    <?php endif ?>  
  </div>
</div>
<?php require_once '../rodape.php' ?>
  
?>