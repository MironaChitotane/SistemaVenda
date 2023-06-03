

<?php
    if(!empty($_GET['idCliente']))
    { 
       
         // Conexão com o banco de dados
         $conn = new mysqli("localhost", "root", "", "estagiophp");
 
         // Verificar a conexão
         if ($conn->connect_error) {
             die("Falha na conexão: " . $conn->connect_error);
         }
        
                // Edicao de dados
            $idCliente=$_GET['idCliente'];
           
            // Preparar a consulta SQL com parâmetros        
            $sql = "SELECT *from clientes where idCliente=$idCliente";
            $result = $conn->query($sql);
           
           if($result->num_rows>0) { 
            //header('location:editarTarefas.php');
            while($row= mysqli_fetch_assoc($result)){
                $idCliente= $row['idCliente'];
                $nome= $row['nome'];
                $sexo= $row['sexo'];
                $email=$row['email'];
                $celular= $row['celular'];
                $dataNascimento= $row['dataNascimento'];
                $provincia= $row['provincia'];
                $cidade= $row['cidade'];
                $rua=$row['rua'];
                $senha= $row['senha'];
                $numeroCasa= $row['numeroCasa'];
                $dataCadastro= $row['dataCadastro'];
                $status= $row['status'];
                } 
           } else{
           //  header('location:clientes.php');
           echo "sem sucesso!";
             }

            
          //  echo "Usuario cadastrado com sucesso!";
        }else{          
          echo "Sem sucesso na actualizacao!";
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
    <title>Actualicao_Clientes</title>
    <link rel="stylesheet" href="../css/cadastro.css">

</head>
<body>
<a href="listarTarefas.php">Voltar</a>
  <div class="box">
    <h2>Preenchimento do formulário:</h2>
        <form method="POST" action="../baseDados/bdActualizarCliente.php">
        <fieldset>
            <legend><!--Cria titula dentro do formulario-->
               Dados do Usuario
            </legend>
                <label for="nome">Nome da Tarefa:</label>
                <input type="text" name="nome" id="nome" required value ="<?php echo $nome ?>"><br> <br>

                <label for="email">Email:</label>
                <input type="email" name="email" id="email" required value ="<?php echo $email?>"><br> <br>

                <label for="notas">Celular:</label>
                <input name="celular" id="celular" required value ="<?php echo $celular?>"></input><br> <br>

                <label for="descricao">Data Nascimento:</label>
                <input type="date" name="dataNascimento" id="dataNascimento" required value ="<?php echo $dataNascimento?>"></input><br> <br>

                <label for="resposavel">Provincia:</label>
                <select id="provinca" name="provincia">
                    <option selected ><?php echo $provincia?></option>
                    <option value="Maputo">Maputo</option>
                    <option value="Gaza">Gaza</option>
                    <option value="Tete">Tete</option>
                    <option value="sofala">Sofala</option>
                    <option value="Manica">Manica</option>
                    <option value="Inhambane">Inhambane</option><br> <br>
                </select><br> <br>

                <label for="notas">Cidade:</label>
                <input name="cidade" id="cidade" required value ="<?php echo $cidade?>"></input><br> <br>

                <label for="notas">Rua:</label>
                <input name="rua" id="rua" required value ="<?php echo $rua?>"></input><br> <br>

                <label for="notas">Senha:</label>
                <input name="senha" id="celular" required value ="<?php echo $senha?>"></input><br> <br>

                <label for="descricao">Numero Casa:</label>
                <input name="numeroCasa" id="descricao" required value ="<?php echo $numeroCasa?>"></input><br> <br>

                <label for="descricao">Data Cadastro:</label>
                <input type="date" name="dataCadastro" id="dataCadastro" required value ="<?php echo $dataCadastro?>"></input><br> <br>

                <label for="descricao">Status:</label>
                <select name="status" >
                    <option selected><?php echo $status?></option>
                    <option value="Limpeza">Activo</option>
                    <option value="Inativo">Inativo</option>
                    <option value="bloquiado">Bloquiado</option>
                    <option value="Outros">Outros</option>
                </select><br><br> <br>
          
                <input type="hidden" name= "idCliente" value="<?php echo $idCliente ?>">
                <input type="submit" id="update" name="update">
            </fieldset>
         </form>
  </div>   
</body>  
</html>