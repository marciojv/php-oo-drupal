<?php
class Usuario{

        //propriedades
	public    $nome;
	protected $cpf;
	private   $endereco;

	//método construtor da classe
	function Usuario(){
		$this->preparaUsuario();
	}

	function preparaUsuario(){
		$this->nome = "Marcio Vieira";
		$this->cpf = "226.424.229-02";
		$this->endereco = "Rua XV de Novembro, 123";
	}

	public function getCpf (){
		return $this->cpf;
	}

	public function getNome(){
		return $this->nome;
	}

	function getEndereco(){
		return $this->endereco;
	}

}
?>
