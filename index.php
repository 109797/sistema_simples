<?php
include 'conexao.php';

$sql = "SELECT * FROM produtos ORDER BY id DESC";
$result = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Produtos</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
        <header class="header-card">
            <div>
                <h1>Produtos Cadastrados</h1>
                <p>Visualize todos os produtos adicionados ao sistema.</p>
            </div>
            <a class="btn btn-primary" href="cadastro.php">Cadastrar Produto</a>
        </header>

        <div class="card">
            <?php if ($result && mysqli_num_rows($result) > 0): ?>
                <div class="table-wrapper">
                    <table>
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nome</th>
                                <th>Preço (R$)</th>
                                <th>Quantidade</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($row = mysqli_fetch_assoc($result)): ?>
                                <tr>
                                    <td><?php echo $row['id']; ?></td>
                                    <td><?php echo htmlspecialchars($row['nome'], ENT_QUOTES, 'UTF-8'); ?></td>
                                    <td><?php echo number_format($row['preco'], 2, ',', '.'); ?></td>
                                    <td><?php echo $row['quantidade']; ?></td>
                                </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                </div>
            <?php else: ?>
                <p class="empty-state">Nenhum produto cadastrado ainda. Clique em "Cadastrar Produto" para iniciar.</p>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>