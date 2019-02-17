<?php   
  require_once '../cabecalho.php';
  require_once '../../global.php';
  
  try{
    $dados = Habilitar::relacao();
  }catch(Exception $e){
    Erro::tratar($e);
  }      
?>

<div class="row">
  <div class="col-md-12">
    <h2>Relatório</h2>
  </div>
</div>

<div class="row">
  <div class="col-md-12">
    <?php if(count($dados) > 0) :?>
      <table class="table">
        <thead>
          <tr>                        
            <th>Nome</th> 
            <th>Posto</th>            
            <th>Cidade</th>          
            <th>Validade</th>
            <th>Excluir</th>
          </tr>
        </thead>               
        <tbody>
          <?php foreach ($dados as $d): ?>
            <tr>
              <td>
                <a href="/dados-detalhe.php" class="btn btn-link">
                  <?=$d['nome'] ?>                    
                </a>
              </td>            
              <td>
                <a href="/dados-detalhe.php" class="btn btn-link">
                  <?=($d['setor'])?>                    
                </a>
              </td>
              <td>
                <a href="/dados-detalhe.php" class="btn btn-link">
                  <?=$d['cidade'] ?>                    
                </a>
              </td>                            
              <td                
                <?=Helper::validaPosto($d['data_validade'],                  $d['cidade']) == true ? 
                                    "class='btn btn-warning'" : ''; ?>>
                <a href="/posto-detalhe.php" class="btn btn-link">
                  <?=date("d/m/Y", strtotime($d['data_validade']))?>
                </a>
              </td>
              <td>
                <a href="../../routes/habilitar/excluir.php?id=<?=$d['id'] ?>" class="btn btn-danger">Excluir
                </a>
              </td>              
            </tr>
          <?php endforeach ?>
        </tbody>
      </table>
    <?php else: ?>
      <p>Nenhum posto de trabalho ou funcionário está cadastrado</p>
    <?php endif ?>  
  </div>
</div>
<?php require_once '../rodape.php' ?>
