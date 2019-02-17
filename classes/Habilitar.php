<?php 

  class Habilitar{
    private $id;
    private $funcionario_id;
    private $posto_id;    
    private $data_validade;    

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

    public function setFuncionario($funcionario_id)
    {
      $this->funcionario_id = $funcionario_id;
    }

    public function getFuncionario()
    {
      return $this->funcionario_id;
    }

    public function setPosto($posto_id)
    {
      $this->posto_id = $posto_id;
    }

    public function getPosto()
    {
      return $this->posto_id;
    }     

    public function setDataValidade($data_validade)
    {
      $this->data_validade = $data_validade;
    }

    public function getDataValidade()
    {
      return $this->data_validade;
    } 

    public function insert()
    {
      $query = "UPDATE postosTrabalho 
                SET funcionario_id = :funcionario_id,
                data_validade = :data_validade              
                WHERE id = :id";     
  
     $query = 
      "INSERT INTO habilitar (funcionario_id, posto_id, data_validade)
      VALUES (:funcionario_id, :posto_id, :data_validade)";
   
     $conexao = Conexao::iniciar();
     $stmt = $conexao->prepare($query);
     $stmt->bindValue(':funcionario_id', $this->funcionario_id);    
     $stmt->bindValue(':posto_id', $this->posto_id);
     $stmt->bindValue(':data_validade', $this->data_validade);        
     $stmt->execute();    
  }   

  public static function relacao()
  {
    $query = 
    "SELECT
       distinct h.id, f.nome, p.setor, p.nome as cidade, h.data_validade
     FROM habilitar AS h

     INNER JOIN postosTrabalho AS p
     ON p.id = h.posto_id 

     INNER JOIN funcionarios AS f
     ON f.id = h.funcionario_id"; 

    $resultado = Conexao::iniciar()->query($query); 
    $lista = $resultado->fetchAll(); 
    
    return $lista;
  }

  public function delete()
  {
    $query = "DELETE FROM habilitar WHERE id = ".$this->id;
    Conexao::iniciar()->exec($query);
  }
}