<?php
    // LIGACAO A BASE DE DADOS
    include("bdConexao.php");
    // insercao 
    try{ 
        $nome= $_POST['nome'];
        $descricao= $_POST['descricao'];
        $codigoBarras= $_POST['codigoBarras'];
        $unidade= $_POST['unidade'];
         $preco_custo = str_replace(',','.',$_POST['preco_custo']);
        $preco_venda = str_replace(',','.',$_POST['preco_venda']);
     //   $preco_venda= $_POST['preco_venda'];
     //   $preco_custo= $_POST['preco_custo'];        

        
        $sql = "INSERT INTO produtos (nome,descricao, codigoBarras, unidade, preco_venda, preco_custo)
        VALUES ('$nome','$descricao','$codigoBarras','$unidade','$preco_venda','$preco_custo')";
        $conn->exec($sql);
      //  include("../paginas/novo-cliente.php");
        echo "Produto cadastrado com sucesso!";
    }catch (PDOException $e){
        echo $sql . "<br>" . $e->getMessage();

    }  
    //FECHAR LIGACAO BASE DE DADOS
    include('dbclose.php');

?>