1:Os atributos são:
id, nome, cpf, email, senha, idCargo e dataIngresso;

2: $lista = new Funcionario();
$lista->setid(100);
$lista->setnome('Leandro');
$lista->setcpf(22560961823);
$lista->setemail('leandrohendrix@gmail.com');
$lista->setsenha('h12e0jop');
$lista->setCargo('Programador Web');
$lista->setdataIngresso('01-01-2017');

2: $lista = new Funcionario();
$lista->setid(101);
$lista->setnome('Soares');
$lista->setcpf(22560961883);
$lista->setemail('soaresLima@gmail.com');
$lista->setsenha('2368hy#');
$lista->setCargo('Analista contábil');
$lista->setdataIngresso('31-12-2018');

3: 
public function lista()
{    

    $query = "SELECT * FROM funcionarios where dataIngresso > 01/01/2018";
    
    $resultado = Conexao::iniciar()->query($query); 
    $lista = $resultado->fetchAll(); 
    
    return $lista;
}
$funcionario = new Funcionario();
$funcionarios = $funcionario->lista();    

foreach($funcionarios as $f):
  echo $f;
endforeach; 

4: 
Public: permite que todos acessarem um determinado atributo ou método.

Protected: métodos e atributos sejam acessados apenas dentro
da pópria classe e, em classes filhas.

Private: acesso é permitido apenas dos atributos e métodos
de dentro da classe.



