<?php
require_once 'Usuario.php';

$usuario = new Usuario();

echo $usuario->nome;
echo "\n";
echo $usuario->cpf;
echo "\n";
echo $usuario->endereco;
echo "\n";

?>
