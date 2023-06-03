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
                <h2>Cadastro de Cliente</h2>
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
                <li  ><a href="novo-produto.php">NOVO PRODUTO</a></li>
                <li><a href="clientes.php">CLIENTES</a></li>
                <li class="active"><a href="novo-cliente.php">NOVO CLIENTE</a></li>
                <li ><a href="novo-usuario.php">NOVO USUARIO</a></li>
            </ul>
        </nav>
    </header>
        <div id="main">
        <section class="section-forms">
            <form 
                id="form-produto" 
                method="post" 
                action="../baseDados/bdCadastroCliente.php" 
                autocomplete="off"    
            >
                <section id="dados-pessoais">
                    <h3>Dados pessoais</h3>
                    <div class="inputs">
                        
                        <span>Nome Completo</span>
                        <input 
                            type="text" 
                            title="Nome completo do cliente" 
                            placeholder="Nome completo do cliente"
                            name="nome"
                            id="cliente"
                            maxlength="80"
                            required
                        >

                        <fieldset >
                            <legend>Sexo</legend>
                            <span>M</span>
                            <input 
                                type="radio"
                                title="Masculino"
                                name="sexo"
                                required
                            >
                            <span>F</span>
                            <input 
                                type="radio"
                                title="Feminino"
                                name="sexo"
                                required
                            >
                        </fieldset>
                        
                        <span>Data de Nascimento</span>
                        <input 
                            type="date"
                            title="Data de nascimento"
                            name="dataNascimento"
                            id="data-nascimento-cliente"
                            required
                        >

                        <span>SENHA</span>
                        <input 
                            type="text"
                            title="CPF"
                            placeholder="SENHA OBRIGATORIO"
                            name="senha"
                            id="cpf"
                            maxlength="13"
                            required
                        >
                </section>
                <hr>
                <!-------------Dados de endereço---------------->
                <section id="dados-endereco">
                    <h3>Dados de Endreço</h3>
                    <div class="inputs">
                        
                    <fieldset >
                            <legend>PROVINCIA</legend>
                            <select name="provincia"
                             title="provincia"
                             id="uf">
                                <option >Maputo Cidade</option>
                                <option >Maputo Provincia</option>
                                <option >Xai-Xai</option>
                                <option >Inhambane</option>
                                <option >Sofala</option>
                                <option>Tete</option>
                                <option >Manica</option>
                                <option >Niassa</option>
                                <option >Cabo Delegado</option>
                                <option >Nampula</option>
                            </select>
                            
                        </fieldset>
                        
                        <span>BAIRRO</span>
                        <input 
                            type="text" 
                            title="Cidade" 
                            placeholder="Cidade"
                            name="cidade"
                            maxlength="90"
                            required
                        >
                        <span>Rua</span>
                        <input 
                            type="text" 
                            title="Rua out Travessa" 
                            placeholder="Rua"
                            name="rua"
                            maxlength="100"
                            required
                        >
                        
                        <span>Nª da Casa</span>
                        <input 
                            type="text"
                            title="Data de nascimento"
                            name="numeroCasa"
                            id="numeroCasa"
                            required
                        >
                        
                </section>
                <hr>
                <!-------------Dados de contato---------------->
                <section id="dados-contato">
                    <h3>Dados de Contato</h3>
                    <div class="inputs">
                        
                    <fieldset >
                            <legend>Celular</legend>
                            <input 
                            type="text" 
                            title="Celular" 
                            placeholder="Celular"
                            name="celular"
                            id="celular"
                            maxlength="11"
                            required
                        >
                    </fieldset>
                    <fieldset >
                            <legend>E-mail</legend>
                            <input 
                            type="text" 
                            title="email" 
                            placeholder="email"
                            name="email"
                            id="email"
                            maxlength="11"
                            required
                        >
                    </fieldset>
                </section>
                <div class="btn-forms" >                
                    <button><a  href="inicial.php" title="Cancelar cadastro" >Cancelar</a></button>
                    <button type="reset">Limpar</button>
                    <button type="submit">Finalizar</button>
                </div>
                </form>
        </section>
        </div>

    <footer>
        <p>Copytight Sistema de gestão de Stoke &copy 2023 Desenvolvido por <a 
            href="https://www.quevemcosta.com" target="_blank" >Eng.Stelio chavana</a>
        </<p>
    </footer>
        <script src="../js/main.js"></script>
        <script src="../js/forms.js"></script>
</body>
</html>