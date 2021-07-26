<?php
class Usuario{

        //propriedades
	public $nome;
	public $cpf;
	public $endereco;

	//método construtor da classe
	function Usuario(){
		$this->preparaUsuario();
	}

	function preparaUsuario(){
		$this->nome = "Marcio Vieira";
		$this->cpf = "226.424.229-02";
		$this->endereco = "Rua XV de Novembro, 123";
	}

}
?>
