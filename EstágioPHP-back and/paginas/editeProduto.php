

<?php
    if(!empty($_GET['idProduto']))
    { 
       
         // Conexão com o banco de dados
         $conn = new mysqli("localhost", "root", "", "estagiophp");
 
         // Verificar a conexão
         if ($conn->connect_error) {
             die("Falha na conexão: " . $conn->connect_error);
         }
        
                // Edicao de dados
            $idProduto=$_GET['idProduto'];
           
            // Preparar a consulta SQL com parâmetros        
            $sql = "SELECT *from produtos where idProduto=$idProduto";
            $result = $conn->query($sql);
           
           if($result->num_rows>0) { 
            //header('location:editarTarefas.php');
            while($row= mysqli_fetch_assoc($result)){
                $idProduto= $row['idProduto'];
                $nome= $row['nome'];
                $descricao= $row['descricao'];
                $preco_custo=$row['preco_custo'];
                $preco_venda= $row['preco_venda'];
                $codigoBarras= $row['codigoBarras'];
                $unidade= $row['unidade'];
                } 
           } else{
           //  header('location:../paginas/estoque.php');
           echo "sem sucesso!";
             }
            
         //  echo "Usuario cadastrado com sucesso!";
        }else{          
         //  header('location:listarTarefas.php');
        }
        
        //FECHAR LIGACAO BASE DE DADOS
        $conn = null; 
    
    ?>
       








<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro_Usuario</title>
    <link rel="stylesheet" href="css/cadastro.css">

</head>
<body>
<a href="produto.php">Voltar</a>
  <div class="box">
    <h2>Preenchimento do formulário:</h2>
        <form method="POST" action="../baseDados/bdActualizarProduto.php">
        <fieldset>
            <legend><!--Cria titula dentro do formulario-->
               Dados do Usuario
            </legend>
                <label for="nome">Nome do produto:</label>
                <input type="text" name="nome" id="nome" required value ="<?php echo $nome ?>"><br> <br>

                <label for="descricao">Descrição:</label>
                <input name="descricao" id="descricao" required value ="<?php echo $descricao?>"></input><br> <br>

                <label for="preco_custo">Preco Compra:</label>
                <input type="preco_custo" name="preco_custo" id="preco_custo" required value ="<?php echo $preco_custo?>"><br> <br>

                <label for="notas">Preco de Venda:</label>
                <input name="preco_venda" id="preco_venda" required value ="<?php echo $preco_venda?>"></input><br> <br>

                <label for="notas">Codigo de Barras:</label>
                <input name="codigoBarras" id="codigoBarras" required value ="<?php echo $codigoBarras?>"></input><br> <br>

                <label for="notas">Unidade:</label>
                <input name="unidade" id="unidade" required value ="<?php echo $unidade?>"></input><br> <br>

                <input type="hidden" name= "idProduto" value="<?php echo $idProduto ?>">
                <input type="submit" id="update" name="update">
            </fieldset>
         </form>
  </div>   
</body>  
</html>