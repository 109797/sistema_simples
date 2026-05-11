<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Produto</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
        <header class="header-card">
            <div>
                <h1>Cadastrar Produto</h1>
                <p>Preencha os dados do produto e envie para salvar no banco de dados.</p>
            </div>
            <a class="btn btn-secondary" href="index.php">Voltar à Lista</a>
        </header>

        <div class="card form-card">
            <form action="inserir.php" method="post">
                <label for="nome">Nome</label>
                <input type="text" id="nome" name="nome" placeholder="Nome do produto" required>

                <label for="preco">Preço</label>
                <input type="number" step="0.01" id="preco" name="preco" placeholder="0,00" required>

                <label for="quantidade">Quantidade</label>
                <input type="number" id="quantidade" name="quantidade" placeholder="0" required>

                <button class="btn btn-primary" type="submit">Salvar Produto</button>
            </form>
        </div>
    </div>
</body>
</html>