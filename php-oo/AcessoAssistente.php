<?php

require_once 'Assistente.php';

class AcessaAssistente(){
	function imprimeAssistente(){
		$assistente = new Assistente();
		echo $assistente->getDDD();
		echo $assistente->nome;
		echo $assistente->getCpf();
		echo $assistente->getEndereco();
	}
}

?>
