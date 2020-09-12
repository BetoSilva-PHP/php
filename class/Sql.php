<?php

/*
	Sql herda tudo de PDO: 
	Tudo que a classe nativa PDO já faz a classe Sql fará também.
*/

class Sql extends PDO {

	private $conn; //variável de conexão.

	// Quando eu instaciar esta classe eu quero conectar direto no banco de dados.
	
	public function __construct(){
		
		//Passando as informações da conexão
		
		$this->conn =  new PDO("mysql:host=localhost;dbname=celke","root","");
	}

	//Vários parametros

	private function setParams($statement, $parameters = array()){

		foreach ($parameters as $key => $value) {
			
			$this->setParam($statement, $key, $value);
		}
	}


	//Um parametro

	private function setParam($statement, $key, $value){

		$statement->bindParam($key, $value);
	}

	//Metodo para executar os comandos 
	public function query($rawQuery, $params = array()){

		//stmt vatiável que funciona dentro do método
		
		$stmt = $this->conn->prepare($rawQuery);

		//Chamando a função setPatams

		$this->setParams($stmt, $params);

		$stmt->execute();

		return $stmt;
		
	}

	public function select($rawQuery, $params = array()){

		$stmt = $this->query($rawQuery, $params);

		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}

}



/*

Sinopse da classe PDO:

PDO {
public __construct ( string $dsn [, string $username [, string $passwd [, array $options ]]] )
public beginTransaction ( void ) : bool
public commit ( void ) : bool
public errorCode ( void ) : string
public errorInfo ( void ) : array
public exec ( string $statement ) : int
public getAttribute ( int $attribute ) : mixed
public static getAvailableDrivers ( void ) : array
public inTransaction ( void ) : bool
public lastInsertId ([ string $name = NULL ] ) : string
public prepare ( string $statement [, array $driver_options = array() ] ) : PDOStatement
public query ( string $statement ) : PDOStatement
public quote ( string $string [, int $parameter_type = PDO::PARAM_STR ] ) : string
public rollBack ( void ) : bool
public setAttribute ( int $attribute , mixed $value ) : bool
}

Índice da Class PDO

PDO::beginTransaction — Inicia uma transação

Desativa o modo de envio automático. Enquanto o modo de envio automático estiver desativado, modificações feitas no banco de dados por meio da instância do objeto PDO não serão enviadas até que você finalize a transação chamando PDO::commit(). Chamar PDO::rollBack() reverterá todas as alterações no banco de dados e retornará a conexão para o modo de envio automático.

PDO::commit — Envia uma transação

Envia uma transação, retornando a conexão com o banco de dados para o modo de envio automático até que a próxima chamada para PDO::beginTransaction() inicie uma nova transação.

PDO::__construct 

Cria uma instância PDO que representa uma conexão a um banco de dados

public PDO::__construct ( string $dsn [, string $username [, string $passwd [, array $options ]]] )

PDO::errorCode — Busque o SQLSTATE associado à última operação no identificador do banco de dados

Só recupera códigos de erro para operações realizadas diretamente no identificador do banco de dados. Se você criar um objeto PDOStatement por meio de PDO :: prepare () ou PDO :: query () e invocar um erro no identificador de instrução, PDO :: errorCode () não refletirá esse erro. Você deve chamar PDOStatement :: errorCode () para retornar o código de erro para uma operação executada em um identificador de instrução específico.

PDO::errorInfo

Obter informações de erro estendidas associadas à última operação no identificador do banco de dados
Retorna uma matriz de informações de erro sobre a última operação executada por este identificador de banco de dados. A matriz consiste em pelo menos os seguintes campos:

Informação do Elemento

0 Código de erro SQLSTATE (um identificador alfanumérico de cinco caracteres definido no padrão ANSI SQL).
1 Código de erro específico do driver.
2 Mensagem de erro específica do driver.

PDO::exec — Executa uma instrução SQL e retornar o número de linhas afetadas

Não retorna resultados de uma instrução SELECT. Para uma instrução SELECT que você só precisa emitir uma vez durante seu programa, considere a emissão de PDO::query(). Para uma instrução que você precisa emitir várias vezes, prepare um objeto PDOStatement com PDO::prepare() e emita a instrução com PDOStatement::execute().

PDO::getAttribute — Recuperar um atributo da conexão com o banco de dados

Esta função retorna o valor de um atributo da conexão com o banco de dados. Para recuperar atributos de PDOStatement consulte PDOStatement::getAttribute().

PDO::getAvailableDrivers — Retorna um array com os drivers PDO disponíveis

Esta função retorna todos os drivers PDO disponíveis que podem ser usados no parâmetro DSN de PDO::__construct().

PDO::inTransaction — Verifica se está dentro de uma transação

Verifica se uma transação está atualmente ativa no driver. Este método funciona apenas para drivers de banco de dados que oferecem suporte a transações.

PDO::lastInsertId — Retorna o ID da última linha inserida ou valor de sequência

PDO::prepare — Prepara uma instrução para execução e retorna um objeto de instrução

public PDO::prepare ( string $statement [, array $driver_options = array() ] ) : PDOStatement

PDO::query — Executa uma instrução SQL, retornando um conjunto de resultados como um objeto PDOStatement

PDO::quote — Cita uma string para uso em uma consulta

PDO::rollBack — Reverte uma transação

PDO::setAttribute — Defina um atributo

*/
?>