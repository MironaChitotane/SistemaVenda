
<?php
// Conexão com o banco de dados
$conn = new mysqli("localhost", "root", "", "estagiophp");

// Verificação de erros na conexão
if ($conn->connect_error) {
    die("Erro na conexão com o banco de dados: " . $conn->connect_error);
}

// Processamento do formulário de venda
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $clienteId = $_POST['cliente'];
    $produtoId = $_POST['produto'];
    $quantidade = $_POST['quantidade'];

    // Consulta para obter o cliente selecionado
    $sql = "SELECT * FROM clientes WHERE idCliente = $clienteId";
    $result = $conn->query($sql);
    $cliente = $result->fetch_assoc();

    // Consulta para obter o produto selecionado
    $sql = "SELECT * FROM produtos WHERE idProduto = $produtoId";
    $result = $conn->query($sql);
    $produto = $result->fetch_assoc();

    if ($cliente && $produto) {
        // Verifica se há estoque suficiente
        if ($quantidade <= $produto['unidade']) {
            // Calcula o valor total da venda
            $valorTotal = $produto['preco_venda'] * $quantidade;

            // Atualiza o estoque do produto
            $novoEstoque = $produto['unidade'] - $quantidade;
            $sql = "UPDATE produtos SET unidade = $novoEstoque WHERE idProduto = $produtoId";
            $conn->query($sql);

            // Insere a venda no banco de dados
            $dataVenda = date('Y-m-d H:i:s');
            $sql = "INSERT INTO vendas (idCliente, idProduto, quantidade, valor_total, data_venda) 
            VALUES ($clienteId, $produtoId, $quantidade, $valorTotal, '$dataVenda')";
            $conn->query($sql);

            // Atualiza o valor do caixa
            $sql = "UPDATE caixa SET valor_atual = valor_atual + $valorTotal";
            $conn->query($sql);

            // Gera o número da fatura
            $faturaId = $conn->insert_id;

            // Redireciona para a página de impressão da fatura
         ///  header("Location:factura.php");
            echo " Produro Vendindo com sucesso!.";
           // header("Location:inicial.php?");
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
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <link href="https://fonts.googleapis.com/css?family=Baloo+Bhai&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Sarabun&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/menu.css">
    <link rel="stylesheet" href="../css/formularios.css">
    <link rel="stylesheet" href="../css/btn.css">
    <link rel="stylesheet" href="../css/topo.css">
    <link rel="stylesheet" href="../css/fonts.css">
    <link rel="stylesheet" href="../css/footer.css">
    <link rel="stylesheet" href="../css/table.css">
    
    <link href="https://fonts.googleapis.com/css?family=Baloo+Bhai&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Sarabun&display=swap" rel="stylesheet">

    <title>Cadastrar_Venda</title>
</head>
<body>
    <header class="topo">
        <div class="logo"></div>
        <div class="title-pag">
            <h2>Nova venda</h2>
        </div>
        <div class="credenciail">
            <ul>
                <li><a href="#">Stelio Chavana</a></li>
                <span>|</span>
                <li><a href="../index.php"> Sair</a></li>
            </ul>
        </div>
    </header>
    <header id="menu">
        <nav>
            <ul>
                <li><a href="inicial.php">PAGINA INICIAL</a></li>
                <li class=""><a href="caixa.php">CAIXA</a></li>
                <li class="active"><a href="nova-venda.php">NOVA VENDA</a></li>
                <li><a href="estoque.php">ESTOQUE</a></li>
                <li><a href="novo-produto.php">NOVO PRODUTO</a></li>
                <li><a href="clientes.php">CLIENTES</a></li>
                <li><a href="novo-cliente.php">NOVO CLIENTE</a></li>
                <li><a href="paginas/novo-usuario.php">NOVO CLIENTE</a></li>
            </ul>
        </nav>
    </header>
    <div id="main">
        <div id="list-itens-venda"></div>
        <div class="form-venda">

            <form action="" method="POST">
                <label for="codigo-produto">Cliente</label>
                <select  name="cliente" id="cliente">
                    <?php
                    // Consulta para obter a lista de clientes
                    $sql = "SELECT * FROM clientes";
                    $result = $conn->query($sql);
                    while ($row = $result->fetch_assoc()) {
                        echo '<option value="' . $row['idCliente'] . '">' . $row['nome'] . '</option>';
                    }
                    ?>
                </select>

                <label for="codigo-produto">Produto</label>
                <select name="produto" idProduto="produto">
                    <?php
                    // Consulta para obter a lista de produtos
                    $sql = "SELECT * FROM produtos";
                    $result = $conn->query($sql);

                    while ($row = $result->fetch_assoc()) {
                        echo '<option value="' . $row['idProduto'] . '">' . $row['nome'] . '</option>';
                    }
                    ?>
                </select>

                <label for="quantidade">Quantidade</label>
                <input type="number" name="quantidade" id="quantidade" min="1" required>

                <label for="desconto">Desconto MZ</label>
                <input type="text" id="desconto"><br><br>

                <div class="btn-vendas">
                    <button type="reset" title="Limpar campos de venda">Cancelar venda</button>
                    <button type="submit" title="Finalizar venda">Realizar Venda</button>
                </div>
            </form>
        </div>
        <div id="feeback">
            
                <label for="total-itens">Total de Intens:</label>
                <span title="Campo Desabilitato" disabled></span>
                <hr>

                <label for="total-itens">Total da Compra:</label>
                <span title="Campo Desabilitato" disabled> </span>
            </div>
    </div>
   <footer>
        <p>Copytight sistemas de gestao de estoque &copy 2023 Desenvolvido por <a 
            href="#" target="_blank" >Eng.StelioChavana</a>
        </<p>
    </footer>
        <script src="../js/main.js"></script>
        <script src="../js/forms.js"></script>
</body>
</html>
