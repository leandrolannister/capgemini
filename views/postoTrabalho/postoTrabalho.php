<?php   
  require_once '../cabecalho.php';
  require_once '../../global.php';
  
  try{
    $pt = new PostoTrabalho();
    $postos = $pt->listar();      
  }catch(Exception $e){
    Erro::tratar($e);
  }  
?>

<div class="row">
  <div class="col-md-12">
    <h2>Posto Trabalho</h2>
  </div>
</div>

<div class="row">
  <div class="col-md-4">
    <a href="../../routes/funcPosto/criar.php" class="btn btn-info btn-block">
      Crair 
    </a>
  </div>
</div>

<div class="row">
  <div class="col-md-12">
    <?php if(count($postos) > 0) :?>
      <table class="table">
        <thead>
          <tr>
            <th>Id</th>
            <th>Setor</th>
            <th>Nome</th>            
            <th>Tipo</th>
            <th class="acao">Editar</th>
            <th class="acao">Excluir</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($postos as $p): ?>
            <tr>
              <td>
                <a href="/posto-detalhe.php" class="btn btn-link">
                  <?=$p['id'] ?>                    
                </a>
              </td>
              <td>
                <a href="/posto-detalhe.php" class="btn btn-link">
                  <?=$p['setor'] ?>                    
                </a>
              </td>
              <td>
                <a href="/posto-detalhe.php" class="btn btn-link">
                  <?=$p['nome'] ?>                    
                </a>
              </td>              
              <td>
                <a href="/posto-detalhe.php" class="btn btn-link">
                  <?=$p['tipo'] ?>                    
                </a>
              </td>
              <td>
                <a href="../../routes/postoTrabalho/editar.php?id=<?=$p['id'] ?>" class="btn btn-info">Editar
                </a>
              </td>
              <td>
                <a href="../../routes/postoTrabalho/excluir.php?id=<?=$p['id'] ?>" class="btn btn-danger">Excluir
                </a>
              </td>
            </tr>
          <?php endforeach ?>
        </tbody>
      </table>
    <?php else: ?>
      <p>Nenhum posto está cadastrado</p>
    <?php endif ?>  
  </div>
</div>
<?php require_once '../rodape.php' ?>
