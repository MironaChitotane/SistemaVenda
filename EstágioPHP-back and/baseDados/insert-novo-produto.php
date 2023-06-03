<?php
    $descricao = strtoupper($_POST['descricao']);
    //$cod_produto = $_POST['cod_produto'];  
    $cod_barras = $_POST['cod_barras'];
    $unidades = $_POST['unidades'];
    $preco_custo = str_replace(',','.',$_POST['preco_custo']);
    $preco_venda = str_replace(',','.',$_POST['preco_venda']);

    include_once('con.php');

    $sql = "INSERT INTO `PRODUTOS` (`DESCRICAO`,`CODBARRAS`, `NUNIDADES`, `PRECOCUSTO`, `PRECOVENDA`) 
    VALUES ('$descricao', '$cod_barras', '$unidades', '$preco_custo', '$preco_venda')";

    if (mysqli_query($con, $sql)) {
        header('location:../paginas/novo-produto.php?ok');
    }
    else{
        echo "Erro de comunicação com a base de dados".mysqli_connect_error($con);
    }
    mysqli_close()
?>