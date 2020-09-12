<?php

class Usuario{

	private $id;
	private $name;
	private $email;
	private $whatsapp;
	private $username;
	private $password;
	private $created;

	//1. GET & SET ID do usuário

	public function getId(){

		return $this->id;
	}

	public function setId($valeu){

		$this->id = $valeu;
	}

	//2. GET & SET Nome do usuário

	public function getName(){

		return $this->name;
	}

	public function setName($valeu){

		$this->name = $valeu;
	}

	//3. GET & SET Email do usuário

	public function getEmail(){

		return $this->email;
	}

	public function setEmail($valeu){

		$this->email = $valeu;
	}

	//4. GET & SET Whatsapp do usuário

	public function getWhatsapp(){

		return $this->whatsapp;
	}

	public function setWhatsapp($valeu){

		$this->whatsapp = $valeu;
	}

	//5. GET & SET Login do usuário

	public function getUsername(){

		return $this->username;
	}

	public function setUsername($valeu){

		$this->username = $valeu;
	}

	//6. GET & SET Password do usuário

	public function getPassword(){

		return $this->password;
	}

	public function setPassword($valeu){

		$this->password = $valeu;
	}

	//7. GET & SET Data de criação do cadastro do usuário

	public function getCreated(){

		return $this->created;
	}

	public function setCreated($valeu){

		$this->created = $valeu;
	}


	//setData
	
	public function setData($data){

		$this->setId($data['id']);
		$this->setName($data['name']);
		$this->setEmail($data['email']);
		$this->setWhatsapp($data['whatsapp']);
		$this->setUsername($data['username']);
		$this->setPassword($data['password']);
		$this->setCreated(new DateTime($data['created']));

	}
	
	//Lendo pelo ID

	public function loadById($id){

		$sql = new Sql();

		$results = $sql->select("SELECT *FROM users WHERE id = :ID", array(
			":ID" => $id
		));

		//Usando isset
		//if (isset($results[0]));

		//Usando count
		if (count($results) > 0){

			$this-setData($results[0]);		
		}
	}

	//getList

	public static function getList(){

		$sql = new Sql();

		return $sql->select("SELECT * FROM users ORDER BY name;");
	}

	//Busca por nome

	public static function search($login){

		$sql = new Sql();

		return $sql->select("SELECT * FROM users WHERE name LIKE :SEARCH ORDER BY name", array(
				'SEARCH'=>"%".$login."%"
		));
	}

	//Busca usuário autenticado
	public function login($login, $password){

		$sql = new Sql();

		$results = $sql->select("SELECT *FROM users WHERE name = :LOGIN AND password = :PASSWORD", array(
			":LOGIN" => $login,
			":PASSWORD" => $password
		));

		if (count($results) > 0){

			$this-setData($results[0]);

		} else {

			throw new Exception("Login ou senha invalidos");
			
		}

	}


	//Inserir usuário.

	public function insert(){

		$sql = new Sql();

		$results = $sql->select("CALL sp_usuarios_insert(:LOGIN, :PASSWORD)", array(
				':LOGIN'=>$this->getName(),
				':PASSWORD'=>$this->getPassword()
		));

		if(count($results) > 0){

			$this->setData($results[0]);
		}
	}

	
	

}


?>
