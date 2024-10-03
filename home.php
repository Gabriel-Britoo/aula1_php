<?php
session_start();

$nome = $_SESSION['nome'];
$email = $_SESSION['email'];
$telefone = $_SESSION['telefone'];

include 'conexao.php';
$sql = "SELECT * FROM amigos";

$resultado = $conexao->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    <h1>Olá, <?php echo $nome; ?>!</h1>
    <p>Telefone: <?php echo $telefone; ?></p>
    <p>Email: <?php echo $email; ?></p>
    <a href="login.php">Entrar</a>
    <a href="index.php">Cadastre-se</a>

    <h2>Amizades</h2>
    <table>
        <thead>
            <tr>
                <th>Amigo</th>
                <th>Telefone</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            if ($resultado->num_rows > 0) {
                while ($amigo = $resultado->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $amigo['nome_amigo'] . "</td>";
                    echo "<td>" . $amigo['telefone_amigo'] . "</td>";
                }
            } else {
                echo "<tr><td colspan='2'>Você não tem amigos!</tr>";
            }
            ?>
        </tbody>
    </table>
</body>
</html>