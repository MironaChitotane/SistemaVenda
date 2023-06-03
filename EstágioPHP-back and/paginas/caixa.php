<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
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
    <link rel="stylesheet" href="../css/caixa.css">

    
    <link href="https://fonts.googleapis.com/css?family=Baloo+Bhai&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Sarabun&display=swap" rel="stylesheet">


    <title>SIMPLE STOCK</title>
</head>
<body>
<header class="topo">
            <div class="logo">

            </div>
            <div class="title-pag">
                <h2>Caixa</h2>
            </div>
            <div class="credenciail">
                <ul>
                    <li>
                        <a href="#">Usuario Sobrenome</a>
                    </li>
                    <span>|</span>
                    <li>
                        <a href="#"> Sair</a>
                    </li>
                </ul>
            </div>
        </header>
    <header id="menu" >
        
        <nav>
            <ul>
                <li ><a href="inicial.php">PAGINA INICIAL</a></li>
                <li class="active"><a href="caixa.php">CAIXA</a></li>
                <li ><a href="nova-venda.php">NOVA VENDA</a></li>
                <li ><a href="estoque.php">ESTOQUE</a></li>
                <li  ><a href="novo-produto.php">NOVO PRODUTO</a></li>
                <li><a href="clientes.php">CLIENTES</a></li>
                <li  ><a href="novo-cliente.php">NOVO CLIENTE</a></li>
                <li  ><a href="paginas/novo-usuario.php">NOVO USUARIO</a></li>
            </ul>
        </nav>
    </header>
        <div id="main">
            <div id="caixa-fechado">
                <button 
                    type="button" 
                    id="btn-abrir-caixa" 
                    title="Abrir Caixa"
                    >Abrir Caixa</button>
            </div>
            <div id="caixa-aberto">
                <div id="saldo-inicial" title="Dinheiro que fica disponível no caixa e em todas as contas bancárias.">
                    <h3>Saldo Inicial</h3>
                    <span>2,50</span>
                    <button 
                        type="button" 
                        title="Modificar Saldo Inicial" 
                        id="btn-saldo-inicial"
                        >Modificar</button>
                </div>
                <div id="forme-saldo-inicial">
                    <form action="#">
                            <h3>Atualizar saldo Inicial</h3>
                            <label for="atualizar-saldo-inicial"></label>
                            <input type="text"
                                id="atualizar-saldo-inicial"
                            >
                            <button 
                                type="submit"
                                title="Atualizar valor inicial do caixa"
                                id="salva"
                                >Atualizar</button>
                            <button 
                                type="button"
                                title="Cancelar alteraçãoes"
                                id="btn-fechar"
                                >Cancelar</button>
                            
                    </form>
                </div>
                <!----------------------------------------------------------------->
                <div id="entrada-caixa" title="vendas efetuadas à vista e demais recebimentos do dia.">
                    <h3>Entradas de Caixa</h3>
                    <span>2,50</span>
                </div>
                <!----------------------------------------------------------------->

                <div id="saida-caixa" title=" todos os pagamentos que são efetuados no dia.">
                    <h3>Saídas de Caixa</h3>
                    <span>2,50</span>
                </div>
                <!--------------------------------------------------------------->
                <div id="saldo-operaconal" title="é o resultado das entradas de caixa subtraindo as saídas de caixa.">
                    <h3>Saldo Operacional</h3>
                    <span>2,50</span>
                </div>
                <!--------------------------------------------------------------->
                <div id="saldo-final" title="soma do salto inicial com o saldo operacional.">
                    <h3>Saldo Final de Caixa</h3>
                    <span>2,50</span>
                </div>
        </div>
</div>
    <footer>
        <p>Copytight Sistema de Gestão de Stoke &copy 2023 Desenvolvido por <a 
            href="https://www.quevemcosta.com" target="_blank" >Eng.Stelio Chavana</a>
        </<p>
    </footer>
        <script src="../js/main.js"></script>
        <script src="../js/forms.js"></script>
        <script src="../js/caixa.js"></script>

</body>
</html>