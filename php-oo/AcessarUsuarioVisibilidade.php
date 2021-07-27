<?php

require_once 'Usuario.php';

class AcessaUsuarioVisibilidade{

	function imprimeUsuario(){
		$usuario = new Usuario;
		echo $usuario->nome;
		echo $usuario->cpf;
		echo $usuario->endereco;
	}

}

$testClass = new AcessaUsuarioVisibilidade();
$testClass->imprimeUsuario();

?>
