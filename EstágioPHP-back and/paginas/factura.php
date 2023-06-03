<?php
// Verifica se os valores foram enviados pelo formulário
if (isset($_POST['idCliente']) && isset($_POST['idProduto']) && isset($_POST['quantidade'])) {
    $clienteId = $_POST['idCliente'];
    $produtoId = $_POST['idProduto'];
    $quantidade = $_POST['quantidade'];

    // Conexão com o banco de dados
    $conn = new mysqli("localhost", "root", "", "estagiophp");

    // Verificação de erros na conexão
    if ($conn->connect_error) {
        die("Erro na conexão com o banco de dados: " . $conn->connect_error);
    }

    // Consulta para obter o preço unitário do produto selecionado
    $sql = "SELECT preco_custo FROM produtos WHERE idProduto = $produtoId";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $precoUnitario = $row['preco_custo'];

    // Cálculo do preço total
    $precoTotal = $precoUnitario * $quantidade;

    // Fechar conexão com o banco de dados
    $conn->close();
} else {
    // Redirecionar de volta para a página principal se os valores não forem enviados
    header("Location: inicio.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Fatura</title>
</head>
<body>
    <h1>Fatura</h1>

    <p>Cliente: <?php echo $clienteId; ?></p>
    <p>Produto: <?php echo $produtoId; ?></p>
    <p>Preço Unitário: R$ <?php echo $precoUnitario; ?></p>
    <p>Quantidade: <?php echo $quantidade; ?></p>
    <p>Preço Total: R$ <?php echo $precoTotal; ?></p>
</body>
</html>
