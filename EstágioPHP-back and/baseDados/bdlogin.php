<?php
    session_start();
    // LIGACAO A BASE DE DADOS
    include('bdConexao.php');

    // Verificar se o formulário de login foi enviado
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obter as credenciais de login enviadas pelo formulário
        $nome= $_POST['nome'];
        $senha= $_POST['senha'];
        $perfil= $_POST['perfil'];

        
        // Preparar a consulta SQL com parâmetros
        $sql = "SELECT * FROM usuarios WHERE nome = '$nome' AND senha = '$senha' and perfil ='$perfil'";
        $stmt = $conn->prepare($sql);

        // Executar a consulta com os parâmetros fornecidos
        $stmt->execute([
            'nome' => $nome,
            'senha' => $senha,
            'perfil' => $perfil
        ]);

        // Verificar se o usuário foi encontrado
        if ($stmt->rowCount() === 1) {
            // Obter o perfil do usuário
            $row = $stmt->fetch();
            $perfil = $row['perfil'];
            // Credenciais válidas, iniciar sessão
            $_SESSION['loggedin'] = true;
            $_SESSION['nome'] = $nome;
            $_SESSION['perfil'] = $perfil;

           // echo "Connectado com sucesso!";
           if($perfil === 'Usuario'){
            header("Location:../paginas/inicial.php");
           // include("../paginas/inicial.php");
          } else {
           // include("../paginas/inicial.php");
            header("Location:../paginas/inicial.php");
          }
            exit;
          } else {
            unset ( $_SESSION['nome']);
            unset( $_SESSION['senha']);
            // Credenciais inválidas, exibir mensagem de erro
            $error = 'Credenciais inválidas';
            //echo "Credenciais inválidas";
            header("Location:../paginas/login.php");
         //   include("../paginas/login.php");
        }    
    //FECHAR LIGACAO BASE DE DADOS
    include('dbclose.php');
}
?>


