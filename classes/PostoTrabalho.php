<?php 

  class PostoTrabalho{
    private $id;
    private $setor;
    private $nome;
    private $tipo;    
    private $data_validade;
    private $funcionario_id;

    function __construct($id = false){
      if($id):
        $this->id = $id;  
      endif;  
    }

    public function setId($id)
    {
      $this->id = $id;
    }

    public function getId()
    {
      return $this->id;
    }

    public function setSetor($setor)
    {
      $this->setor = $setor;
    }

    public function getSetor()
    {
      return $this->setor;
    }

    public function setNome($nome)
    {
      $this->nome = $nome;
    }

    public function getNome()
    {
      return $this->nome;
    }

    public function setTipo($tipo)
    {
      $this->tipo = $tipo;
    }

    public function getTipo()
    {
      return $this->tipo;
    }

    public function setDataValidade($data_validade)
    {
      $this->data_validade = $data_validade;
    }

    public function getDataValidade()
    {
      return $this->data_validade;
    }    

    public function setFuncionario($funcionario_id)
    {
      $this->funcionario_id = $funcionario_id;
    }

    public function getFuncionario()
    {
      return $this->funcionario_id;
    }

    public function listar()
    {
    
      $query = "SELECT id, setor, nome, tipo
      FROM postosTrabalho";
    
      $resultado = Conexao::iniciar()->query($query); 
      $lista = $resultado->fetchAll(); 
    
      return $lista;
    }

    public function insert()
    {
      $query = 
      "INSERT INTO postosTrabalho (setor, nome, tipo)
       VALUES (:setor, :nome, :tipo)";
   
      $conexao = Conexao::iniciar();
      $stmt = $conexao->prepare($query);
      $stmt->bindValue(':setor', $this->setor);
      $stmt->bindValue(':nome', $this->nome);    
      $stmt->bindValue(':tipo', $this->tipo);    
      $stmt->execute();    
    } 

    public function seek()
    {  
      $query = "SELECT setor, nome, tipo 
                FROM postosTrabalho 
                WHERE id = $this->id";
    
      $resultado = Conexao::iniciar()->query($query);
      $postos =  $resultado->fetchAll();

      foreach($postos as $p):      
        $this->setor = $p['setor'];
        $this->nome = $p['nome'];      
        $this->tipo = $p['tipo'];
      endforeach;    
  }

  public function update()
  {
    $query = "UPDATE postosTrabalho 
              SET setor = :setor,
                nome = :nome,
                tipo = :tipo              
              WHERE id = :id";
    
    $conexao = Conexao::iniciar();         
    $stmt = $conexao->prepare($query);
    $stmt->bindValue(':setor', $this->setor);
    $stmt->bindValue(':nome', $this->nome);
    $stmt->bindValue(':tipo', $this->tipo);
    $stmt->bindValue(':id', $this->id);
    $stmt->execute();
  }

  public function delete()
  {
    $query = "DELETE FROM postosTrabalho WHERE id = ".$this->id;
    Conexao::iniciar()->exec($query);
  }

  public static function lista()
  {
    $query = 
    "SELECT id, setor FROM postosTrabalho";      

    $conexao = Conexao::iniciar();
    $resultado = $conexao->query($query);
    $dados = $resultado->fetchAll();
    
    return $dados;
  }
}