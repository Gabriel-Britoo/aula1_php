<?php
session_start();

include 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $sql = "SELECT email_usuario, senha_usuario, nome_usuario, tel_usuario FROM usuarios WHERE email_usuario = '$email'";

    $resultado = $conexao->query($sql);

    if($resultado->num_rows == 1) {
        $tupla = $resultado->fetch_assoc();
        
        $senha_bd = $tupla['senha_usuario'];
        $_SESSION['nome'] = $tupla['nome_usuario'];
        $_SESSION['telefone'] = $tupla['tel_usuario'];
        $_SESSION['email'] = $tupla['email_usuario'];

        if ($senha == $senha_bd) {
            header("Location: home.php");
        } else {
            header("Location: login.php");
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Entrar</title>
</head>
<body>
    <h1>Efetuar login</h1>
    <form action="" method="post">
        <label for="email">Email: </label>
        <input type="email" name="email" required>

        <label for="senha">Senha: </label>
        <input type="password" name="senha" required>

        <input type="submit" value="Entrar">
    </form>
    <p>Não tem uma conta? <a href="index.php">Cadastre-se</a></p>
    <a href="home.php">Voltar para a página inicial</a>
</body>
</html>