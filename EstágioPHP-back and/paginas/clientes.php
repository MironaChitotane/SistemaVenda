<?php
   
    session_start();
    /*
    if((!isset($_SESSION['nome'])==true) and (!isset($_SESSION['senha'])==true)){
      //  header('Location: login.php');
        unset ( $_SESSION['nome']);
        unset( $_SESSION['senha']);
    }
  
        $logado = $_SESSION['nome'];
    */  
        // Conexão com o banco de dados
        $conn = new mysqli("localhost", "root", "", "estagiophp");

        // Verificar a conexão
        if ($conn->connect_error) {
            die("Falha na conexão: " . $conn->connect_error);
        }
        if(!empty($_GET['search'])){
            $data = $_GET['search'];
            $sql = "SELECT * FROM clientes WHERE idCliente LIKE '%$data%' or nome LIKE '%$data%' or email LIKE  '%$data%' or celular LIKE  '%$data%' or dataCadastro LIKE  '%$data%' or rua LIKE  '%$data%' order by idCliente desc";

        } else{
            $sql = "SELECT * FROM clientes order by idCliente desc";
         }
         $result = $conn->query($sql);

        if (!$result) {
            die("Erro na consulta: " . mysqli_error($conn));
        }

?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
    
    <link href="https://fonts.googleapis.com/css?family=Baloo+Bhai&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Sarabun&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/menu.css">
    <link rel="stylesheet" href="../css/formularios.css">
    <link rel="stylesheet" href="../css/btn.css">
    <link rel="stylesheet" href="../css/topo.css">
    <link rel="stylesheet" href="../css/fonts.css">
    <link rel="stylesheet" href="../css/footer.css">
    <link rel="stylesheet" href="../css/table.css">

    
    <link href="https://fonts.googleapis.com/css?family=Baloo+Bhai&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Sarabun&display=swap" rel="stylesheet">


    <title>Listar_clientes</title>
</head>
<body>

<header class="topo">
            <div class="logo">

            </div>
            <div class="title-pag">
                <h2>Clientes</h2>
            </div>
            <div class="credenciail">
           
                <ul>
               
                    <li>
                    
                         <a href="#">Usuario_Sitema: <u>Stelio Chavana</u></a>
                    </li>
   
                    <span>|</span>
                    <li>
                        <a href="#"> Sair</a>
                    </li>
                </ul>
            </div>
        </header>
    <header id="menu">
        <nav>
            <ul>
                <li ><a href="inicial.php">PAGINA INICIAL</a></li>
                <li ><a href="caixa.php">CAIXA</a></li>
                <li ><a href="nova-venda.php">NOVA VENDA</a></li>
                <li ><a href="estoque.php">ESTOQUE</a></li>
                <li  ><a href="novo-produto.php">NOVO PRODUTO</a></li>
                <li class="active"><a href="clientes.php">CLIENTES</a></li>
                <li  ><a href="novo-cliente.php">NOVO CLIENTE</a></li>
                <li  ><a href="novo-usuario.php">NOVO USUARIO</a></li>
            </ul>
        </nav>
    </header>
        <div id="main">
            <table>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nome</th>
                        <th>Email</th>
                        <th>Celular</th>
                        <th>Provincia</th>
                        <th>Cidade</th>
                        <th>Rua</th>
                        <th>Nº Casa</th>
                        <th>Data Nascimento</th>
                        <th>Data Cadastro</th>
                        <th>Status</th>
                        <th>...</th>
                    </tr>
                </thead>
                <tbody>
               <?php
                    if($result && $result->num_rows > 0){
                        // Loop através dos resultados usando mysqli_fetch_assoc()
                        while($row = mysqli_fetch_assoc($result)){
                            echo "<tr>";
                            echo "<td>" . $row['idCliente'] . "</td>";
                            echo "<td>" . $row['nome'] . "</td>";
                            echo "<td>" . $row['email'] . "</td>";
                            echo "<td>" . $row['celular'] . "</td>";
                            echo "<td>" . $row['provincia'] . "</td>";
                            echo "<td>" . $row['cidade'] . "</td>";
                            echo "<td>" . $row['rua'] . "</td>";
                            echo "<td>" . $row['numeroCasa'] . "</td>";
                            echo "<td>" . $row['dataNascimento'] . "</td>";
                            echo "<td>" . $row['dataCadastro'] . "</td>";
                            echo "<td>" . $row['status'] . "</td>";
                            echo "<td>
                                <a class = 'btn btn-sm btn-primary' href='editeCliente.php? idCliente=$row[idCliente]'>
                                    <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil' viewBox='0 0 16 16'>
                                    <path d='M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z'/>
                                    </svg>
                                </a>
                                <a class = 'btn btn-sm btn-danger' href='deleteCliente.php? idCliente=$row[idCliente]'>
                                    <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash' viewBox='0 0 16 16'>
                                    <path d='M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z'/>
                                    <path d='M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z'/>
                                    </svg>
                                </a>
                            </td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "Nenhum resultado encontrado";
                    }
                    
               ?>
            </tbody>
            </table>
        </div>
    <footer>
        <p>Copytight Sistema de gestão de stohe &copy 2023 Desenvolvido por <a 
            href="https://www.quevemcosta.com" target="_blank" >Eng. Stelio Chavana</a>
        </<p>
    </footer>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" 
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
        <script src="../js/main.js"></script>
        <script src="../js/forms.js"></script>
</body>
</html>