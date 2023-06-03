<?php
// Conexão com o banco de dados
$conn = new mysqli("localhost", "seu_usuario", "sua_senha", "sistema_vendas");

// Verificação de erros na conexão
if ($conn->connect_error) {
    die("Erro na conexão com o banco de dados: " . $conn->connect_error);
}

// Processamento do formulário de venda
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $clienteId = $_POST['cliente_id'];
    $produtoId = $_POST['produto_id'];
    $quantidade = $_POST['quantidade'];

    // Consulta para obter o cliente selecionado
    $sql = "SELECT * FROM clientes WHERE idCliente = $clienteId";
    $result = $conn->query($sql);
    $cliente = $result->fetch_assoc();

    // Consulta para obter o produto selecionado
    $sql = "SELECT * FROM produtos WHERE id = $produtoId";
    $result = $conn->query($sql);
    $produto = $result->fetch_assoc();

    if ($cliente && $produto) {
        // Verifica se há estoque suficiente
        if ($quantidade <= $produto['estoque']) {
            // Calcula o valor total da venda
            $valorTotal = $produto['preco'] * $quantidade;

            // Atualiza o estoque do produto
            $novoEstoque = $produto['estoque'] - $quantidade;
            $sql = "UPDATE produtos SET estoque = $novoEstoque WHERE id = $produtoId";
            $conn->query($sql);

            // Insere a venda no banco de dados
            $dataVenda = date('Y-m-d H:i:s');
            $sql = "INSERT INTO vendas (cliente_id, produto_id, quantidade, valor_total, data_venda) VALUES ($clienteId, $produtoId, $quantidade, $valorTotal, '$dataVenda')";
            $conn->query($sql);

            // Atualiza o valor do caixa
            $sql = "UPDATE caixa SET valor_atual = valor_atual + $valorTotal";
            $conn->query($sql);

            // Gera o número da fatura
            $faturaId = $conn->insert_id;

            // Redireciona para a página de impressão da fatura
            header("Location: imprimir_fatura.php?id=$faturaId");
            exit();
        } else {
            echo "Estoque insuficiente para o produto selecionado.";
        }
    } else {
        echo "Cliente ou produto não encontrados.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Realizar Venda</title>
</head>
<body>
    <h1>Realizar Venda</h1>

    <form method="POST" action="realizar_venda.php">
        <label for="cliente_id">Cliente:</label>
        <select name="cliente_id" id="cliente_id">
            <?php
            // Consulta para obter a lista de clientes
            $sql = "SELECT * FROM clientes";
            $result = $conn->query($sql);

            while ($row = $result->fetch_assoc()) {
                echo '<option value="' . $row['id'] . '">' . $row['nome'] . '</option>';
            }
            ?>
        </select>
        <br>
        <label for="produto_id">Produto:</label>
        <select name="produto_id" id="produto_id">
            <?php
            // Consulta para obter a lista de produtos
            $sql = "SELECT * FROM produtos";
            $result = $conn->query($sql);

            while ($row = $result->fetch_assoc()) {
                echo '<option value="' . $row['id'] . '">' . $row['nome'] . '</option>';
            }
            ?>
        </select>
        <br>
        <label for="quantidade">Quantidade:</label>
        <input type="number" name="quantidade" id="quantidade" min="1" required>
        <br>
        <input type="submit" value="Realizar Venda">
    </form>
</body>
</html>
