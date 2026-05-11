<?php
include 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: cadastro.php');
    exit;
}

$nome = trim($_POST['nome'] ?? '');
$preco = trim($_POST['preco'] ?? '');
$quantidade = trim($_POST['quantidade'] ?? '');

$nome = mysqli_real_escape_string($conn, $nome);
$preco = mysqli_real_escape_string($conn, $preco);
$quantidade = mysqli_real_escape_string($conn, $quantidade);

$mensagem = '';
$sucesso = false;

if ($nome === '' || $preco === '' || $quantidade === '') {
    $mensagem = 'Por favor, preencha todos os campos corretamente.';
} elseif (!is_numeric($preco) || !is_numeric($quantidade)) {
    $mensagem = 'Preço e quantidade devem ser valores numéricos.';
} else {
    $preco = number_format((float) $preco, 2, '.', '');
    $quantidade = (int) $quantidade;

    $sql = "INSERT INTO produtos (nome, preco, quantidade) VALUES ('$nome', '$preco', '$quantidade')";
    if (mysqli_query($conn, $sql)) {
        $mensagem = 'Produto cadastrado com sucesso!';
        $sucesso = true;
    } else {
        $mensagem = 'Erro ao cadastrar o produto: ' . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inserir Produto</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
        <div class="card message-card">
            <h1><?php echo $sucesso ? 'Sucesso!' : 'Atenção'; ?></h1>
            <p><?php echo htmlspecialchars($mensagem, ENT_QUOTES, 'UTF-8'); ?></p>
            <div class="button-group">
                <a class="btn btn-primary" href="cadastro.php">Voltar ao Cadastro</a>
                <a class="btn btn-secondary" href="index.php">Ver Lista</a>
            </div>
        </div>
    </div>
</body>
</html>