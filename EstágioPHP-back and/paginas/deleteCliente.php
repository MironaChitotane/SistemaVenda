<?php
    if(!empty($_GET['idCliente'])) {
        
        // Conexão com o banco de dados
        $conn = new mysqli("localhost", "root", "", "estagiophp");

        // Verificar a conexão
        if ($conn->connect_error) {
            die("Falha na conexão: " . $conn->connect_error);
        }

       $idCliente=$_GET['idCliente'];

        $sqlSelect = "SELECT * FROM clientes WHERE idCliente=$idCliente";
        $result= $conn->query($sqlSelect);

        // Excluir o registro da tabela
        if($result->num_rows > 0){
            $sqlDelete = "DELETE FROM clientes WHERE idCliente = $idCliente";
            $resultDelete= $conn->query($sqlDelete);
          //  header('Location: sistema.php');
            echo "Registro excluído com sucesso.";
        }
 
        // Fechar a conexão
        $conn->close();
}
?>






