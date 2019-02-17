<?php
require_once 'Conexao.php';

class Funcionario
{
  private $id;
  private $nome;
  private $data_nascimento;
  private $cidade;
  private $telefone;

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

  public function setNome($nome)
  {
    $this->nome = $nome;
  }

  public function getNome()
  {
    return $this->nome;
  }

  public function setDataNascimento($data_nascimento)
  {
    $this->data_nascimento = $data_nascimento;
  }

  public function getDataNascimento()
  {
    return $this->data_nascimento;
  }

  public function setCidade($cidade)
  {
    $this->cidade = $cidade;
  }

  public function getCidade()
  {
    return $this->cidade;
  }

  public function setTelefone($telefone)
  {
    $this->telefone = $telefone;
  }

  public function getTelefone()
  {
    return $this->telefone;
  }

  public function listar()
  {
    //throw new Exception("Erro na processamento lista ", 1);

    $query = "SELECT id, nome, data_nascimento, cidade, telefone
    FROM funcionarios";
    
    $resultado = Conexao::iniciar()->query($query); 
    $lista = $resultado->fetchAll(); 
    
    return $lista;
  }

  public function insert()
  {
    $query = 
    "INSERT INTO funcionarios (nome, data_nascimento, cidade, telefone)
     VALUES (:nome, :data_nascimento, :cidade, :telefone)";
   
    $conexao = Conexao::iniciar();
    $stmt = $conexao->prepare($query);
    $stmt->bindValue(':nome', $this->nome);    
    $stmt->bindValue(':data_nascimento', $this->data_nascimento);
    $stmt->bindValue(':cidade', $this->cidade);    
    $stmt->bindValue(':telefone', $this->telefone);    
    $stmt->execute();    
  }

  public function seek()
  {  
    $query = "SELECT nome, data_nascimento, cidade, telefone 
              FROM funcionarios 
              WHERE id = $this->id";
    
    $resultado = Conexao::iniciar()->query($query);
    $funcionarios =  $resultado->fetchAll();

    foreach($funcionarios as $f):      
      $this->nome = $f['nome'];
      $this->data_nascimento = $f['data_nascimento'];
      $this->cidade = $f['cidade'];
      $this->telefone = $f['telefone'];
    endforeach;    
  }  

  public function update()
  {
    $query = "UPDATE funcionarios 
              set nome = :nome,
              data_nascimento = :data_nascimento,
              cidade = :cidade,
              telefone = :telefone
             WHERE id = :id";
    
    $conexao = Conexao::iniciar();         
    $stmt = $conexao->prepare($query);
    $stmt->bindValue(':nome', $this->nome);
    $stmt->bindValue(':data_nascimento', $this->data_nascimento);
    $stmt->bindValue(':cidade', $this->cidade);
    $stmt->bindValue(':telefone', $this->telefone);    
    $stmt->bindValue(':id', $this->id);
    $stmt->execute();
  }

  public function delete()
  {
    $query = "DELETE FROM funcionarios WHERE id = ".$this->id;
    Conexao::iniciar()->exec($query);
  }

  public static function lista()
  {
    $query = 
    "SELECT id, nome FROM funcionarios";      

    $conexao = Conexao::iniciar();
    $resultado = $conexao->query($query);
    $dados = $resultado->fetchAll();
    
    return $dados;
  }

}