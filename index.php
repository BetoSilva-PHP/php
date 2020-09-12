<?php

require_once("config.php");

/*Mostra todos
$sql = new Sql();

$usuarios = $sql->select("SELECT * FROM users");

echo json_encode($usuarios); */

/*
$root->loadById(3);

echo json_encode($root);*/

/*Lsta todos os usuários
$lista = Usuario::getList();

echo json_encode($lista);*/

/*Busca usuário
$search = Usuario::search("Gil");
echo json_encode($search);*/

//login e senha
$usuario = new Usuario();
$usuario->login("cesar", "123");

echo $usuario;

?>