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

			$row = $results[0];

			$this->setId($row['id']);
			$this->setName($row['name']);
			$this->setEmail($row['email']);
			$this->setWhatsapp($row['whatsapp']);
			$this->setUsername($row['username']);
			$this->setPassword($row['password']);
			$this->setCreated($row['created']);
		}


	}

	/*public function __toString(){

		return json_encode(array(
			"id"=>$this->getId(),
			"name"=>$this->getName(),
			"email"=>$this->getEmail(),
			"whatsapp"=>$this->getWhatsapp(),
			"username"=>$this->getUsername(),
			"password"=>$this->getPassword(),
			"created"=>$this->getCreated()->format("d/m/y H:i:s")

		));
	}*/


}


?>
