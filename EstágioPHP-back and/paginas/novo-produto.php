<?
    if(isset($_GET['ok'])){
        ?>
            <script>
                window.open('alerta-positivo.html',"janela1","width=400,height=200,")
            </script>
        <?
    }
?>
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
    
    <link href="https://fonts.googleapis.com/css?family=Baloo+Bhai&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Sarabun&display=swap" rel="stylesheet">


    <title>SIMPLE STOCK</title>
</head>
<body>
<header class="topo">
            <div class="logo">

            </div>
            <div class="title-pag">
                <h2>Novo Produto</h2>
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
                <li ><a href="caixa.php">CAIXA</a></li>
                <li ><a href="nova-venda.php">NOVA VENDA</a></li>
                <li ><a href="estoque.php">ESTOQUE</a></li>
                <li class="active" ><a href="novo-produto.php">NOVO PRODUTO</a></li>
                <li><a href="clientes.php">CLIENTES</a></li>
                <li ><a href="novo-cliente.php">NOVO CLIENTE</a></li>
                <li  ><a href="novo-usuario.php">NOVO USUARIO</a></li>
            </ul>
        </nav>
    </header>
        <div id="main">
        <section>
            <form 
                id="form-produto" 
                method="post" 
                action="../baseDados/bdCadastroProduto.php" 
                autocomplete="off"    
            >
                <div class="inputs">

                <span>Nome:</span>
                    <input 
                        type="text" 
                        title="Nome ou descrição do produto" 
                        placeholder="nome do produto"
                        name="nome"
                        id="desc-produto"
                        maxlength="100"
                        required
                    >
                    
                    <span>Descrição</span>
                    <input 
                        type="text" 
                        title="Nome ou descrição do produto" 
                        placeholder="Descrição do produto"
                        name="descricao"
                        id="desc-produto"
                        maxlength="100"
                        required
                    >

                    <span>Código do produto</span>
                    <input 
                        type="text"
                        title="Código do produto"
                        placeholder="<?
                        include_once('../database/rescupera-cod-produto.php')
                        ?>"
                        name="idProduto"
                        id="cod-produto"
                        maxlength="5"
                        disabled  
                    >

                    <span>Código de Barras</span>
                    <input 
                        type="text"
                        title="Código de barras"
                        placeholder="Cócdigo de barras"
                        name="codigoBarras"
                        id="codigoBarras"
                        maxlength="13"
                        required
                    >
                </div>
                                
                <div class="valores">

                    <span>Nº de Unidades</span>
                    <input 
                        type="number"
                        title="Nº de unidades"
                        placeholder="Nª de unidades"
                        name="unidade"
                        id="cod-barras"
                        maxlength="10"
                        required     
                    >
                    <span>Preço de Custo</span>
                    <input 
                        type="text"
                        title="Preço de Custo"
                        placeholder="MZ por unidade"
                        name="preco_custo"
                        id="preco-custo"
                        required
                        onKeyPress="return(moeda(this,'.',',',event))"
                    >
                    
                    <span>Preço de venda</span>
                    <input 
                        type="text"
                        title="Preso de venda"
                        placeholder="MZ por unidade"
                        name="preco_venda"
                        id="preco-venda"
                        required
                        onKeyPress="return(moeda(this,'.',',',event))"
                    >
                </div>

                <div class="btn-forms">
                    <button><a  href="../index.php" title="Cancelar cadastro" >Cancelar</a></button>
                    <button type="reset" title="Limpar formulário" >Limpar</button>
                    <button type="submit" title="Concluir Cadastro" >Cadastrar</button>
                </div>
                
            </form>
        </section>
        </div>

    <footer>
        <p>Copytight Sistema de gestão de Stoke &copy 2023 Desenvolvido por <a 
            href="https://www.quevemcosta.com" target="_blank" >Eng.StelioChavama</a>
        </<p>
    </footer>
        <script src="../js/main.js"></script>
        <script src="../js/forms.js"></script>
</body>
</html>