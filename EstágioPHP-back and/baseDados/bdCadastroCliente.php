<?php
    // LIGACAO A BASE DE DADOS
    include("bdConexao.php");
    // insercao 
    try{ 
        $nome= $_POST['nome'];
        $sexo= $_POST['sexo'];
        $senha= $_POST['senha'];
        $dataNascimento= $_POST['dataNascimento'];
        $email= $_POST['email'];
        $celular= $_POST['celular'];        
        $provincia= $_POST['provincia'];
        $cidade= $_POST['cidade'];
        $rua= $_POST['rua'];
        $numeroCasa= $_POST['numeroCasa'];

        
        $sql = "INSERT INTO clientes (nome,sexo, senha, dataNascimento,email, celular, provincia, cidade,rua,numeroCasa)
        VALUES ('$nome','$sexo','$senha','$dataNascimento','$email','$celular','$provincia','$cidade','$rua','$numeroCasa')";
        $conn->exec($sql);
      //  include("../paginas/novo-cliente.php");
        echo "Cliente cadastrado com sucesso!";
    }catch (PDOException $e){
        echo $sql . "<br>" . $e->getMessage();

    }  
    //FECHAR LIGACAO BASE DE DADOS
    include('dbclose.php');

?>