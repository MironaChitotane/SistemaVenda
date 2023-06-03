<?php
    // LIGACAO A BASE DE DADOS
    include('bdConexao.php');
    // insercao
    try{ 
        $nome= $_POST['nome'];
        $e_mail= $_POST['e_mail'];
        $telefone= $_POST['telefone'];
        $morada= $_POST['morada'];
        $senha= $_POST['senha'];
        $perfil= $_POST['perfil'];


        $sql = "INSERT INTO usuarios (nome,telefone, morada,e_mail, senha, perfil)
        VALUES ('$nome','$telefone','$morada','$e_mail',md5('$senha'),'$perfil')";
         $conn->exec($sql);
        // include("../paginas/inicial.php");
       echo "Usuario cadastrado com sucesso!";
    }catch (PDOException $e){
        echo $sql . "<br>" . $e->getMessage();

    }
    
    //FECHAR LIGACAO BASE DE DADOS
    include('dbclose.php');

?>