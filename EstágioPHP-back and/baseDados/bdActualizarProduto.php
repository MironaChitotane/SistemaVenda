<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $idProduto = $_POST["idProduto"];
    $nome = $_POST["nome"];
    $descricao = $_POST["descricao"]; 
    $preco_custo= $_POST["preco_custo"];
    $preco_venda= $_POST["preco_venda"];
    $codigoBarras= $_POST["codigoBarras"];
    $unidade= $_POST["unidade"];
    


    // Conexão com o banco de dados
    $conn = new mysqli("localhost", "root", "", "estagiophp");

    // Verificar a conexão
    if ($conn->connect_error) {
        die("Falha na conexão: " . $conn->connect_error);
    }

    // Atualizar os dados na tabela

    $sqlUpdate = "UPDATE produtos  SET idProduto='$idProduto', nome='$nome',descricao= '$descricao', preco_custo = '$preco_custo'
    ,codigoBarras='$codigoBarras',unidade='$unidade'
     WHERE idProduto=$idProduto";

    if ($conn->query($sqlUpdate) === true) {
        header('Location:../paginas/estoque.php');
    // echo "Registro atualizado com sucesso.";
    } else {
        echo "Erro ao atualizar o registro: " . $conn->error;
      //  header('Location: edite.php')
        echo "erro ao cadastrar na basedados.";
    }

    // Fechar a conexão
    $conn->close();
}
?>
