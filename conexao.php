<?php
// Criando conexão com o banco de dados PHP MyAdmin
$conexao = new mysqli("localhost", "root", "", "aula_php");

// Verifica se a conexão com o banco foi bem sucedida
if ($conexao-> connect_error) {
    die("Erro de conexão - Número do erro: ". $conexao->connect_errno . "Tipo do erro: " . $conexao-> connect_error);
}
?>