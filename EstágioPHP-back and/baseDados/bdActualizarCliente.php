<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $idCliente = $_POST["idCliente"];
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $celular= $_POST["celular"];
    $dataNascimento= $_POST["dataNascimento"];
    $provincia= $_POST["provincia"];
    $cidade= $_POST["cidade"];
    $rua= $_POST["rua"];
    $numeroCasa= $_POST["numeroCasa"];
    $dataCadastro= $_POST["dataCadastro"]; 
    $status= $_POST["status"];

    // Conexão com o banco de dados
    $conn = new mysqli("localhost", "root", "", "estagiophp");

    // Verificar a conexão
    if ($conn->connect_error) {
        die("Falha na conexão: " . $conn->connect_error);
    }

    // Atualizar os dados na tabela

    $sqlUpdate = "UPDATE clientes  SET idCliente='$idCliente', nome='$nome',email= '$email', celular = '$celular'
    ,dataNascimento='$dataNascimento',provincia='$provincia',cidade='$cidade',numeroCasa='$numeroCasa',dataCadastro='$dataCadastro',status='$status'
     WHERE idCliente=$idCliente";

    if ($conn->query($sqlUpdate) === true) {
        header('Location:../paginas/clientes.php');
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
