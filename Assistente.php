<?php 

require_once 'Usuario.php';

class Assistente extends Usuario{
	protected $ddd;

	function Assistente (){
		parent::Usuario();
		$this->ddd = '041';
	}

	public function getDDD(){
		return $this->ddd;
	}

}

?>
