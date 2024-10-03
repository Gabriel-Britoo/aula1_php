<?php
//Incluindo minha conexão com o banco de dados
include 'conexao.php';

//Verificar se os dados foram enviados com o metodo post
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    //Dados recebidos do <form>
    $nome = $_POST['nome'];
    $nasc = $_POST['nasc'];
    $tel = $_POST['tel'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $cpf = $_POST['cpf'];

    //Inserindo as informações no banco
    $sql = "INSERT INTO usuarios (nome_usuario,
    nasc_usuario,
    tel_usuario,
    email_usuario,
    senha_usuario,
    cpf_usuario) VALUES ('$nome', '$nasc', '$tel', '$email', '$senha', '$cpf')";

    //Executar query de inserção e verificar se foi bem sucedida
    if ($conexao-> query($sql) === true) {
        echo "<script>alert('Usuário cadastrado com sucesso!');</script>";
    } else {
        echo "<script>alert('Falha no cadastro!');</script>";
        echo "Erro: " . $conexao->error;
    }
    //Fechar a conexão
    $conexao->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Cadastrar</title>
</head>
<body>
    <h1>Cadastrar-se</h1>
    <form action="" method="post">
        <label for="nome">Nome: </label>
        <input type="text" name="nome" required>

        <label for="nasc">Nascimento: </label>
        <input type="date" name="nasc">

        <label for="tel">Telefone: </label>
        <input type="text" name="tel" required>

        <label for="email">Email: </label>
        <input type="email" name="email" required>

        <label for="cpf">CPF: </label>
        <input type="text" name="cpf" required>

        <label for="senha">Senha: </label>
        <input type="password" name="senha" required>

        <input type="submit" value="Cadastrar">
    </form>
    <p>Já tem uma conta? <a href="login.php">Entrar</a></p>
    <a href="home.php">Voltar para a página inicial</a>
</body>
</html>