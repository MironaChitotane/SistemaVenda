

<?php
	include("bdConexao.php");
	$sql = "SELECT * FROM produtos";
	$result = mysqli_query($con,$sql) or die ('Falha na conexão'.mysqli_error($con));
	//echo "certo";

	if (mysqli_num_rows($result)>0) {		
		while ($row = mysqli_fetch_assoc($result)) {
				$nome = $row['nome'];
				$descricao = $row['descrixao'];
                $idProduto = $row['idProduto'];
                $codigoBarras = $row['codigoBarras'];
                $unidade = $row['unidade'];                
                $preco_custo = $row['preco_custo'];
                $preco_venda = $row['preco_venda'];?>

                <table>
                	<td ><a href="#" title="Click aqui para Atualizar o Produto"><?echo $descricao;?></a></td>
                	//<td><?echo $codProduto;?></td>
					<td><?echo $idProduto;?></td>
                	<td><?echo $codigoBarras ;?></td>
                	<td><?echo $unidade;?></td>
                	<td><?echo $preco_custo;?></td>
                	<td><?echo $preco_venda;?></td>
				</table>
		<?
		}
	};
	    //FECHAR LIGACAO BASE DE DADOS
		include('dbclose.php');
?>	
